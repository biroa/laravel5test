<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', 'WelcomeController@index');
Route::get('article/{text}', 'WelcomeController@show');
Route::get('home', 'HomeController@index');
Route::resource('userprofiles', 'UserprofilesController');
Route::resource('articles', 'ArticlesController');
Route::resource('tags', 'TagsController');
Route::resource('categories', 'CategoriesController');
Route::resource('galleries', 'GalleriesController');
Route::resource('images', 'ImagesController');

Route::controllers([
    'auth' => 'Auth\AuthController',
    'password' => 'Auth\PasswordController',
]);
