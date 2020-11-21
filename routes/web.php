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
Route::get('workshop','WorkshopController@showWorkshops')->name('workshop');
Route::get('workshop/{workshop}/show','WorkshopController@show')->name('workshop.show');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/me','DemoController@showProfile')->name('me');
Route::get('/faq','DemoController@showFAQ')->name('faq');


Route::group(['prefix' => 'backend/'], function () {
    Route::get('workshop/overview','WorkshopController@showOverview')->name('workshop.overview');
    Route::get('workshop/overview/{workshop}/update','WorkshopController@updateWorkshop')->name('workshop.update');
});



Route::group(['prefix' => 'axios/workshop', 'namespace' => 'Axios'], function () {
    route::post('/post','WorkshopController@store')->name('workshop.store');
    route::put('/put','WorkshopController@update')->name('workshop.update');
    route::delete('{workshop}/delete','WorkshopController@delete')->name('workshop.delete');

    route::post('/like','WorkshopController@like')->name('workshop.like');

    route::get('/get-all','WorkshopController@getAllWorkshops')->name('workshop.get');
    route::get('/get-categories','WorkshopController@getAllCategories')->name('categories.get');
    route::get('/get-physical','WorkshopController@getAllPhysicalVitalityWorkshops')->name('workshop.get.physical');
    route::get('/get-mental','WorkshopController@getAllMentalVitalityWorkshops')->name('workshop.get.mental');
    route::get('/get-growth','WorkshopController@getAllGrowthWorkshops')->name('workshop.get.growth');
});
