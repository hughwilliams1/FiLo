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

Route::get('/', function () {
    return view('welcome');
});

Route::get('items/list', 'ItemController@list');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::post('/item/insert', 'ItemController@insert')->name('item.insert');
Route::get('/request/destroy/{id}', 'ItemController@destroy')->name('item.destroy');

Route::post('/request/insert', 'RequestController@insert')->name('request.insert');

Route::get('/request/approve/{id}', 'RequestController@approve')->name('request.approve');
Route::get('/request/refuse/{id}', 'RequestController@refuse')->name('request.refuse');
