<?php

use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\PasswordResetLinkController;
use App\Http\Controllers\Auth\NewPasswordController;
use App\Http\Controllers\Auth\EmailVerificationNotificationController;
use App\Http\Controllers\Auth\VerifyEmailController;
use App\Http\Controllers\ContactController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
| These routes are loaded by RouteServiceProvider and assigned to "api".
| They return JSON responses for the React frontend.
|--------------------------------------------------------------------------
*/

// ================== AUTH USER ==================
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// ================== AUTH ROUTES ==================
Route::post('/register', [RegisteredUserController::class, 'store']);
Route::post('/login', [AuthenticatedSessionController::class, 'store']);
Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])->middleware('auth:sanctum');
Route::post('/forgot-password', [PasswordResetLinkController::class, 'store']);
Route::post('/reset-password', [NewPasswordController::class, 'store']);
Route::post('/email/verification-notification', [EmailVerificationNotificationController::class, 'store'])
    ->middleware(['auth:sanctum', 'throttle:6,1']);
Route::get('/verify-email/{id}/{hash}', VerifyEmailController::class)
    ->middleware(['auth:sanctum', 'signed', 'throttle:6,1'])
    ->name('verification.verify');

// ================== PUBLIC CONTENT ROUTES ==================
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
    return Service::all();
});

// ================== CONTACT API ==================
// Save contact message (from frontend React form)
Route::post('/contact', [ContactController::class, 'store']);

// Admin only: Get all contact messages
Route::middleware('auth:sanctum')->get('/contacts', [ContactController::class, 'apiIndex']);

// ================== BLOG API (example static) ==================
Route::get('/blog', function () {
    return response()->json([
        ['id' => 1, 'title' => 'First Blog Post', 'category' => 'General'],
        ['id' => 2, 'title' => 'Why Choose Hawi Software?', 'category' => 'Business'],
    ]);
});
