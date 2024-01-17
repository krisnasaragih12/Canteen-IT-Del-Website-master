<?php

use Illuminate\Support\Facades\Route;
//use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Admin\AllergyController;
use App\Http\Controllers\Admin\CommentController;
use App\Http\Controllers\Admin\ScheduleController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\RequestController;
use App\Http\Controllers\Admin\AnnouncementController;

Route::group(['domain' => ''], function () {
    Route::get('/', [AuthController::class, 'index'])->name('auth.index');
    Route::post('login', [AuthController::class, 'do_login'])->name('auth.login');
    Route::prefix('admin/')->name('admin.')->group(function () {
        Route::middleware(['Admin'])->group(function () {
            Route::redirect('/', 'dashboard', 301);
            Route::resource('dashboard', DashboardController::class);
            Route::resource('announcements', AnnouncementController::class);
            Route::resource('schedule', ScheduleController::class);
            Route::get('allergy', [AllergyController::class, 'index'])->name('allergy.index');
            Route::delete('allergy/{id}', [AllergyController::class, 'destroy'])->name('allergy.destroy');
            Route::get('allergy/pdf', [AllergyController::class, 'pdf'])->name('allergy.pdf');
            Route::patch('requests/approve/{id}', [RequestController::class, 'approve'])->name('requests.approve');
            Route::patch('requests/reject/{id}', [RequestController::class, 'reject'])->name('requests.reject');
            Route::get('requests', [RequestController::class, 'index'])->name('requests.index');
            Route::get('comment', [CommentController::class, 'index'])->name('comment.index');
            Route::post('comment/reply/{comment}', [CommentController::class, 'reply'])->name('comment.reply');
            Route::delete('comment/reply/{comment}', [CommentController::class, 'destroy'])->name('comment.destroy');
            Route::get('logout', [AuthController::class, 'do_logout'])->name('auth.logout');
        });
    });
});
