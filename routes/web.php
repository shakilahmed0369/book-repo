<?php

use App\Http\Controllers\Backend\AdminProfileController;
use App\Http\Controllers\Backend\AdminUserController;
use App\Http\Controllers\Backend\MenuController;
use App\Http\Controllers\Backend\RoleController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\SettingsController;
use App\Http\Controllers\Backend\BookController;
use App\Http\Controllers\Frontend\FrontendController;
use App\Http\Controllers\Backend\DashboardController;
use Illuminate\Support\Facades\Artisan;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/*
|--------------------------------------------------------------------------
| Project install Routes
|--------------------------------------------------------------------------
| This route will install the project on production
|--------------------------------------------------------------------------
| WORNING ::  MAKE SURE YOU COMMANTOUT THIS TWO
| ROUTE IN PRODUCTION !
|--------------------------------------------------------------------------
*/

// /* Run migration on production */
// Route::get('/install-me', function(){
//   Artisan::call('migrate:fresh');
//   Artisan::call('clear:config');
//   Artisan::call('optimize:clear');
// });

// /* If you want to seed some dummy data */
// Route::get('/seed-me', function(){
//   Artisan::call('db:seed');
//   Artisan::call('clear:config');
//   Artisan::call('optimize:clear');
// });


/*
|--------------------------------------------------------------------------
| Frontend Routes
|--------------------------------------------------------------------------
| Here all Frontend routs has been define    
*/
Route::get('/', [FrontendController::class, 'index']);
Route::get('/pdf-view/{data}', [FrontendController::class, 'pdfView'])->name('pdf.view');

/*
|--------------------------------------------------------------------------
| Backend Routes
|--------------------------------------------------------------------------
| Here all Backend routs has been define    
*/
Route::group(['prefix'=> 'admin', 'as' => 'admin.'], function () {
  /* Dashboad Route */
  Route::any('/', [DashboardController::class, 'index']);
  // Role Routes
  Route:: resource('/role', RoleController::class);
  // Admin User Routes
  Route:: resource('/admin-user', AdminUserController::class);
  // Menu Routes
  Route:: post('/menu/updaterow', [MenuController::class, 'updaterow']);
  Route:: resource('/menu', MenuController::class);
  /* Profile Routes */
  Route:: get('/admin-profile', [AdminProfileController::class, 'index'])->name('profile');
  Route:: put('/admin-profile/update/{id}', [AdminProfileController::class, 'update'])->name('profile.update');

  /* Route Group */
  Route::group(['middleware' => ['admin.auth','role:super-admin', 'auth:admin']],function () {
    /* Env Editor Routes */
    Route:: get('/env-editor', function(){ return view('vendor.geo-sv.env-editor.index'); });
    /* Backup Manager Routes */
    Route:: get('/backup', function(){ return view('vendor.laravel_backup_panel.layout');});
  });

  /* Setting Routes */
  Route:: get('/settings', [SettingsController::class, 'index'])->name('settings.index');
  /* Webinfo Route */
  Route:: post('/settings/webinfoupdate', [SettingsController::class, 'webinfoUpdate'])->name('settings.webinfoupdate');
  /* Webinfo Route */
  Route:: post('/settings/contactinfo', [SettingsController::class, 'ContactInfoUpdate'])->name('settings.contactInfoUpdate');
  Route:: post('/settings/imageupdate', [SettingsController::class, 'ImageUpdate'])->name('settings.imageUpdate');
  /*  Book Routes */
  Route::get('/book/featured-books', [BookController::class, 'featuredBook'])->name('book.featured-books');
  Route::resource('/book', BookController::class);

});