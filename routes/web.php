<?php

use App\Http\Controllers\HomePageController;
use App\Http\Controllers\ServiceController;
use Illuminate\Routing\Route as RoutingRoute;
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

//Route::get('/', [ServiceController::class, 'index']);

Route::get('/', [HomePageController::class, 'index'])->name('homepage');

