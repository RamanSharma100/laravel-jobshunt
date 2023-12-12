<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\UserController;
use App\Http\Controllers\DashboardController;

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

Route::group(['prefix' => '/register'], function () {
    Route::get('/', [UserController::class, 'index'])->name('register');
    Route::get("/seeker", [UserController::class, "createSeeker"])->name("create.seeker");
    Route::post("/seeker", [UserController::class, "storeSeeker"])->name("store.seeker");
})->name("register.group");

Route::group(['prefix' => '/login'], function () {
    Route::get("/", [UserController::class, "login"])->name('login');
    Route::post("/", [UserController::class, "postLogin"])->name('login.post');

})->name('login.group');

Route::post("/logout", [UserController::class, "logout"])->name('logout');

Route::group(['prefix' => '/dashboard'], function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
})->name('dashboard.group');
