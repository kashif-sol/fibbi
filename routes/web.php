<?php

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
Route::get('token', function () {
    return view('token');
});
Route::get('activate', function () {
    return view('activate');
});
Route::post('token',[TokenController::class,'index']);
