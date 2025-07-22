<?php
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PegawaiController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SppdController;
use App\Http\Controllers\ReportsController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::get('/profile', [ProfileController::class, 'index'])
->middleware(['auth', 'verified'])
->name('profile');

Route::resource('sppd', SppdController::class);

Route::patch('/sppd/{id}/status', [App\Http\Controllers\SppdController::class, 'updateStatus'])->name('sppd.updateStatus');

Route::get('/reports', [ReportsController::class, 'index'])->name('reports.index');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::patch('/profile/picture', [ProfileController::class, 'updatePicture'])->name('profile.update.picture');
    Route::delete('/profile/picture', [ProfileController::class, 'removePicture'])->name('profile.remove.picture');
});

require __DIR__.'/auth.php';
