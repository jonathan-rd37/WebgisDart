<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DisasterController;
use App\Http\Controllers\AdminController;
use App\Http\Middleware\AdminMiddleware;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;    

Route::get('/admin/login', [AdminController::class, 'showLoginForm'])->name('admin.login');
Route::post('/admin/login', [AdminController::class, 'login'])->name('admin.login.post');

Route::get('/admin', [AdminController::class, 'index'])->middleware(AdminMiddleware::class)->name('admin.index');

Route::middleware(['auth', AdminMiddleware::class])->group(function () {
    // Route::get('/admin', [AdminController::class, 'index'])->name('admin.index');
    Route::get('/admin/add-disaster', [AdminController::class, 'addDisaster'])->name('addDisaster');
    Route::get('/admin/delete-disaster', [AdminController::class, 'deleteDisaster'])->name('deleteDisaster');
    Route::post('/admin/add-disaster', [DisasterController::class, 'store'])->name('disaster.store');
    Route::get('/admin/add-aids', [AdminController::class, 'addAids'])->name('addAids');
    Route::post('/admin/store-aids', [AdminController::class, 'storeAids'])->name('storeAids');
});

Route::post('/logout', function () {
    Auth::logout();
    return redirect('/'); // Redirect ke Welcome Page setelah logout
})->name('logout');

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/about', function () {
    return view('about');
})->name('about');

Route::get('/map', function () {
    return view('map');
});

Route::get('/api/disasters', [DisasterController::class, 'getDisasters']);
Route::delete('/disaster/{id}', [DisasterController::class, 'destroy'])->name('disaster.destroy');

Route::get('/disaster/{id}', [DisasterController::class, 'showDetail'])->name('disaster.detail');

// Add this route to show aids for a disaster/location
Route::get('/disaster/{id}/aids', [DisasterController::class, 'showAids'])->name('disaster.aids');

require __DIR__.'/auth.php';
