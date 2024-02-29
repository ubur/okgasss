<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Back\UserController;
use App\Http\Controllers\Back\ArticleController;
use App\Http\Controllers\Back\CategoryController;
use App\Http\Controllers\Back\dashboardController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


Route::middleware('auth')->group(function(){
    Route::get('/dashboard',[dashboardController::class,'index']);
    Route::resource('/categories', CategoryController::class)->only([
        'index', 'store', 'update', 'destroy'
    ])->middleware('UserAccess:1');
    Route::resource('article', ArticleController::class);
    Route::resource('/users', UserController::class);
    

    Route::group(['prefix' => 'laravel-filemanager'], function () {
        \UniSharp\LaravelFilemanager\Lfm::routes();
    });
});
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
