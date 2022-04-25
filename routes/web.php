<?php

use App\Http\Controllers\admin\PostController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\UiController;
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
Route::get('/posts', 'App\Http\Controllers\UiController@postIndex');
Route::get('/posts/{id}/details', 'App\Http\Controllers\UiController@postDetailsIndex');
Route::get('/search_posts', [UiController::class,'search']);
Route::get('/search_posts_by_category/{catId}', [UiController::class,'searchByCategory']);

//like.disLike
Route::post('/post/like/{postId}', 'App\Http\Controllers\LikeDislikeController@like');
Route::post('/post/disLike/{postId}', 'App\Http\Controllers\LikeDislikeController@disLike');

//comment
Route::post('/post/comment/{postId}', [CommentController::class, 'comment']);

//Admin
Route::group(['prefix' => 'admin', 'middleware' =>['auth' , 'isAdmin']], function () {

    Route::get('/dashboard','App\Http\Controllers\admin\AdminDashboardController@index');

    //User
    Route::get('/users','App\Http\Controllers\admin\UserController@index');
    Route::get('/users/{id}/edit','App\Http\Controllers\admin\UserController@edit');
    Route::post('/users/{id}/update','App\Http\Controllers\admin\UserController@update');
    Route::post('/users/{id}/delete','App\Http\Controllers\admin\UserController@delete');

    //Skill
    Route::resource('skills', 'App\Http\Controllers\admin\SkillController');
    // Route::resource('skills', SkillController::class);

    //Project
    Route::resource('projects', 'App\Http\Controllers\admin\ProjectController');
    // Route::resource('projects', ProjectController::class);

    //StudentCount
    Route::get('student_counts', 'App\Http\Controllers\admin\StudentCountControler@index');
    Route::post('student_counts/store', 'App\Http\Controllers\admin\StudentCountControler@store');
    Route::post('student_counts/{id}/update', 'App\Http\Controllers\admin\StudentCountControler@update');

    //Category
    Route::resource('categories','App\Http\Controllers\admin\CategoryController');

    //Post
    Route::resource('posts', 'App\Http\Controllers\admin\PostController');

    //Comment showhide
    Route::post('comment/{commentId}/show_hide', [PostController::class, 'showHideComment']);
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
