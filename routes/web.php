<?php

use App\Http\Controllers\TaskManagerController;
use App\Http\Controllers\DashboardLevelController;
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
    return view('/users/signup');
});

//route sign up
Route::get('/signup', [SignupController::class, 'showSignupForm']);
Route::post('/signup', [SignupController::class, 'submitSignupForm']);

//route login
Route::get('/login', [LoginController::class, 'showLoginForm']);
Route::post('/login', [LoginController::class, 'authenticate']);


//route setelah login
Route::middleware(['auth'])->group(function () {
    // route dashboard 
    Route::get('/dashboard-level', [DashboardLevelController::class, 'dashboardlevel'])->name('dashboard-level');

    // Profile routes
    Route::get('/profile', [ProfileController::class, 'showProfile'])->name('profile');
    Route::put('/profile', [ProfileController::class, 'editProfile']);
    Route::delete('/profile/delete', [ProfileController::class, 'deleteAccount']);

    // Task routes
    Route::get('/managetask', [TaskManagerController::class, 'showTaskForm'])->name('showTaskForm');
    Route::post('/managetask', [TaskManagerController::class, 'addTask'])->name('addTask');
    Route::get('/managetask/{id}', [TaskManagerController::class, 'editTaskForm'])->name('editTaskForm');
    Route::put('/managetask/{id}', [TaskManagerController::class, 'updateTask'])->name('updateTask');
    Route::post('/managetask/{id}/delete', [TaskManagerController::class, 'deleteTask'])->name('deleteTask');
}); 
