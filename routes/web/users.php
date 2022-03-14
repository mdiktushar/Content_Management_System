<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
Controller
|--------------------------------------------------------------------------
*/
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminsController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UsersController;

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

Route::middleware('auth')->group(function () {
    Route::put('admin/user/{user}/update', [UsersController::class, 'update'])->name('user.profile.update');
    Route::delete('admin/users/{user}/distroy', [UsersController::class, 'distroy'])->name('user.distroy');
});

Route::middleware('role:Admin')->group(function () {
    # code...
    Route::get('admin/users', [UsersController::class, 'index'])->name('users.index');
});

Route::middleware('can:view,user')->group(function () {
    Route::get('admin/user/{user}/profile', [UsersController::class, 'show'])->name('user.profile.show');
});
