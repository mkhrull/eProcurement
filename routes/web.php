<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\VendorDashboardController;
use Illuminate\Support\Facades\Route;

// Public Route
Route::get('/', function () {
    return view('welcome');
});

// Authentication Routes
Route::get('/register', [AuthController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [AuthController::class, 'register']);
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Admin Routes
Route::prefix('admin')->middleware(['auth'])->group(function () {
    Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('admin.dashboard');
    Route::get('/vendors', [AdminDashboardController::class, 'listVendors'])->name('admin.vendors');
    Route::get('/vendors/{id}', [AdminDashboardController::class, 'viewVendor'])->name('admin.vendors.view');
    Route::post('/vendors/{id}/approve', [AdminDashboardController::class, 'approveVendor'])->name('admin.vendors.approve');
    Route::post('/vendors/{id}/reject', [AdminDashboardController::class, 'rejectVendor'])->name('admin.vendors.reject');
});

// Vendor Routes
Route::prefix('vendor')->middleware(['auth'])->group(function () {
    Route::get('/dashboard', [VendorDashboardController::class, 'index'])->name('vendor.dashboard');
    Route::get('/edit/{id}', [VendorDashboardController::class, 'edit'])->name('vendor.edit');
    Route::put('/{id}', [VendorDashboardController::class, 'update'])->name('vendor.update');
});

