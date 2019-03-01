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

/** frontend routes */
Route::get('/', function () {
    return view('welcome');
});


Auth::routes();


/** dit zijn mijn backend routes + bescherming via middleware */
Route::group(['middleware' => 'admin'], function () {
    Route::get('/admin', 'HomeController@index');
    Route::resource('/admin/users', 'AdminUsersController');
    Route::resource('admin/posts', 'AdminPostsController');
    Route::resource('admin/categories', 'AdminCategoriesController');
});







