<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\AdminController;

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::group(['middleware' => 'auth:admin'], function () {

    //Home page- view hall
    Route::get('/admin/home', [AdminController::class, 'index']);

    //Add a new hall
    Route::view("/admin/addHall", "/admin/addHall");
    Route::post("/admin/addHall", [HallController::class, 'addHall']);

    //Edit an existing hall
    Route::get('/admin/editHall/{id}', [HallController::class, 'showEdit']);
    Route::post('/admin/editHall/{id}', [HallController::class, 'editHall']);

    //Delete an existing hall



});