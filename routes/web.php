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
Auth::routes();
Route::get('/', 'BlogController@index');

Route::group(['middleware' => 'auth'], function(){
    Route::get('/home', 'HomeController@index');
    Route::resource('/category','CategoryController');
    Route::resource('/tag','TagController');
    Route::get('/admin/sampah', 'PostController@sampah');
    Route::get('/admin/restore/{id}', 'PostController@restore');
    Route::get('/admin/hapus/{id}', 'PostController@hapus');
    Route::resource('/post','PostController');
    Route::resource('/admin/user','UserController');
});
