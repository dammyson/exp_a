<?php

use App\Http\Controllers\AccountController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\CardController;
use App\Http\Controllers\ProfileController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::group(['namespace' => 'auth'], function () {
    Route::post('login',  [AuthController::class,'postLogin'])->name('login');
    Route::post('registration', [AuthController::class,'create'])->name('auth.registration');
    Route::post('send_sms', [AuthController::class,'SendSms'])->name('auth.send');
    Route::post('verify_sms', [AuthController::class,'VerifySms'])->name('auth.verify');
});



Route::prefix('profile')->middleware('auth:api')->group(function () {
    Route::post('/', [ProfileController::class,'update'])->name('user.update_profile');
    Route::get('/', [ProfileController::class,'get'])->name('user.get_profile');
    Route::post('/password', [ProfileController::class,'updatePassword'])->name('password.update');
});



Route::prefix('accounts')->middleware('auth:api')->group(function () {
    Route::post('/', [AccountController::class,'create'])->name('user.update_profile');
    Route::get('/', [AccountController::class,'index'])->name('user.update_profile');
});

Route::prefix('cards')->middleware('auth:api')->group(function () {
    Route::post('/', [CardController::class,'create'])->name('create.card');
});


Route::prefix('transfers')->middleware('auth:api')->group(function () {
    Route::post('/', [AccountController::class,'transfer'])->name('create.transfer');
});