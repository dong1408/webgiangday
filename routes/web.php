<?php

use App\Http\Controllers\Admin\CourseController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\PermissionController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\GoogleAuthController;
use App\Http\Controllers\GoogleMeetController;
use App\Http\Controllers\Guest\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Middleware\Admin;
use Illuminate\Auth\Middleware\Authenticate;
use Illuminate\Support\Facades\Route;



// ======================= GUEST ========================== //
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/gioi-thieu', [HomeController::class, 'introduction'])->name('introduction');

// ===================== END GUEST ======================== //




// ======================= ADMIN ========================== //
Route::prefix('admin')->middleware(Admin::class, Authenticate::class)->group(function () {
    // Route dashboard
    Route::get('/', [DashboardController::class, 'index'])->name('admin.dashboard');
    Route::get('dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');

    // Route user
    Route::get('user', [UserController::class, 'index'])->name('admin.user.show')->can('user.view');
    Route::get('user/add', [UserController::class, 'add'])->name('admin.user.add')->can('user.add');
    Route::post('user/store', [UserController::class, 'store'])->name('admin.user.store')->can('user.add');
    Route::get('user/delete/{id}', [UserController::class, 'delete'])->name('admin.user.delete')->can('user.delete');
    Route::post('user/action', [UserController::class, 'action'])->name('admin.user.action')->can('user.delete');
    Route::get('user/edit/{id}', [UserController::class, 'edit'])->name('admin.user.edit')->can('user.edit');
    Route::post('user/update/{id}', [UserController::class, 'update'])->name('admin.user.update')->can('user.edit');
    Route::get('user/restore/{id}', [UserController::class, 'restore'])->name('admin.user.restore');
    Route::get('user/forceDelete/{id}', [UserController::class, 'forceDelete'])->name('admin.user.forceDelete');


    // Route permission
    Route::get('permission', [PermissionController::class, 'add'])->name('admin.permission')->can('permission.view');
    Route::get('permission/add', [PermissionController::class, 'add'])->name('admin.permission.add')->can('permission.add');
    Route::post('permission/store', [PermissionController::class, 'store'])->name('admin.permission.store')->can('permission.add');
    Route::get('permission/edit/{id}', [PermissionController::class, 'edit'])->name('admin.permission.edit')->can('permission.edit');
    Route::post('permission/update/{id}', [PermissionController::class, 'update'])->name('admin.permission.update')->can('permission.edit');
    Route::get('permission/delete/{id}', [PermissionController::class, 'delete'])->name('admin.permission.delete')->can('permission.delete');

    // Route role
    Route::get('role', [RoleController::class, 'show'])->name('admin.role.show')->can('role.view');
    Route::get('role/add', [RoleController::class, 'add'])->name('admin.role.add')->can('role.add');
    Route::post('role/store', [RoleController::class, 'store'])->name('admin.role.store')->can('role.add');
    Route::get('role/edit/{role}', [RoleController::class, 'edit'])->name('admin.role.edit')->can('role.edit');
    Route::post('role/update/{role}', [RoleController::class, 'update'])->name('admin.role.update')->can('role.edit');
    Route::get('role/delete/{role}', [RoleController::class, 'delete'])->name('admin.role.delete')->can('role.delete');

    // Route course
    Route::get('course', [CourseController::class, 'show'])->name('admin.course.show');
    Route::get('course/add', [CourseController::class, 'add'])->name('admin.course.add');
    Route::post('course/store', [CourseController::class, 'store'])->name('admin.course.store');
});
// ===================== END ADMIN ======================== //


Route::get('/create-meet', [GoogleMeetController::class, 'createMeet'])->name('create-meeting');
Route::get('/auth/google', [GoogleAuthController::class, 'redirectToGoogle'])->name('google.auth');
Route::get('/auth/check-google-token', [GoogleAuthController::class, 'checkGoogleToken'])->name('google.check_token');
Route::get('/auth/google/callback', [GoogleAuthController::class, 'handleGoogleCallback']);


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
