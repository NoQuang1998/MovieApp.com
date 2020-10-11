<?php

use App\Permissions;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('admin' , 'HomeController@admin')->name('admin');

Route::get('post/list' , 'PostController@index')->name('post.index');
Route::get('post/show/{id}' , 'PostController@show')->name('post.show');

Route::get('/shop', function(){
    return view('layouts.master');
});

Route::group(['prefix' => 'users'], function () {
    Route::get('list' , 'AdminUserController@index')->name('list.users');
    Route::get('create' , 'AdminUserController@create')->name('create.users')->middleware('can:add_user');
    Route::post('store' , 'AdminUserController@store')->name('store.users');
    Route::get('edit/{user}' , 'AdminUserController@edit')->name('edit.users');
    Route::put('update/{user}', 'AdminUserController@update')->name('update.users');
});

Route::group(['prefix' => 'roles'], function () {
    Route::get('list' , 'RolesController@index')->name('list.roles');
    Route::get('create' , 'RolesController@create')->name('create.roles');
    Route::post('store' , 'RolesController@store')->name('store.roles');
    Route::get('edit/{role}' , 'RolesController@edit')->name('edit.roles');
    Route::put('update/{role}' , 'RolesController@update')->name('update.roles');
    Route::get('delete/{role}' , 'RolesController@destroy')->name('destroy.roles');
}); 
