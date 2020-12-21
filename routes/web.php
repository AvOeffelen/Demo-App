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
Route::get('/', 'HomeController@index');

Route::get('workshop','WorkshopController@showWorkshops')->name('workshop');
Route::get('workshop/{workshop}/show','WorkshopController@show')->name('workshop.show');

Route::get('articles','ArticleController@showArticles')->name('articles');
Route::get('one-on-one','ArticleController@showOneOnOne')->name('oneOnOne');
Route::get('topical','ArticleController@topical')->name('topical');

Route::get('article/{article}/show','ArticleController@show')->name('article.show');
Route::get('/faq','FAQController@showFAQ')->name('faq');

Route::get('/home', 'HomeController@index')->name('home');


Route::get('/download','ActivityCalenderController@downloadActivityCalender')->name('download.calender');

Route::get('/download','ActivityCalenderController@downloadActivityCalender')->name('download.calender');

Auth::routes();

Route::group(['prefix' => 'backend/','middleware'=> ['web','admin']], function () {
    Route::get('workshop/overview','WorkshopController@showOverview')->name('workshop.overview');
    Route::get('workshop/overview/{workshop}/update','WorkshopController@updateWorkshop')->name('workshop.update');

    Route::get('workshop/add','WorkshopController@showCreate')->name('admin.add.workshop');

    Route::get('article/overview','ArticleController@showOverview')->name('article.show.overview');
    Route::get('article/create','ArticleController@showCreate')->name('article.show.create');
    Route::get('article/overview/{article}/update','ArticleController@showArticleUpdate')->name('article.update.show');
});
Route::group(['prefix' => 'axios/workshop', 'namespace' => 'Axios','middleware'=> ['web','admin']], function () {
    route::post('/post','WorkshopController@store')->name('workshop.store');
    route::post('/image/upload','WorkshopController@uploadImage')->name('workshop.store.image');
    route::post('/put','WorkshopController@update')->name('workshop.update');
    route::delete('{workshop}/delete','WorkshopController@delete')->name('workshop.delete');
});

Route::group(['middleware'=> ['web','default']], function () {
    Route::get('/me','UserController@showProfile')->name('me');
});


Route::group(['prefix' => 'axios/workshop', 'namespace' => 'Axios','middleware'=> ['web','default']], function () {


    route::get('{workshop}/checkLikes','WorkshopController@checkIfUserHasLiked')->name('workshop.check.personal.likes');

    route::post('{workshop}/like','WorkshopController@like')->name('workshop.like');
    route::post('{workshop}/dislike','WorkshopController@dislike')->name('workshop.dislike');

    route::post('{workshop}/like','WorkshopController@like')->name('workshop.like');

    route::get('/get-all','WorkshopController@getAllWorkshops')->name('workshop.get');
    route::get('/get-categories','WorkshopController@getAllCategories')->name('categories.get');
    route::get('/get-physical','WorkshopController@getAllPhysicalVitalityWorkshops')->name('workshop.get.physical');
    route::get('/get-mental','WorkshopController@getAllMentalVitalityWorkshops')->name('workshop.get.mental');
    route::get('/get-growth','WorkshopController@getAllGrowthWorkshops')->name('workshop.get.growth');
});

Route::group(['prefix' => 'axios/me', 'namespace' => 'Axios','middleware'=> ['web','default']], function () {
    route::get('/favorited','UserController@getFavorited')->name('user.favorited');
});

Route::group(['prefix' => 'axios/article', 'namespace' => 'Axios','middleware'=> ['web','admin']], function() {
    Route::post('/post','ArticleController@store')->name('article.store');
    Route::post('/put','ArticleController@update')->name('article.put');

    route::post('/image/upload','ArticleController@uploadImage')->name('article.store.image');

    route::delete('{article}/delete','ArticleController@delete')->name('article.delete');
});
Route::group(['prefix' => 'axios/article', 'namespace' => 'Axios','middleware'=> ['web','default']], function() {

    route::get('/get-all','ArticleController@getAllArticles')->name('article.get.all');
    route::get('get-categories','ArticleController@getCategories')->name('article.get.category');
    route::get('get-all-standard-categories','ArticleController@getAllCategories')->name('article.get.all-standard.categories');
    route::get('get-one-on-one-categories','ArticleController@getOneOnOneCategory')->name('article.get.OneOnOne.categories');
    route::get('get-topical-categories','ArticleController@getTopicalCategory')->name('article.get.topical.categories');
});


Route::group(['prefix' => 'axios/workshop', 'namespace' => 'Axios'], function () {
    route::get('/get-all','WorkshopController@getAllWorkshops')->name('workshop.get');
    route::get('/get-categories','WorkshopController@getAllCategories')->name('categories.get');
    route::get('/get-physical','WorkshopController@getAllPhysicalVitalityWorkshops')->name('workshop.get.physical');
    route::get('/get-mental','WorkshopController@getAllMentalVitalityWorkshops')->name('workshop.get.mental');
    route::get('/get-growth','WorkshopController@getAllGrowthWorkshops')->name('workshop.get.growth');

    route::get('/get-all','ArticleController@getAllArticles')->name('article.get.all');
    route::get('get-categories','ArticleController@getCategories')->name('article.get.category');
    route::get('get-all-standard-categories','ArticleController@getAllCategories')->name('article.get.all-standard.categories');
    route::get('get-one-on-one-categories','ArticleController@getOneOnOneCategory')->name('article.get.OneOnOne.categories');
    route::get('get-topical-categories','ArticleController@getTopicalCategory')->name('article.get.topical.categories');
});
