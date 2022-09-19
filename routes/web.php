<?php

use App\Http\Controllers\SettingsController;
use App\Http\Controllers\TokenController;
use Illuminate\Routing\Route as RoutingRoute;
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

Route::get('/', function () {
    return view('welcome');
})->middleware(['verify.shopify'])->name('home');
Route::get('token',[TokenController::class,'data']);

Route::get('activate',[SettingsController::class,'get']); 
    // return view('activate');
Route::post('post_token',[TokenController::class,'index']);
Route::post('settings',[SettingsController::class,'index']);
