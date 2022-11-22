<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SettingsController;
use App\Http\Controllers\TokenController;

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





Route::middleware(['verify.shopify' , 'billable'])->group(function () {
    Route::get('/',[TokenController::class,'home'])->name('home');
    Route::get('addtoken',[TokenController::class,'tokenForm'])->name('addToken');
    Route::post('save_token',[TokenController::class,'saveToken'])->name('saveToken');
    Route::get('activate',[SettingsController::class,'activeFibbl'])->name('activate');
    Route::post('settings',[SettingsController::class,'index']); 
    Route::post('activatebtn',[SettingsController::class,'status'])->name("activatebtn"); 
});

Route::get('get-selector',[SettingsController::class,'get_selector']);
Route::get('/api/update-selector',[SettingsController::class,'update_selector']);
Route::get('/api/settings',[SettingsController::class,'shop_settings']);