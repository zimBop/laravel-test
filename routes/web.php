<?php

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

Route::group(
    [
        'prefix' => 'admin',
        'namespace' => 'Admin',
        'middleware' => ['auth']
    ],
    function () {
        Route::get('/', 'DashboardController@dashboard')->name('admin.index');
        Route::get('/home_page', 'HomePageController@edit')->name('admin.home_page');
        Route::post('/home_page', 'HomePageController@store')->name('admin.home_page_store');
        Route::resource('/news', 'NewsController', ['as' => 'admin']);
        Route::resource('/gallery', 'GalleryController', ['as' => 'admin'])
            ->except(['edit', 'show', 'update']);
    }
);

Auth::routes();

Route::get('/', 'SiteController@index')->name('home');
Route::get('/news', 'SiteController@newsList')->name('news_list');
Route::get('/news/{slug}', 'SiteController@news')->name('news');
