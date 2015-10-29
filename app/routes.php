<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', ['as' => 'home', 'uses' => 'HomeController@getIndex'])->before('auth');
Route::post('/', 'HomeController@postIndex')->before('csrf');

Route::get('new', ['as' => 'new', 'uses' => 'HomeController@getNew']);
Route::post('new', 'HomeController@postNew')->before('csrf');

Route::get('delete/{item_id}', ['as' => 'delete', 'uses' => 'HomeController@getDelete']);

Route::get('login', ['as' => 'new', 'uses' => 'AuthController@getLogin'])->before('guest');
Route::post('login', 'AuthController@postLogin')->before('csrf');
