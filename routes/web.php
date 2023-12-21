<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AdsController;
use App\Http\Controllers\ApiLoginController;
use App\Http\Controllers\LiveAdsController;
use App\Http\Controllers\LiveVideosController;
use App\Http\Controllers\VideosController;
use App\Http\Controllers\WalletController;
use Illuminate\Support\Facades\Route;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

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
    if(!session('logged_in')){
        return view('login');
    } else {
        return redirect(url('dashboard'));
    }
});


// Route::get('login', 'App\Http\Controllers\ApiLoginController@login');
Route::post('login', 'App\Http\Controllers\ApiLoginController@login');


Route::get('logout',[ApiLoginController::class,'logout']);

// Dashboard

Route::get('dashboard', [DashboardController::class,'index']);


// Ads Controller 
Route::post('create-ads', [AdsController::class,'create']);
// Route::get('create-ads', [AdsController::class,'create']);


// Live Ads Controller 
Route::post('live-ads', [LiveAdsController::class,'create']);
// Route::get('live-ads', [LiveAdsController::class,'create']);


// Admin Live Videos Controller 
Route::post('admin-live', [LiveVideosController::class,'create']);
// Route::get('admin-live', [LiveVideosController::class,'create']);


// Admin Videos Controller 
Route::post('create-videos', [VideosController::class,'create']);
// Route::get('create-videos', [VideosController::class,'create']);

// Admin Wallet Update Controller 
Route::post('wallet-update', [WalletController::class,'create']);
// Route::get('wallet-update', [WalletController::class,'create']);