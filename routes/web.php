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

Route::namespace('Frontend')->group(function () {
    Route::get('/','DefaultController@index')->name('home.Index');

    //BLOG
    Route::get('/blogs','BlogController@index')->name('blogs.Index');
    Route::get('/blogs/{slug}','BlogController@detail')->name('blogs.Detail');

    //BLOG
    Route::get('/movies','MovieController@index')->name('movies.Index');
    Route::get('/movies/{slug}','MovieController@detail')->name('movies.Detail');

    //PAGE
    Route::get('/pages/{slug}','PageController@detail')->name('pages.Detail');

    //CONTACT
    Route::get('/contact','DefaultController@contact')->name('contact.Detail');
    Route::post('/contact','DefaultController@sendmail');

    //Search Module
    Route::get('/autocomplete', 'AutocompleteController@index');
    Route::post('/autocomplete/fetch', 'AutocompleteController@fetch')->name('autocomplete.fetch');

});

Route::namespace('Backend')->group(function () {

    Route::prefix('vpanel')->group(function () {
        Route::get('/dashboard', 'DefaultController@index')->name('vpanel.Index')->middleware('admin');
        Route::get('/', 'defaultController@login')->name('vpanel.Login')->middleware('CheckLogin');
        Route::get('/logout', 'defaultController@---logout')->name('vpanel.Logout');
        Route::post('/login', 'defaultController@authenticate')->name('vpanel.Authenticate');

    });

    Route::middleware(['admin'])->group(function () {
        Route::prefix('vpanel/settings')->group(function () {
            Route::get('/', 'SettingsController@index')->name('settings.Index');
            Route::post('', 'SettingsController@sortable')->name('settings.Sortable');
            Route::get('/delete/{id}', 'SettingsController@destroy');
            Route::get('/edit/{id}', 'SettingsController@edit')->name('settings.Edit');
            Route::post('/update/{id}', 'SettingsController@update')->name('settings.Update');
        });
    });
});

Route::namespace('Backend')->group(function () {
    Route::prefix('vpanel')->group(function () {

        Route::middleware(['admin'])->group(function () {

            //Blog Module
            Route::post('/blog/sortable', 'BlogController@sortable')->name('blog.Sortable');
            Route::resource('blog', 'BlogController');

            //Movie Module
            Route::post('/movie/sortable', 'MovieController@sortable')->name('movie.Sortable');
            Route::resource('movie', 'MovieController');

            //Page Module
            Route::post('/page/sortable', 'PageController@sortable')->name('page.Sortable');
            Route::resource('page', 'PageController');

            //Slider Module
            Route::post('/slider/sortable', 'SliderController@sortable')->name('slider.Sortable');
            Route::resource('slider', 'SliderController');

            //Admin Module
            Route::post('/user/sortable', 'UserController@sortable')->name('user.Sortable');
            Route::resource('user', 'UserController');


        });
    });
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


