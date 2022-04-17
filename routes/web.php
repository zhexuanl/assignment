<?php

use App\Http\Controllers\BookingController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\HallController;

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

    //Delete Booking
    Route::delete('/admin/{booking:id}', [BookingController::class, 'destroy']);

    //Delete an existing hall
    Route::get('/admin/deleteHall/{id}', [HallController::class, 'deleteHall']);
});
Route::group(['middleware' => 'auth:user'], function () {

    //Home page
    Route::get('/user/home', [HallController::class, 'index'])->name('user.home');

    //Craete Booking
    Route::post('/user/bookHall', [BookingController::class, 'store']);

    //Get all personal booked Hall
    Route::get('user/bookings', [BookingController::class, 'index']);

    //Get booking
    Route::delete('/user/bookings/{booking:id}', [BookingController::class, 'destroy']);
});

Route::get('/', function () {
    return redirect("login");
});

Route::get('/logout', [LoginController::class, 'logout']);
