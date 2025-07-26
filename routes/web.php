<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\MonthlyAttendanceController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\StatusController;
use App\Http\Controllers\StudentClassController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\UserController;
use App\Models\Permission;
use Illuminate\Database\Eloquent\Casts\Json;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home.welcome');
});
Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/login/submit', [AuthController::class, 'loginSubmit'])->name('login.submit');

Route::middleware('auth:student')->group(function () {
    Route::get('/profile', [StudentController::class, 'profile'])->name('profile');
    Route::get('/student', [StudentController::class, 'student'])->name('student');
    Route::get('/history', [StudentController::class, 'history'])->name('history');
    Route::get('/permission', [StudentController::class, 'permission'])->name('permission');
    Route::post('/add/permission', [PermissionController::class, 'storePermission'])->name('store.permission');
    Route::get('/assistance', [StudentController::class, 'assistance'])->name('assistance');
    Route::post('/student/logout', [AuthController::class, 'logoutStudent'])->name('logout.student');
});

Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');

    Route::get('/students', [UserController::class, 'students'])->name('students');
    Route::post('/add/user', [UserController::class, 'addUser'])->name('add.user');
    Route::put('/update/user/{id}', [UserController::class, 'updateUser'])->name('update.user');
    Route::delete('/delete/user/{id}', [UserController::class, 'destroy'])->name('delete.user');
    Route::get('/students/search', [UserController::class, 'search'])->name('students.search');
    Route::get('/student/detail/{id}-{name}', [UserController::class, 'showStudent'])->name('student.detail');

    Route::get('/classes', [StudentClassController::class, 'classes'])->name('classes');
    Route::post('/add/class', [StudentClassController::class, 'addClass'])->name('add.class');
    Route::put('/edit/class/{id}', [StudentClassController::class, 'editClass'])->name('edit.class');
    Route::delete('/delete/class/{id}', [StudentClassController::class, 'destroy'])->name('delete.class');
    Route::get('/classes/{id}-{slug}', [StudentClassController::class, 'show'])->name('show.class');

    Route::get('/statuses', [StatusController::class, 'statuses'])->name('statuses');
    Route::post('/add/status', [StatusController::class, 'addStatus'])->name('add.status');
    Route::put('/edit/status/{id}', [StatusController::class, 'editStatus'])->name('edit.status');
    Route::delete('/delete/status/{id}', [StatusController::class, 'destroy'])->name('delete.status');
    Route::get('/status/{name}', [StatusController::class, 'show'])->name('show.status');

    Route::get('/attendances', [AttendanceController::class, 'attendances'])->name('attendances');
    Route::get('/attendances/table', [AttendanceController::class, 'attendanceTable'])->name('attendances.table');
    Route::put('/attendances/update-status/{id}', [AttendanceController::class, 'updateStatus'])->name('attendances.updateStatus');

    Route::get('attendance/monthly', [MonthlyAttendanceController::class, 'index'])->name('attendance.monthly');

    Route::get('/permissions', [PermissionController::class, 'permissions'])->name('permissions');
    Route::post('/permission/{id}/rejected', [PermissionController::class, 'rejected'])->name('rejected');
    Route::post('/permission/{id}/accepted', [PermissionController::class, 'accepted'])->name('accepted');

    Route::get('/settings', [SettingController::class, 'settings'])->name('settings');
    Route::post('/mode', [SettingController::class, 'mode'])->name('mode');
    Route::post('/time', [SettingController::class, 'time'])->name('time');

    Route::get('/profile/admin', [AdminController::class, 'profileAdmin'])->name('admin.profile');
    Route::put('/profile/update/{id}', [AdminController::class, 'updateProfile'])->name('update.profileAdmin');

    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
});


