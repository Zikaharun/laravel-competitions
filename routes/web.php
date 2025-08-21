<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CompetitionController;
use App\Http\Controllers\CompetitionDivisionController;
use App\Http\Controllers\ParticipantController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    Route::get('/admin/competitions', [CompetitionController::class, 'index'])->name('admin.competitions.index');
    Route::post('/admin/competitions/create', [CompetitionController::class, 'store'])->name('admin.competitions.store');
    Route::get('/admin/competitions/{id}', [CompetitionController::class, 'edit'])->name('admin.competitions.edit');
    Route::put('/admin/competitions/{id}', [CompetitionController::class, 'update'])->name('admin.competitions.update');
    Route::delete('/admin/competitions/{id}', [CompetitionController::class, 'destroy'])->name('admin.competitions.destroy');

    Route::get('/admin/divisions', [CompetitionDivisionController::class, 'index'])->name('admin.divisions.index');
    Route::post('/admin/divisions/create', [CompetitionDivisionController::class, 'store'])->name('admin.divisions.store');
    Route::get('/admin/divisions/{id}', [CompetitionDivisionController::class, 'edit'])->name('admin.divisions.edit');
    Route::put('/admin/divisions/{id}', [CompetitionDivisionController::class, 'update'])->name('admin.divisions.update');
    Route::delete('/admin/divisions/{id}', [CompetitionDivisionController::class, 'destroy'])->name('admin.divisions.destroy');
    
    Route::get('/admin/profile', [ProfileController::class, 'edit'])->name('admin.profile.edit');
    Route::patch('/admin/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/admin/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    
});

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'role:users'])->name('dashboard');

Route::middleware(['auth', 'role:users'])->group(function () {
    Route::get('/dashboard', [UserController::class, 'dashboard'])->name('dashboard');
    Route::get('/users/participants', [ParticipantController::class, 'index'])->name('participants');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
