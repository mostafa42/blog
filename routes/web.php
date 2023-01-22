<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\CustomAuth;
use App\Http\Middleware\ReturnLogin;
use App\Models\User;
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
Route::middleware([ReturnLogin::class])->group(function () {
    Route::get('/', [AuthController::class , "index"]);
    Route::post('/login', [AuthController::class , "login"]);

    Route::get('/create-account', [AuthController::class , "create_account"]);
    Route::post('/sign-up', [AuthController::class , "signUp"]);
});

Route::middleware([CustomAuth::class])->group(function () {
    Route::group(['prefix' => 'dashboard'], function () {
        Route::get('user' , [UserController::class , 'index']);
        Route::resource('posts' , PostController::class);
        Route::get('delete-image/{id}' , [PostController::class , "deleteImage"]);
        Route::resource('comments' , CommentController::class);

        Route::get('/notfound' , function(){ return view('not_found'); });

        Route::get('/logout', [AuthController::class , "logout"]);
    });
});
