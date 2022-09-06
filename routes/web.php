<?php

use App\Http\Controllers\Admin\AdminAuthController;
use App\Http\Controllers\Admin\AdminPageController;
use App\Http\Controllers\Admin\Permission;
use App\Http\Controllers\Admin\PermissionController;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\ClientsController;
use App\Http\Controllers\Frontend\FrontEndPages;
use App\Http\Controllers\OurClientsController;
use App\Http\Controllers\RoleController;
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
//Admin login And Auth

Route::get('/admin-login', [AdminAuthController::class , 'login'])->name('login')->middleware('redirect');
Route::post('/admin-login', [AdminAuthController::class , 'login_check'])->name('login.check')->middleware('redirect');

//logout
Route::get('/logout', [AdminAuthController::class , 'logout'])->name('logout');
//Dashboard
Route::group(['middleware' => 'login'], function(){
    Route::get('/dashboard', [AdminPageController::class , 'dashboard'])-> name('dashboard');
    Route::resource('permission', PermissionController::class);
    Route::resource('role', RoleController::class);
    Route::resource('user', UserController::class);
    Route::resource('slider', SliderController::class);
    Route::resource('client', ClientsController::class);
});
//FrontEnd
Route::get('/home', [FrontEndPages::class, 'home'])-> name('home');

