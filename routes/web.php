<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\AuthController;
use App\Models\Category;

Route::middleware('auth')->get('/', [HomeController::class, 'index']);

Route::get('/about', [HomeController::class, 'about']);

// Route::get('user/{name}', function (string $name = 'khoa') {
//     return "Name: {$name}";
// });
// Route::prefix('/products')->group(function () {
//     Route::get('/', function() {s
//         return 'Products';
//     });

//     Route::get('/{id}', function($id) {
//         return 'Products' . $id;
//     });
// });

// Route::fallback(function(){
//     return view('404');
// });

// Route::get('/', [HomeController::class, 'index']);

// Route::get('/users', [UserController::class, 'index'])->middleware('access.time');

// Route::get('/about', [HomeController::class, 'about']);


Route::prefix('users')->controller(UserController::class)->name('users.')->group(function () {

    Route::get('/', 'index')->name('index');
    Route::get('/create', 'create')->name('create');
    Route::post('/store', 'store')->name('store');
});

Route::middleware('auth')->prefix('posts')->controller(PostController::class)->name('posts.')->group(function () {
    Route::get('/', 'index')->name('index');
    Route::get('/create', 'create')->name('create');
    Route::post('/store', 'store')->name('store');
    Route::get('/{id}', 'edit')->name('edit');
    Route::put('/{id}', 'update')->name('update');
    Route::get('/{id}/destroy', 'destroy')->name('destroy');
});

Route::prefix('categories')->controller(CategoryController::class)->name('categories.')->group(function () {
    Route::get('/', 'index')->name('index');
    Route::get('/create', 'create')->name('create');
    Route::post('/', 'store')->name('store');
    Route::get('destroyAll', 'destroyAll')->name('destroyAll');
    Route::get('/{id}', 'edit')->name('edit');
    Route::put('/{id}', 'update')->name('update');
    Route::get('/{id}/destroy', 'destroy')->name('destroy');
});

Route::get('register', [AuthController::class, 'register'])->name('register');
Route::post('register', [AuthController::class, 'postRegister'])->name('postRegister');

Route::get('login', [AuthController::class, 'login'])->name('login');
Route::post('login', [AuthController::class, 'postLogin'])->name('postLogin');

Route::get('logout', [AuthController::class, 'logout'])->name('logout');
Route::post('logout', [AuthController::class, 'postLogout'])->name('postLogout');