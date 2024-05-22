<?php

use App\Http\Controllers\TaskManagerController;
use App\Http\Controllers\DashboardLevelController;
use App\Http\Controllers\DashboardDeadlineController;
use App\Http\Controllers\LeaderboardController;
use App\Http\Controllers\SignupController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProfileController;
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

//route sign up
Route::get('/signup', [SignupController::class, 'showSignupForm']);
Route::post('/signup', [SignupController::class, 'submitSignupForm']);

//route login
Route::get('/login', [LoginController::class, 'showLoginForm']);
Route::post('/login', [LoginController::class, 'authenticate']);

//route dashboard level
Route::get('/dashboard-level', [DashboardLevelController::class, 'dashboardlevel']);

//route dashboard deadline
Route::get('/dashboard-deadline', [DashboardDeadlineController::class, 'dashboarddeadline']);
//route profile
Route::middleware(['auth'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'showProfile'])->name('profile');
    Route::put('/profile', [ProfileController::class, 'editProfile']);
    Route::delete('/profile/delete', [ProfileController::class, 'deleteAccount']);
});

//route addtask
Route::get('/managetask', [TaskManagerController::class, 'showTaskForm']);
Route::post('/managetask', [TaskManagerController::class, 'addTask']);


//route leaderboard
Route::get('/leaderboard', [LeaderboardController::class, 'leaderboard']);