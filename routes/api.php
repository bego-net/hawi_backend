<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\PasswordResetLinkController;
use App\Http\Controllers\Auth\NewPasswordController;
use App\Http\Controllers\Auth\EmailVerificationNotificationController;
use App\Http\Controllers\Auth\VerifyEmailController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
| These routes are loaded by RouteServiceProvider and assigned to "api".
| They return JSON responses for the React frontend.
|--------------------------------------------------------------------------
*/

// Test route for authenticated user
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// ================== AUTH ROUTES ==================

// Registration
Route::post('/register', [RegisteredUserController::class, 'store']);

// Login
Route::post('/login', [AuthenticatedSessionController::class, 'store']);

// Logout (requires authentication)
Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])
    ->middleware('auth:sanctum');

// Forgot password (send reset link)
Route::post('/forgot-password', [PasswordResetLinkController::class, 'store']);

// Reset password
Route::post('/reset-password', [NewPasswordController::class, 'store']);

// Email verification (optional)
Route::post('/email/verification-notification', [EmailVerificationNotificationController::class, 'store'])
    ->middleware(['auth:sanctum', 'throttle:6,1']);

Route::get('/verify-email/{id}/{hash}', VerifyEmailController::class)
    ->middleware(['auth:sanctum', 'signed', 'throttle:6,1'])
    ->name('verification.verify');

// ================== PUBLIC CONTENT ROUTES ==================

// Example public routes for your pages
Route::get('/home', function () {
    return response()->json([
        'title' => 'Welcome to Hawi Software Solutions',
        'message' => 'We build modern software solutions.'
    ]);
});

Route::get('/about', function () {
    return response()->json([
        'company' => 'Hawi Software Solutions',
        'values' => 'Innovation, Quality, and Customer Satisfaction'
    ]);
});

Route::get('/services', function () {
    return response()->json([
        ['name' => 'Web Development', 'description' => 'Modern web apps using Laravel + React'],
        ['name' => 'Mobile Apps', 'description' => 'Cross-platform mobile solutions'],
        ['name' => 'Cloud Solutions', 'description' => 'Secure and scalable cloud services']
    ]);
});

Route::get('/contact', function () {
    return response()->json([
        'email' => 'contact@hawisoftware.com',
        'phone' => '+251 912 345 678',
        'address' => 'Addis Ababa, Ethiopia'
    ]);
});

Route::get('/blog', function () {
    return response()->json([
        ['id' => 1, 'title' => 'First Blog Post', 'category' => 'General'],
        ['id' => 2, 'title' => 'Why Choose Hawi Software?', 'category' => 'Business'],
    ]);
});
