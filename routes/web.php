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
Route::get('/', 'HomeController@index')->middleware('verified');
Route::get('/update-your-browser','HomeController@BrowserFailure')->name('browser.failure');

Route::group(['middleware' => ['web']], function () {

    Route::get('workshop','WorkshopController@showWorkshops')->name('workshop');
    Route::get('workshop/{workshop}/show','WorkshopController@show')->name('workshop.show');

    Route::get('articles','ArticleController@showArticles')->name('articles');
    Route::get('one-on-one','ArticleController@showOneOnOne')->name('oneOnOne');
    Route::get('topical','ArticleController@topical')->name('topical');
    Route::get('covid-19','ArticleController@covid')->name('covid');

    Route::get('article/{article}/show','ArticleController@show')->name('article.show');
    Route::get('/faq','FAQController@showFAQ')->name('faq');
    Route::get('/generatie-management','FAQController@showGenManagement')->name('gen.management');
    Route::get('/vragenlijsten','FAQController@showVragenlijsten')->name('vragenlijsten');
    Route::get('/goodhabitz','FAQController@showGoodHabitz')->name('goodhabitz');
    Route::get('/activiteitenkalender','FAQController@showActiviteitenkalender')->name('activiteitenkalender');
    Route::get('/contact','FAQController@showContact')->name('contact');

    Route::get('/home', 'HomeController@index')->name('home');


    Route::get('/download','ActivityCalenderController@downloadActivityCalender')->name('download.calender');
});

Auth::routes(['verify' => true]);

Route::group(['prefix' => 'backend/','middleware'=> ['web','admin']], function () {
    Route::get('workshop/overview','WorkshopController@showOverview')->name('workshop.overview');
    Route::get('workshop/overview/{workshop}/update','WorkshopController@updateWorkshop')->name('workshop.update');

    Route::get('workshop/add','WorkshopController@showCreate')->name('admin.add.workshop');

    Route::get('article/overview','ArticleController@showOverview')->name('article.show.overview');
    Route::get('article/create','ArticleController@showCreate')->name('article.show.create');
    Route::get('article/overview/{article}/update','ArticleController@showArticleUpdate')->name('article.update.show');

    Route::get('categories/overview','CategoryController@index')->name('category.overview');

    Route::get('categories/article/{category}/update','CategoryController@showUpdate')->name('categories.article.update.show');
    Route::get('categories/workshop/{category}/update','CategoryController@showWorkshopUpdate')->name('categories.workshop.update.show');

    route::get('/dashboard','HomeController@showFrontendDashboard')->name('show.frontend.dashboard');
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


Route::get('backend/management{any}','ManagementController@index')
    ->middleware(['web', 'manager'])
    ->where('any', '.*')
    ->name('management.index');


Route::group(['prefix' => 'axios/workshop', 'namespace' => 'Axios','middleware'=> ['web','default']], function () {
    route::get('{workshop}/checkLikes','WorkshopController@checkIfUserHasLiked')->name('workshop.check.personal.likes');
    route::post('{workshop}/like','WorkshopController@like')->name('workshop.like');
    route::post('{workshop}/dislike','WorkshopController@dislike')->name('workshop.dislike');
});


Route::group(['prefix' => 'axios/article', 'namespace' => 'Axios','middleware'=> ['web','default']], function () {
    route::get('{article}/checkLikes','ArticleController@checkIfUserHasLiked')->name('article.check.personal.likes');
    route::post('{article}/like','ArticleController@like')->name('article.like');
    route::post('{article}/dislike','ArticleController@dislike')->name('article.dislike');
});

Route::group(['prefix' => 'axios/me', 'namespace' => 'Axios','middleware'=> ['web','default']], function () {
    route::get('/favorite/workshop','UserController@getFavoriteWorkshops')->name('user.workshop.favorited');
    route::get('/favorite/article','UserController@getFavoriteArticles')->name('user.article.favorited');
});

Route::group(['prefix' => 'axios/article', 'namespace' => 'Axios','middleware'=> ['web','admin']], function() {
    Route::post('/post','ArticleController@store')->name('article.store');
    Route::post('/put','ArticleController@update')->name('article.put');

    route::post('/image/upload','ArticleController@uploadImage')->name('article.store.image');

    route::delete('{article}/delete','ArticleController@delete')->name('article.delete');
});

Route::group(['prefix' => 'axios/article', 'namespace' => 'Axios','middleware'=> ['web']], function() {
    route::get('/get-all','ArticleController@getAllArticles')->name('article.get.all');
    route::get('get-categories','ArticleController@getCategories')->name('article.get.category');
    route::get('get-all-standard-categories','ArticleController@getAllCategories')->name('article.get.all-standard.categories');
    route::get('get-one-on-one-categories','ArticleController@getOneOnOneCategory')->name('article.get.OneOnOne.categories');
    route::get('get-topical-categories','ArticleController@getTopicalCategory')->name('article.get.topical.categories');
    route::get('get-covid-categories','ArticleController@getCovidCategory')->name('article.get.covid.categories');

    route::get('get-all-articles-for-standard-categories', 'ArticleController@getAllArticlesForStandardCategories');

    route::post('/{article}/sign-up','ArticleController@signUpForArticle')->name('article.signup');
});


Route::group(['prefix' => 'axios/categories', 'namespace' => 'Axios','middleware'=> ['web','admin']], function() {
    route::get('/article/get-all','CategoryController@getArticleCategories')->name('categories.article.get.all');
    route::get('/workshop/get-all','CategoryController@getWorkshopCategories')->name('categories.workshop.get.all');

    route::put('/article/{category}/update','CategoryController@updateCategory')->name('article.category.update');
    route::put('/workshop/{category}/update','CategoryController@updateWorkshopCategory')->name('workshop.category.update');
});

Route::group(['prefix' => 'axios/workshop', 'namespace' => 'Axios','middleware'=> ['web']], function () {
    route::get('/get-all','WorkshopController@getAllWorkshops')->name('workshop.get');
    route::get('/get-categories','WorkshopController@getAllCategories')->name('categories.get');
    route::get('/get-physical','WorkshopController@getAllPhysicalVitalityWorkshops')->name('workshop.get.physical');
    route::get('/get-mental','WorkshopController@getAllMentalVitalityWorkshops')->name('workshop.get.mental');
    route::get('/get-growth','WorkshopController@getAllGrowthWorkshops')->name('workshop.get.growth');

    route::post('/{workshop}/sign-up','WorkshopController@signUpForWorkshop')->name('workshop.signup');
});

Route::group(['prefix' => 'axios', 'namespace' => 'Axios','middleware'=> ['web']], function () {
    Route::post('/contact/send','ContactController@sendGeneralContactForm')->name('contact.send');
});

Route::group(['prefix' => 'axios/chart', 'namespace' => 'Axios\Management','middleware'=> ['web','admin']], function() {

    Route::get('/','ChartController@pagesPerVisit')->name('chart.pagesPerVisit');
});
