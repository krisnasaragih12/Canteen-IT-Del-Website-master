<?php

use Illuminate\Support\Facades\Route;
//use App\Http\Controllers\Web\AuthController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Web\AllergyController;
use App\Http\Controllers\Web\CommentController;
use App\Http\Controllers\Web\ProfileController;
use App\Http\Controllers\Web\RequestController;
use App\Http\Controllers\Web\ScheduleContoller;
use App\Http\Controllers\Web\DashboardController;
use App\Http\Controllers\Web\AnnouncementController;

Route::group(['domain' => ''], function () {
    Route::get('/', [AuthController::class, 'index'])->name('auth.index');
    Route::post('login', [AuthController::class, 'do_login'])->name('auth.login');
    Route::post('register', [AuthController::class, 'do_register'])->name('auth.register');
    Route::prefix('user')->name('web.')->group(function () {
        Route::middleware(['User'])->group(function () {
            Route::redirect('/', 'dashboard', 301);
            Route::resource('dashboard', DashboardController::class);
            Route::resource('profile', ProfileController::class);
            Route::resource('announcements', AnnouncementController::class);
            Route::resource('schedule', ScheduleContoller::class);
            Route::resource('allergy', AllergyController::class);
            Route::resource('comment', CommentController::class);
            Route::resource('requests', RequestController::class);
            Route::get('logout', [AuthController::class, 'do_logout'])->name('auth.logout');
        });
    });
});
