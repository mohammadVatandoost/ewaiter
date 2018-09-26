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
Route::post('login',['as'=>'login','uses'=>'AuthController@post_login']);

Route::get('logout',['as'=>'logout','uses'=>'AuthController@logout']);

Route::get('menu',['as'=>'menu','uses'=>'CashierController@menu']);

Route::get('orders',['as'=>'orders','uses'=>'CashierController@orders']);

Route::post('send-order','UserController@sendOrder');

Route::get('report',['as'=>'report','uses'=>'CashierController@report']);

Route::get('edit-food/{id}',['as'=>'editFood','uses'=>'CashierController@editFood']);
Route::post('edit-food/{id}',['as'=>'editFood','uses'=>'CashierController@post_editFood']);

Route::get('contact',['as'=>'contact','uses'=>'PageController@contact']);

