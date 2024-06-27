<?php

use App\Http\Controllers\MemberController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\GroupController;

// Public routes
Route::get('/', [GroupController::class, 'home'])->name('home');
Route::get('register', [AuthController::class, 'showRegistrationForm'])->name('register');
Route::post('register', [AuthController::class, 'register']);
Route::get('login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('login', [AuthController::class, 'login']);

// Protected routes
Route::middleware('auth')->group(function () {
    Route::post('logout', [AuthController::class, 'logout'])->name('logout');

    Route::get('/groups/create', [GroupController::class, 'create'])->name('groups.create');
    Route::post('/groups', [GroupController::class, 'store'])->name('groups.store');
    Route::get('/groups/{group}/edit', [GroupController::class, 'edit'])->name('groups.edit');
    Route::put('/groups/{group}', [GroupController::class, 'update'])->name('groups.update');
    Route::delete('/groups/{group}', [GroupController::class, 'destroy'])->name('groups.destroy');

    Route::get('/artists/create', [MemberController::class, 'create'])->name('artists.create');
    Route::post('/artists', [MemberController::class, 'store'])->name('artists.store');
    Route::get('/artists/{member}/edit', [MemberController::class, 'edit'])->name('artists.edit');
    Route::put('/artists/{member}', [MemberController::class, 'update'])->name('artists.update');
    Route::delete('/artists/{member}', [MemberController::class, 'destroy'])->name('artists.destroy');
});

Route::get('/group-member', [MemberController::class, 'index'])->name('members.index');
Route::resource('members', MemberController::class);
Route::get('/artists', [MemberController::class, 'artist'])->name('artists.index');