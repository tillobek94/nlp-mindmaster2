<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\FeatureController;
use App\Http\Controllers\Admin\TestimonialController;
use App\Http\Controllers\Admin\StatisticController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\PageController as AdminPageController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\ContactController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;

// Frontend Routes
Route::get('/', [PageController::class, 'index'])->name('home');
Route::get('/about', [PageController::class, 'about'])->name('about');
Route::get('/contact', [PageController::class, 'contact'])->name('contact');
Route::post('/contact', [PageController::class, 'contactStore'])->name('contact.store');

// Authentication Routes
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// Admin Routes - Auth middleware bilan
Route::middleware(['auth'])->prefix('admin')->group(function () {
    // Dashboard
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');
    
    // Features
    Route::resource('features', FeatureController::class)->except(['show'])->names([
        'index' => 'admin.features.index',
        'create' => 'admin.features.create',
        'store' => 'admin.features.store',
        'edit' => 'admin.features.edit',
        'update' => 'admin.features.update',
        'destroy' => 'admin.features.destroy'
    ]);
    
    // Testimonials
    Route::resource('testimonials', TestimonialController::class)->except(['show'])->names([
        'index' => 'admin.testimonials.index',
        'create' => 'admin.testimonials.create',
        'store' => 'admin.testimonials.store',
        'edit' => 'admin.testimonials.edit',
        'update' => 'admin.testimonials.update',
        'destroy' => 'admin.testimonials.destroy'
    ]);
    
    // Statistics
    Route::resource('statistics', StatisticController::class)->except(['show'])->names([
        'index' => 'admin.statistics.index',
        'create' => 'admin.statistics.create',
        'store' => 'admin.statistics.store',
        'edit' => 'admin.statistics.edit',
        'update' => 'admin.statistics.update',
        'destroy' => 'admin.statistics.destroy'
    ]);
    
    // Pages
    Route::resource('pages', AdminPageController::class)->except(['show'])->names([
        'index' => 'admin.pages.index',
        'create' => 'admin.pages.create',
        'store' => 'admin.pages.store',
        'edit' => 'admin.pages.edit',
        'update' => 'admin.pages.update',
        'destroy' => 'admin.pages.destroy'
    ]);
    
    // Users
    Route::resource('users', UserController::class)->except(['show'])->names([
        'index' => 'admin.users.index',
        'create' => 'admin.users.create',
        'store' => 'admin.users.store',
        'edit' => 'admin.users.edit',
        'update' => 'admin.users.update',
        'destroy' => 'admin.users.destroy'
    ]);
    
    // Export routes
    Route::get('/users/export', [UserController::class, 'export'])->name('admin.users.export');
    
    // Contacts
    Route::get('/contacts', [ContactController::class, 'index'])->name('admin.contacts.index');
    Route::get('/contacts/{contact}', [ContactController::class, 'show'])->name('admin.contacts.show');
    Route::put('/contacts/{contact}/status', [ContactController::class, 'updateStatus'])->name('admin.contacts.updateStatus');
    Route::delete('/contacts/{contact}', [ContactController::class, 'destroy'])->name('admin.contacts.destroy');
    Route::get('/contacts/export', [ContactController::class, 'export'])->name('admin.contacts.export');
    
    // Settings
    Route::get('/settings', [SettingController::class, 'index'])->name('admin.settings.index');
    Route::post('/settings', [SettingController::class, 'update'])->name('admin.settings.update');
});

// Agar yo'l topilmasa
Route::fallback(function () {
    return redirect('/');
});
// Test route
Route::get('/test', function () {
    return 'Test page works!';
});

// Health check
Route::get('/health', function () {
    return response()->json(['status' => 'ok', 'time' => now()]);
});
