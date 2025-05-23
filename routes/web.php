<?php

use App\Admin\CategoryController;
use App\Http\Controllers\Admin\CategoryController as AdminCategoryController;
use App\Http\Controllers\Admin\MainController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\PostController as ControllersPostController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;


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
})->name('home');

Route::group(['prefix'=>'admin', 'namespace'=> 'Admin'],function(){
    Route::get('/', [MainController::class, 'index'])->name('admin.index');
});

Route::group(['prefix' => 'admin', 'namespace' => 'App\Http\Controllers\Admin'], function () {
    Route::get('/', [MainController::class, 'index'])->name('admin.index');
    Route::resource('categories', App\Http\Controllers\Admin\CategoryController::class);
    Route::resource('tags', App\Http\Controllers\Admin\TagController::class);
    Route::resource('posts', App\Http\Controllers\Admin\PostController::class);
});
Route::put('/posts/{id}', [PostController::class, 'update']);

Route::get('/register', [UserController::class, 'create'])->name('register.create');
Route::post('/register', [UserController::class, 'store'])->name('register.store');

Route::get('/login', [UserController::class, 'loginForm'])->name('login.create');
Route::post('/login', [UserController::class, 'login'])->name('login');
Route::get('/logout', [UserController::class, 'logout'])->name('logout');

Route::get('/',[App\Http\Controllers\PostController::class,'index'])->name('home');
Route::get('/article/{slug}',[App\Http\Controllers\PostController::class,'show'])->name('posts.single');
Route::get('/category/{slug}',[App\Http\Controllers\CategoryController::class,'show'])->name('categories.single');
Route::get('/tag/{slug}',[App\Http\Controllers\TagController::class,'show'])->name('tags.single');


Route::get('/search', [SearchController::class, 'index'])->name('search');
