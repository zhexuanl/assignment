<?php

use App\Http\Controllers\BookingController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\HallController;
use App\Http\Controllers\UserController;

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


Auth::routes();

Route::group(['middleware' => 'auth:admin'], function () {




    //Home page- view hall
    Route::get('/admin/home', [AdminController::class, 'index'])->name('admin.home');

    //Add a new hall
    Route::view("/admin/addHall", "/admin/addHall");
    Route::post("/admin/addHall", [HallController::class, 'addHall']);

    //Edit an existing hall
    Route::get('/admin/editHall/{id}', [HallController::class, 'showEdit']);
    Route::post('/admin/editHall/{id}', [HallController::class, 'editHall']);

    //Delete an existing hall
    Route::get('/admin/deleteHall/{id}', [HallController::class, 'deleteHall']);
});
Route::group(['middleware' => 'auth:user'], function () {
    Route::get('/user/home', [HallController::class, 'index'])->name('user.home');
    Route::post('/user/bookHall', [BookingController::class, 'store']);
    Route::get('user/bookings', [BookingController::class, 'index']);
    Route::delete('/user/bookings/{booking:id}', [BookingController::class, 'destroy']);
});

Route::get('/', function () {
    return redirect("login");
});

Route::get('/logout', [LoginController::class, 'logout']);
