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
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\RoleController;

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
Route::get('roles', [RoleController::class, 'index'])->name('roles.index');
Route::post('roles', [RoleController::class, 'store'])->name('role.store');
