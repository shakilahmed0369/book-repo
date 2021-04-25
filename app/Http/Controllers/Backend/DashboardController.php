<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Book;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(){
      $totalBooks = Book::count();
      $featuredBooks = Book::where('featured', 1)->count();
      return view('backend.pages.dashboard.index', compact('totalBooks', 'featuredBooks'));
    }
}
