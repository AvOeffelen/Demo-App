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
Route::get('/', 'HomeController@index')->middleware('web');

//TODO:: fix this route.
Route::get('workshop/add','DemoController@showAdminWorkshopAdd')->name('admin.add.workshop');
Route::get('workshop','WorkshopController@showWorkshops')->name('workshop');
Route::get('workshop/{workshop}/show','WorkshopController@show')->name('workshop.show');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/me','UserController@showProfile')->name('me');
Route::get('/faq','DemoController@showFAQ')->name('faq');


Route::group(['prefix' => 'backend/','middleware'=> ['web']], function () {
    Route::get('workshop/overview','WorkshopController@showOverview')->name('workshop.overview');
    Route::get('workshop/overview/{workshop}/update','WorkshopController@updateWorkshop')->name('workshop.update');

    Route::get('article/overview','ArticleController@showOverview')->name('article.show.overview');
    Route::get('article/create','ArticleController@showCreate')->name('article.show.create');
});



Route::group(['prefix' => 'axios/workshop', 'namespace' => 'Axios','middleware'=> ['web']], function () {
    route::post('/post','WorkshopController@store')->name('workshop.store');
    route::post('/image/upload','WorkshopController@uploadImage')->name('workshop.store.image');
    route::put('/put','WorkshopController@update')->name('workshop.update');
    route::delete('{workshop}/delete','WorkshopController@delete')->name('workshop.delete');


    route::get('{workshop}/checkLikes','WorkshopController@checkIfUserHasLiked')->name('workshop.check.personal.likes');

    route::post('{workshop}/like','WorkshopController@like')->name('workshop.like');
    route::post('{workshop}/dislike','WorkshopController@dislike')->name('workshop.dislike');

    route::get('/get-all','WorkshopController@getAllWorkshops')->name('workshop.get');
    route::get('/get-categories','WorkshopController@getAllCategories')->name('categories.get');
    route::get('/get-physical','WorkshopController@getAllPhysicalVitalityWorkshops')->name('workshop.get.physical');
    route::get('/get-mental','WorkshopController@getAllMentalVitalityWorkshops')->name('workshop.get.mental');
    route::get('/get-growth','WorkshopController@getAllGrowthWorkshops')->name('workshop.get.growth');
});
Route::group(['prefix' => 'axios/workshop', 'namespace' => 'Axios','middleware'=> ['web']], function () {
    route::post('{workshop}/like','WorkshopController@like')->name('workshop.like');
});

Route::group(['prefix' => 'axios/me', 'namespace' => 'Axios'], function () {
    route::get('/favorited','UserController@getFavorited')->name('user.favorited');
});

Route::group(['prefix' => 'axios/article', 'namespace' => 'Axios'], function() {
    Route::post('/post','ArticleController@store')->name('article.store');
    Route::put('/put','ArticleController@store')->name('article.put');

    route::post('/image/upload','ArticleController@uploadImage')->name('article.store.image');

    route::get('get-all','ArticleController@getAllArticles')->name('article.get.all');
    route::get('get-categories','ArticleController@getCategories')->name('article.get.category');
    route::delete('{article}/delete','ArticleController@delete')->name('article.delete');
});
