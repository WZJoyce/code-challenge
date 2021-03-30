<?php

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

use App\Http\Controllers\DashboardController;

Route::get('/',[DashboardController::class,'home']);
Route::get('searchimage', [DashboardController::class, 'searchImage']);
Route::get('medialibrary',[DashboardController::class,'mediaLibrary']);


