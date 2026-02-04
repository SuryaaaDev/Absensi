<?php

use App\Http\Controllers\Api\AttendanceApiController;
use App\Http\Controllers\Api\AuthApiController;
use App\Http\Controllers\Api\DeviceApiController;
use App\Http\Controllers\Api\DivisionApiController;
use App\Http\Controllers\Api\RFIDController;
use App\Http\Controllers\Api\StatusApiController;
use App\Http\Controllers\Api\StudentClassApiController;
use App\Http\Controllers\Api\UserApiController;
use App\Http\Controllers\AttendanceController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/rfid', [RFIDController::class, 'store']);
Route::get('/card', [RFIDController::class, 'index']);
Route::get('/students/card/{card_number}', [UserApiController::class, 'findByCard']);

Route::get('/scan', [AttendanceApiController::class, 'handleScan']);

Route::post('/login', [AuthApiController::class, 'login'])->name('auth.login');
Route::post('/logout', [AuthApiController::class, 'logout'])->name('auth.logout');
Route::get('/welcome', [AuthApiController::class, 'welcome'])->name('auth.welcome');

Route::apiResource('students', UserApiController::class);
Route::get('/students/{id}/{name}', [UserApiController::class, 'showStudent']);
// Route::get('/students/search', [UserApiController::class, 'search']);

Route::apiResource('classes', StudentClassApiController::class);
Route::get('/classes/{id}/{slug}', [StudentClassApiController::class, 'showClass']);

Route::apiResource('statuses', StatusApiController::class);
Route::apiResource('devices', DeviceApiController::class);
Route::get('/divisions/dashboard', [DivisionApiController::class, 'dashboard']);
Route::get('/divisions', [DivisionApiController::class, 'index']);
Route::post('/divisions/{id}', [DivisionApiController::class, 'store']);
Route::get('/divisions/{id}/{slug}', [DivisionApiController::class, 'show']);

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/divisions/profile', [DivisionApiController::class, 'profile']);
    Route::put('/divisions/profile/update/{id}', [DivisionApiController::class, 'updateProfile']);
});
