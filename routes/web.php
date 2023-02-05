<?php

use App\Http\Controllers\UserController;
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


Route::get('/', 'App\Http\Controllers\UserController@landing')->name('home');
Route::get('/register', 'App\Http\Controllers\UserController@register');
Route::post('/postLogin', 'App\Http\Controllers\UserController@postLogin')->name('postLogin');
Route::post('/postRegist', 'App\Http\Controllers\UserController@postRegist')->name('postRegist');

Route::get('/login', 'App\Http\Controllers\UserController@login')->name('login');;
Route::group(['middleware' => ['authAdmin']], function () {
    Route::get('/accountManagement', 'App\Http\Controllers\UserController@accountManagement');
    Route::get('/updateRole/{id}', 'App\Http\Controllers\UserController@updateRole');
    Route::delete('/deleteUser/{id}', 'App\Http\Controllers\UserController@deleteUser');
    Route::post('/postUpdateRole', 'App\Http\Controllers\UserController@postUpdateRole');
});

Route::group(['middleware' => ['auth']], function () {
    Route::post('/logout', 'App\Http\Controllers\UserController@logout');
    Route::get('/item/{id}', 'App\Http\Controllers\ItemController@show');
    Route::post('/addToCart', 'App\Http\Controllers\OrderController@store')->name('addToCart');
    Route::get('/cart', 'App\Http\Controllers\OrderController@index');
    Route::delete('/deleteCart/{id}', 'App\Http\Controllers\OrderController@destroy');
    Route::post('/checkOut', 'App\Http\Controllers\OrderController@checkOut');
    Route::get('/profile', 'App\Http\Controllers\UserController@profile');
    Route::post('/updateProfile', 'App\Http\Controllers\UserController@updateProfile');
});


