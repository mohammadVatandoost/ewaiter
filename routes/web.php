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

Route::get('/',['as'=>'main','uses'=>'PageController@index']);

Route::get('login',['as'=>'login','uses'=>'AuthController@login']);

Route::get('menu',['as'=>'menu','uses'=>'PageController@menu']);

Route::get('orders',['as'=>'orders','uses'=>'PageController@orders']);

Route::get('report',['as'=>'report','uses'=>'PageController@report']);

Route::get('edit-food',['as'=>'editFood','uses'=>'PageController@editFood']);

Route::get('contact',['as'=>'contact','uses'=>'PageController@contact']);

