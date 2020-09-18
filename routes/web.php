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

Route::get('/posts/create', 'BlogController@create')->name('blog.create');
Route::get('/posts/{id}', 'BlogController@detail')->name('blog.detail');
Route::get('/posts', 'BlogController@showAll')->name('blog.showAll');
Route::get('/posts/edit/{id}', 'BlogController@edit')->name('blog.edit');
Route::patch('/posts/{id}', 'BlogController@update')->name('blog.update');
Route::get('/posts/image/{image_path}', 'BlogController@getImage')->name('blog.getImage');
Route::post('/posts', 'BlogController@store')->name('blog.store');
Route::delete('/posts/{id}', 'BlogController@delete')->name('blog.delete');