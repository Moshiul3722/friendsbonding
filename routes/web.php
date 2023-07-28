<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UserProfileController;
use App\Models\User;
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

// Route::get('/user',[UserController::class, 'index'])->name('user');


Route::prefix('dashboard')->middleware(['auth', 'verified'])->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('listUser/', [DashboardController::class, 'listUsers'])->name('listUser');


});

Route::prefix('user')->middleware(['auth', 'verified'])->group(function () {
    Route::get('/', [UserController::class, 'index'])->name('user');
});


Route::prefix('profile')->middleware(['auth', 'verified'])->group(function () {
    // Route::get('/', [ProfileController::class,'index'])->name('profile');
    Route::get('/show', [UserProfileController::class,'show'])->name('view.profile');
    Route::get('/', [UserProfileController::class,'index'])->name('profile');
    Route::post('/addProfile', [UserProfileController::class,'storeUserProfile'])->name('addProfile');
});


// Route::middleware('auth')->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });

require __DIR__.'/auth.php';
