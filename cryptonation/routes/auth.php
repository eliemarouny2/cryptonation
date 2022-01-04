<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\ConfirmablePasswordController;
use App\Http\Controllers\Auth\EmailVerificationNotificationController;
use App\Http\Controllers\Auth\EmailVerificationPromptController;
use App\Http\Controllers\Auth\NewPasswordController;
use App\Http\Controllers\Auth\PasswordResetLinkController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Auth\VerifyEmailController;
use Illuminate\Support\Facades\Route;


use App\Http\Controllers\Auth\AAuthenticatedSessionController;
use App\Http\Controllers\Auth\AConfirmablePasswordController;
use App\Http\Controllers\Auth\AEmailVerificationNotificationController;
use App\Http\Controllers\Auth\AEmailVerificationPromptController;
use App\Http\Controllers\Auth\ANewPasswordController;
use App\Http\Controllers\Auth\APasswordResetLinkController;
use App\Http\Controllers\Auth\ARegisteredUserController;
use App\Http\Controllers\Auth\AVerifyEmailController;

Route::get('/register', [RegisteredUserController::class, 'create'])
                ->middleware('guest')
                ->name('register');

Route::post('/register', [RegisteredUserController::class, 'store'])
                ->middleware('guest');

Route::get('/login', [AuthenticatedSessionController::class, 'create'])
                ->middleware('guest')
                ->name('login');

Route::post('/login', [AuthenticatedSessionController::class, 'store'])
                ->middleware('guest');

Route::get('/forgot-password', [PasswordResetLinkController::class, 'create'])
                ->middleware('guest')
                ->name('password.request');

Route::post('/forgot-password', [PasswordResetLinkController::class, 'store'])
                ->middleware('guest')
                ->name('password.email');

Route::get('/reset-password/{token}', [NewPasswordController::class, 'create'])
                ->middleware('guest')
                ->name('password.reset');

Route::post('/reset-password', [NewPasswordController::class, 'store'])
                ->middleware('guest')
                ->name('password.update');

Route::get('/verify-email', [EmailVerificationPromptController::class, '__invoke'])
                ->middleware('auth')
                ->name('verification.notice');

Route::get('/verify-email/{id}/{hash}', [VerifyEmailController::class, '__invoke'])
                ->middleware(['auth', 'signed', 'throttle:6,1'])
                ->name('verification.verify');

Route::post('/email/verification-notification', [EmailVerificationNotificationController::class, 'store'])
                ->middleware(['auth', 'throttle:6,1'])
                ->name('verification.send');

Route::get('/confirm-password', [ConfirmablePasswordController::class, 'show'])
                ->middleware('auth')
                ->name('password.confirm');

Route::post('/confirm-password', [ConfirmablePasswordController::class, 'store'])
                ->middleware('auth');

Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])
                ->middleware('auth')
                ->name('logout');




Route::get('/admin-register', [ARegisteredUserController::class, 'create'])
                ->middleware('aguest')
                ->name('aregister');

Route::post('/admin-register', [ARegisteredUserController::class, 'store'])
                ->middleware('aguest');

Route::get('/admin-login', [AAuthenticatedSessionController::class, 'create'])
                ->middleware('aguest')
                ->name('alogin');

Route::post('/admin-login', [AAuthenticatedSessionController::class, 'store'])
                ->middleware('aguest');

Route::get('/admin-forgot-password', [APasswordResetLinkController::class, 'create'])
                ->middleware('aguest')
                ->name('apassword.request');

Route::post('/admin-forgot-password', [APasswordResetLinkController::class, 'store'])
                ->middleware('aguest')
                ->name('apassword.email');

Route::get('/admin-reset-password/{token}', [ANewPasswordController::class, 'create'])
                ->middleware('aguest')
                ->name('apassword.reset');

Route::post('/admin-admin-reset-password', [ANewPasswordController::class, 'store'])
                ->middleware('aguest')
                ->name('apassword.update');

Route::get('/admin-verify-email', [AEmailVerificationPromptController::class, '__invoke'])
                ->middleware('aauth')
                ->name('averification.notice');

Route::get('/admin-verify-email/{id}/{hash}', [AVerifyEmailController::class, '__invoke'])
                ->middleware(['aauth', 'asigned', 'athrottle:6,1'])
                ->name('averification.verify');

Route::post('/admin-email/verification-notification', [AEmailVerificationNotificationController::class, 'store'])
                ->middleware(['aauth', 'athrottle:6,1'])
                ->name('averification.send');

Route::get('/admin-confirm-password', [AConfirmablePasswordController::class, 'show'])
                ->middleware('aauth')
                ->name('apassword.confirm');

Route::post('/admin-confirm-password', [AConfirmablePasswordController::class, 'store'])
                ->middleware('aauth');

Route::post('/admin-logout', [AAuthenticatedSessionController::class, 'destroy'])
                ->middleware('aauth')
                ->name('alogout');
