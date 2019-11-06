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

Route::get('/', 'MainController@index');

Route::post('/index/add', 'MainController@ManufacturerAdd');
Route::post('/index/add1', 'MainController@TypeAdd');
Route::post('/index/add2', 'MainController@BeerAdd');

Route::match(['get','post','delete'],'/index/edit/{manufacturer}',['uses'=>'ManufacturerEditController@execute','as'=>'ManufacturerEdit']);
Route::match(['get','post','delete'],'/index/edit1/{type}',['uses'=>'TypeEditController@execute','as'=>'TypeEdit']);
Route::match(['get','post','delete'],'/index/edit2/{beer}',['uses'=>'BeersEditController@execute','as'=>'BeersEdit']);

Route::get('/index/cat/{manufacturer}', 'MainController@index');
Route::get('/index/cat1/{manufacturer}/{type}', 'MainController@index');
