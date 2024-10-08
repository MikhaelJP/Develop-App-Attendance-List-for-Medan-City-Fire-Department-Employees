<?php

use App\Http\Controllers\Api\AnnouncementController;
use App\Http\Controllers\Api\AttendanceController;
use App\Http\Controllers\Api\AuthenticationController;
use App\Http\Controllers\Api\FeedController;
use Illuminate\Support\Facades\Route;

// Authenticate
Route::post('/register', [AuthenticationController::class, 'register']);
Route::post('/login', [AuthenticationController::class, 'login']);

// Agar harus authorize dengan token, gunakan middleware 'auth:sanctum'
Route::middleware('auth:sanctum')->group(function () {
    // Attendance
    Route::get('/attendance/today', [AttendanceController::class, 'getTodayData']);
    Route::get('/attendance/few', [AttendanceController::class, 'getFewData']);
    Route::get('/attendance/all', [AttendanceController::class, 'getAllData']);
    Route::post('/attendance/checklocation', [AttendanceController::class, 'checkLocation']);
    Route::post('/attendance/store', [AttendanceController::class, 'store']);

    // Announcement
    Route::get('/announcement/few', [AnnouncementController::class, 'getFewData']);
    Route::get('/announcement/all', [AnnouncementController::class, 'getAllData']);
});