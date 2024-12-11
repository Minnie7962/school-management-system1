<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\OwnerController;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Route::controller(AuthController::class)->group(function() {
    Route::get('/login', 'showLoginForm')->name('login');
    Route::post('/login', 'login');
    Route::post('/register', 'register')->name('register');
    Route::post('/logout', 'logout')->name('logout');
});

Route::middleware(['auth', 'check.role:admin'])->group(function() {
    Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    Route::get('/search-function', [App\Http\Controllers\AdminController::class, 'searchFunction'])->name('admin.search.function');
    Route::post('/verify-role-redirect', [App\Http\Controllers\AdminController::class, 'verifyRoleRedirect'])->name('admin.verify.role.redirect');
    Route::resource('attendance', AdminController::class);
    Route::resource('students', AdminController::class);
    Route::resource('teachers', AdminController::class);
    Route::resource('subjects', AdminController::class);
    Route::resource('syllabuses', AdminController::class);
    Route::resource('notices', AdminController::class);
    Route::resource('exams', AdminController::class);
    Route::resource('marks', AdminController::class);
    Route::resource('feeRecords', AdminController::class);
    Route::resource('payrolls', AdminController::class);
    Route::resource('leaves', AdminController::class);
    Route::resource('feedbacks', AdminController::class);
    Route::resource('notifications', AdminController::class);
    Route::resource('timeTables', AdminController::class);
});

Route::middleware(['auth', 'check.role:student'])->group(function() {
    Route::get('/student/dashboard', [StudentController::class, 'dashboard'])->name('student.dashboard');
});

Route::group(['prefix' => 'owner', 'middleware' => ['auth', 'verified']], function () {
    Route::post('/logout', [App\Http\Controllers\OwnerController::class, 'logout'])->name('owner.logout');
    Route::get('/payment', [App\Http\Controllers\OwnerController::class, 'seePayment'])->name('owner.payment');
});

Route::group(['prefix' => 'student', 'middleware' => ['auth', 'verified']], function () {
    Route::get('/fee-receipts', [App\Http\Controllers\StudentController::class, 'checkFeeReceipt'])->name('student.fee.receipts');
    Route::get('/attendance', [App\Http\Controllers\StudentController::class, 'fetchAttendance'])->name('student.attendance');
    Route::get('/attendance-percentage', [App\Http\Controllers\StudentController::class, 'fetchAttendancePercentage'])->name('student.attendance.percentage');
    Route::get('/timetable', [App\Http\Controllers\StudentController::class, 'fetchTimetable'])->name('student.timetable');
    Route::get('/change-password', [App\Http\Controllers\StudentController::class, 'password'])->name('student.password');
    Route::get('/workspace', [App\Http\Controllers\StudentController::class, 'workspace'])->name('student.workspace');
});
