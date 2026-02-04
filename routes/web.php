<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\AttendanceLogController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DeviceController;
use App\Http\Controllers\DivisionController;
use App\Http\Controllers\EducatorController;
use App\Http\Controllers\MonthlyAttendanceController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\StatusController;
use App\Http\Controllers\StudentClassController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', [AuthController::class, 'welcome'])->name('welcome');
Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/login/submit', [AuthController::class, 'loginSubmit'])->name('login.submit');

Route::middleware(['auth', 'role:student'])->group(function () {
    Route::post('/student/absen/manual', [AttendanceController::class, 'manualAbsen'])->name('student.manual.absen');

    Route::get('/profile', [StudentController::class, 'profile'])->name('profile');
    Route::get('/student', [StudentController::class, 'student'])->name('student');
    Route::get('/history', [StudentController::class, 'history'])->name('history');
    Route::get('/permission', [StudentController::class, 'permission'])->name('permission');
    Route::post('/add/permission', [PermissionController::class, 'storePermission'])->name('store.permission');
    Route::get('/borrow', [StudentController::class, 'borrowTools'])->name('borrow');
    Route::post('/student/logout', [AuthController::class, 'logoutStudent'])->name('logout.student');
});

Route::middleware(['auth', 'role:educator'])->group(function () {
    Route::get('/dashboard/division', [DivisionController::class, 'dashboard'])->name('division.dashboard');
    Route::get('/students/division', [DivisionController::class, 'students'])->name('division.students');
    Route::post('/students/division/store/{id}', [DivisionController::class, 'store'])->name('divisions.store');
    Route::get('/student/division/detail/{id}-{name}', [DivisionController::class, 'show'])->name('division.show');
    Route::get('/attendance/division', [MonthlyAttendanceController::class, 'indexDivisi'])->name('attendance.monthly.division');

    Route::get('/settings/division', [SettingController::class, 'settingsDivision'])->name('settings.division');
    Route::post('/mode/division', [SettingController::class, 'modeDivision'])->name('mode.division');
    Route::post('/time/division', [SettingController::class, 'timeDivision'])->name('time.division');

    Route::get('/profile/educator', [DivisionController::class, 'profile'])->name('profile.educator');
    Route::put('/profile/educator/update/{id}', [DivisionController::class, 'updateProfile'])->name('update.profileEducator');

    Route::post('/logout/division', [AuthController::class, 'logoutDivision'])->name('logout.division');
});

Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');

    Route::get('/students', [UserController::class, 'index'])->name('students');
    Route::post('/add/user', [UserController::class, 'store'])->name('add.user');
    Route::put('/update/user/{id}', [UserController::class, 'update'])->name('update.user');
    Route::delete('/delete/user/{id}', [UserController::class, 'destroy'])->name('delete.user');
    Route::get('/students/search', [UserController::class, 'search'])->name('students.search');
    Route::get('/student/detail/{id}-{name}', [UserController::class, 'showStudent'])->name('student.detail');

    Route::get('/classes', [StudentClassController::class, 'index'])->name('classes');
    Route::post('/add/class', [StudentClassController::class, 'store'])->name('add.class');
    Route::get('/classes/{id}-{slug}', [StudentClassController::class, 'show'])->name('show.class');
    Route::put('/edit/class/{id}', [StudentClassController::class, 'update'])->name('edit.class');
    Route::delete('/delete/class/{id}', [StudentClassController::class, 'destroy'])->name('delete.class');

    Route::get('/statuses', [StatusController::class, 'index'])->name('statuses');
    Route::post('/add/status', [StatusController::class, 'store'])->name('add.status');
    Route::get('/status/{name}', [StatusController::class, 'show'])->name('show.status');
    Route::put('/edit/status/{id}', [StatusController::class, 'update'])->name('edit.status');
    Route::delete('/delete/status/{id}', [StatusController::class, 'destroy'])->name('delete.status');

    Route::get('/attendances', [AttendanceController::class, 'attendances'])->name('attendances');
    Route::get('/attendances/table', [AttendanceController::class, 'attendanceTable'])->name('attendances.table');
    Route::put('/attendances/update-status/{id}', [AttendanceController::class, 'updateStatus'])->name('attendances.updateStatus');

    Route::get('/rooms', [DeviceController::class, 'index'])->name('rooms.index');
    Route::get('/rooms/{id}', [DeviceController::class, 'show'])->name('rooms.show');

    Route::get('attendance/monthly', [MonthlyAttendanceController::class, 'indexStudent'])->name('attendance.monthly.student');

    Route::get('/permissions', [PermissionController::class, 'permissions'])->name('permissions');
    Route::post('/permission/{id}/rejected', [PermissionController::class, 'rejected'])->name('rejected');
    Route::post('/permission/{id}/accepted', [PermissionController::class, 'accepted'])->name('accepted');

    Route::get('/settings', [SettingController::class, 'settings'])->name('settings');
    Route::post('/mode', [SettingController::class, 'mode'])->name('mode');
    Route::post('/time', [SettingController::class, 'time'])->name('time');

    Route::get('/profile/admin', [AdminController::class, 'profileAdmin'])->name('admin.profile');
    Route::put('/profile/update/{id}', [AdminController::class, 'updateProfile'])->name('update.profileAdmin');

    Route::get('/attendance-logs', [AttendanceLogController::class, 'index'])->name('attendance.logs');
    Route::get('/attendance-logs/json', [AttendanceLogController::class, 'json'])->name('attendance.logs.json');
    Route::delete('/attendance/logs/delete', [AttendanceLogController::class, 'delete'])->name('attendance.logs.delete');

    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
});
