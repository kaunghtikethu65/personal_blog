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

//UI
Route::get('/', 'App\Http\Controllers\UiController@index');

//Admin
Route::group(['prefix' => 'admin', 'middleware' =>['auth' , 'isAdmin']], function () {
    Route::get('/dashboard','App\Http\Controllers\admin\AdminDashboardController@index');

    //User
    Route::get('/users','App\Http\Controllers\admin\UserController@index');
    Route::get('/users/{id}/edit','App\Http\Controllers\admin\UserController@edit');
    Route::post('/users/{id}/update','App\Http\Controllers\admin\UserController@update');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
