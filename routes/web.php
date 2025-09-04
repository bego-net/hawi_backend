<?php

use Illuminate\Support\Facades\Route;

// ================== PUBLIC CONTROLLERS ==================
use App\Http\Controllers\PageController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\SocialAuthController;

// ================== ADMIN CONTROLLERS ==================
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\BlogController as AdminBlogController;
use App\Http\Controllers\Admin\ServiceController as AdminServiceController;
use App\Http\Controllers\Admin\ContactController as AdminContactController;
use App\Http\Controllers\Admin\AdminDashboardController;

// ================== USER DASHBOARD CONTROLLERS ==================
use App\Http\Controllers\User\DashboardController;
use App\Http\Controllers\User\ProjectController;
use App\Http\Controllers\User\ServiceRequestController;
use App\Http\Controllers\User\SupportMessageController;
use App\Http\Controllers\User\ProfileController;


// ================== PUBLIC PAGES ==================
Route::get('/', [PageController::class, 'home'])->name('home');
Route::get('/about', [PageController::class, 'about'])->name('about');
Route::get('/services', [PageController::class, 'services'])->name('services');

// ================== CONTACT PAGE ==================
Route::get('/contact', [ContactController::class, 'index'])->name('contact');   // Show form
Route::post('/contact', [ContactController::class, 'store'])->name('contact.store'); // Save message

// ================== BLOG ==================
// Public blog pages (index & show)
Route::resource('blog', BlogController::class)->only(['index', 'show']); 

// Add missing create & store routes for public blogs
// ================== BLOG ==================
// Public blog pages: index, show, create, store
Route::get('/blog', [BlogController::class, 'index'])->name('blog.index');
Route::get('/blog/create', [BlogController::class, 'create'])->name('blog.create');
Route::post('/blog', [BlogController::class, 'store'])->name('blog.store');
Route::get('/blog/{blog}', [BlogController::class, 'show'])->name('blog.show');


// ================== AUTHENTICATION ==================
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login.form');
Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register.form');
Route::post('/register', [AuthController::class, 'register'])->name('register');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// ================== GOOGLE LOGIN ==================
Route::get('auth/google', [SocialAuthController::class, 'redirectToGoogle'])->name('google.login');
Route::get('auth/google/callback', [SocialAuthController::class, 'handleGoogleCallback']);


// ================== ADMIN DASHBOARD (Protected) ==================
Route::middleware(['auth', 'isAdmin'])->prefix('admin')->name('admin.')->group(function () {
    // ✅ Main Admin Dashboard
    Route::get('/', [AdminDashboardController::class, 'index'])->name('dashboard');

    // ✅ User Management
    Route::resource('users', UserController::class);

    // ✅ Blog Management
    Route::resource('blogs', AdminBlogController::class);

    // ✅ Service Requests Management
    Route::resource('services', AdminServiceController::class);
    Route::patch('services/{service}/status', [AdminServiceController::class, 'updateStatus'])->name('services.updateStatus');

    // ✅ Contact Messages Management
    Route::get('contacts', [AdminContactController::class, 'index'])->name('contacts.index');
    Route::get('contacts/{id}', [AdminContactController::class, 'show'])->name('contacts.show');
    Route::post('contacts/{id}/respond', [AdminContactController::class, 'respond'])->name('contacts.respond');
}); // 👈 CLOSE admin group properly


// ================== USER DASHBOARD (Protected) ==================
Route::middleware(['auth'])->prefix('dashboard')->name('dashboard.')->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('index');

    // ✅ Projects (CRUD)
    Route::resource('projects', ProjectController::class);

    // ✅ Service Requests
    Route::resource('requests', ServiceRequestController::class)->except(['show']);

    // ✅ Messaging with Support/Admin
    Route::get('messages', [SupportMessageController::class, 'index'])->name('messages.index');
    Route::post('messages', [SupportMessageController::class, 'store'])->name('messages.store');

    // ✅ Profile Management
    Route::get('profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::put('profile', [ProfileController::class, 'update'])->name('profile.update');
});
