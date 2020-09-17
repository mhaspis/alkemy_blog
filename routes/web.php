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

/*Route::get('/', function () {
    return view('welcome');
});*/

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');

Route::get('/blog/create', 'BlogController@create')->name('blog.create');
Route::get('/blog/detail/{id}', 'BlogController@detail')->name('blog.detail');
Route::get('/blog/image/{image_path}', 'BlogController@getImage')->name('blog.getImage');
Route::post('/blog/store', 'BlogController@store')->name('blog.store');