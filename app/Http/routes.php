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
Route::get('userprofiles', 'UserprofilesController@index');
Route::resource('articles', 'ArticlesController');
Route::resource('tags', 'TagsController');
Route::resource('categories', 'CategoriesController');

Route::controllers([
    'auth' => 'Auth\AuthController',
    'password' => 'Auth\PasswordController',
]);


Event::listen('illuminate.query', function ($query) {
    var_dump($query);
});