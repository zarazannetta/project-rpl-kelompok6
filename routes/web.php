<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SignupController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LeaderboardController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\DashboardLevelController;
use App\Http\Controllers\DashboardDeadlineController;
use App\Http\Controllers\LevelHardController;
use App\Http\Controllers\LevelMediumController;
use App\Http\Controllers\LevelEasyController;
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
    return view('dashboard-level');
});

// Route sign up
Route::get('/signup', [SignupController::class, 'showSignupForm'])->name('signup');
Route::post('/signup', [SignupController::class, 'submitSignupForm'])->name('signup.submit');

// Route login
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'authenticate'])->name('login.authenticate');

Route::middleware(['auth'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'show'])->name('profile');
    
    Route::get('/tasks/create', [TaskController::class, 'create'])->name('tasks.create');

    // Route dashboard level
    Route::get('/dashboard-level', [DashboardLevelController::class, 'dashboardlevel'])->name('dashboard-level');

    // Route dashboard deadline
    Route::get('/dashboard-deadline', [DashboardDeadlineController::class, 'dashboarddeadline'])->name('dashboard-deadline');

    // Routes for level-hard
    Route::get('/level-hard', [LevelHardController::class, 'showHardTasks'])->name('tasks.hard');
    Route::post('/tasks/hard/{id}/update', [LevelHardController::class, 'updateTaskCompletion'])->name('tasks.update.hard');
    
    // Routes for level-medium
    Route::get('/level-medium', [LevelMediumController::class, 'showMediumTasks'])->name('tasks.medium');
    Route::post('/tasks/medium/{id}/update', [LevelMediumController::class, 'updateTaskCompletion'])->name('tasks.update.medium');

    // Routes for level-easy
    Route::get('/level-easy', [LevelEasyController::class, 'showEasyTasks'])->name('tasks.easy');
    Route::post('/tasks/easy/{id}/update', [LevelEasyController::class, 'updateTaskCompletion'])->name('tasks.update.easy');
});

Route::get('/leaderboard', [LeaderboardController::class, 'leaderboard'])->name('leaderboard');

// Route logout (assumed)
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');