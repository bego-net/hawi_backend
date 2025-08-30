<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\SocialAuthController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\BlogController as AdminBlogController;
use App\Http\Controllers\Admin\ServiceController as AdminServiceController;
use App\Http\Controllers\Admin\ContactController as AdminContactController;

// ================== PUBLIC PAGES ==================
Route::get('/', [PageController::class, 'home'])->name('home');
Route::get('/about', [PageController::class, 'about'])->name('about');
Route::get('/services', [PageController::class, 'services'])->name('services');

// ================== CONTACT PAGE ==================
Route::get('/contact', [ContactController::class, 'index'])->name('contact');   // Show form
Route::post('/contact', [ContactController::class, 'store'])->name('contact.store'); // Save message

// ================== BLOG ==================
Route::resource('blog', BlogController::class);

// ================== AUTHENTICATION ==================
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login.form');
Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register.form');
Route::post('/register', [AuthController::class, 'register'])->name('register');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// ================== GOOGLE LOGIN ==================
Route::get('auth/google', [SocialAuthController::class, 'redirectToGoogle'])->name('google.login');
Route::get('auth/google/callback', [SocialAuthController::class, 'handleGoogleCallback']);

// ================== ADMIN DASHBOARD ==================
Route::middleware(['auth', 'isAdmin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/', [AdminController::class, 'index'])->name('dashboard');

    // ✅ User Management
    Route::resource('users', UserController::class);

    // ✅ Blog Management
    Route::resource('blogs', AdminBlogController::class);

    // ✅ Service Management
    Route::resource('services', AdminServiceController::class);

    // ✅ Custom route for updating service status
    Route::patch('services/{service}/status', [AdminServiceController::class, 'updateStatus'])->name('services.updateStatus');

    // ✅ Contact Management
    Route::get('contacts', [AdminContactController::class, 'index'])->name('contacts.index');
});
