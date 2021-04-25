<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class MenuSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    $menus = array(
      array('id' => '11','parent_id' => '0','order' => '0','name' => 'Dashboard','icon' => 'fas fa-columns','uri' => '/admin','permissions' => '["read-Book","create-Book","edit-Book","delete-Book","read-Menu","create-Menu","edit-Menu","delete-Menu","edit-Site-Settings","read-Admin-User","create-Admin-User","edit-Admin-User","delete-Admin-User","read-Role","create-Role","edit-Role","delete-Role"]','created_at' => '2021-04-01 02:47:01','updated_at' => '2021-04-25 11:57:55'),
      array('id' => '12','parent_id' => '0','order' => '5','name' => 'Access Control','icon' => 'fas fa-lock','uri' => 'access-control','permissions' => '["read-Admin-User","read-Role"]','created_at' => '2021-04-01 02:49:53','updated_at' => '2021-04-25 11:25:12'),
      array('id' => '13','parent_id' => '12','order' => '6','name' => 'Roles','icon' => 'fas fa-chess-king','uri' => 'admin/role','permissions' => '["read-Role","create-Role","edit-Role","delete-Role"]','created_at' => '2021-04-01 02:51:07','updated_at' => '2021-04-25 11:25:12'),
      array('id' => '14','parent_id' => '12','order' => '7','name' => 'Admin Users','icon' => 'fas fa-user-shield','uri' => 'admin/admin-user','permissions' => '["read-Admin-User","create-Admin-User","edit-Admin-User","delete-Admin-User"]','created_at' => '2021-04-01 02:52:10','updated_at' => '2021-04-25 11:25:12'),
      array('id' => '15','parent_id' => '0','order' => '8','name' => 'Admin Aria','icon' => 'fas fa-hammer','uri' => 'admin-aria','permissions' => '["read-Menu"]','created_at' => '2021-04-01 02:53:44','updated_at' => '2021-04-25 11:25:12'),
      array('id' => '16','parent_id' => '15','order' => '9','name' => 'Menu Builder','icon' => 'fas fa-bars','uri' => 'admin/menu','permissions' => '["read-Menu","create-Menu","edit-Menu","delete-Menu"]','created_at' => '2021-04-01 02:54:10','updated_at' => '2021-04-25 11:57:17'),
      array('id' => '17','parent_id' => '15','order' => '10','name' => 'Env Editor','icon' => 'fas fa-file-signature','uri' => 'admin/env-editor','permissions' => 'null','created_at' => '2021-04-04 20:31:12','updated_at' => '2021-04-25 11:25:12'),
      array('id' => '18','parent_id' => '15','order' => '11','name' => 'Backup Manager','icon' => 'fas fa-hdd','uri' => 'admin/backup','permissions' => 'null','created_at' => '2021-04-05 13:52:34','updated_at' => '2021-04-25 11:25:12'),
      array('id' => '19','parent_id' => '0','order' => '1','name' => 'Book Section','icon' => 'fas fa-book-open','uri' => '#','permissions' => '["read-Book","create-Book","edit-Book","delete-Book"]','created_at' => '2021-04-25 11:10:04','updated_at' => '2021-04-25 11:11:26'),
      array('id' => '20','parent_id' => '19','order' => '2','name' => 'Book List','icon' => 'fas fa-bookmark','uri' => 'admin/book','permissions' => '["read-Book","create-Book","edit-Book","delete-Book"]','created_at' => '2021-04-25 11:10:39','updated_at' => '2021-04-25 11:11:26'),
      array('id' => '21','parent_id' => '19','order' => '3','name' => 'Featured Books','icon' => 'far fa-star','uri' => 'admin/book/featured-books','permissions' => '["read-Book","create-Book","edit-Book","delete-Book"]','created_at' => '2021-04-25 11:11:15','updated_at' => '2021-04-25 11:11:26'),
      array('id' => '22','parent_id' => '0','order' => '4','name' => 'Site Settings','icon' => 'fas fa-cog','uri' => 'admin/settings','permissions' => '["edit-Site-Settings"]','created_at' => '2021-04-25 11:25:02','updated_at' => '2021-04-25 11:25:12')
    );

    DB::table('menus')->insert($menus);
  }
}
