<?php

use Illuminate\Support\Facades\Route;

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
// Example Routes
Route::view('/', 'dashboard');
Route::match(['get', 'post'], '/dashboard', function(){
    return view('dashboard');
});
Route::view('/pages/slick', 'pages.slick');
Route::view('/pages/datatables', 'pages.datatables');
Route::view('/pages/blank', 'pages.blank');


Route::get('workshop/add','DemoController@showAdminWorkshopAdd')->name('admin.add.workshop');
Route::get('workshop','DemoController@showWorkShops')->name('workshop');
Route::get('workshop/show','DemoController@showWorkshop')->name('workshop.show');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
