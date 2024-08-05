<?php

use App\Livewire\Admin\Accounts;
use App\Livewire\Admin\Dashboard;
use App\Livewire\Admin\Facilities;
use App\Livewire\Admin\Reports;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;

Route::get('/', function () {
    return redirect()->route('login');
});

//admin routes
Route::get('/dashboard', Dashboard::class)->middleware(['auth', 'verified', 'role:admin'])->name('admin.dashboard');
Route::get('/accounts', Accounts::class)->middleware(['auth', 'verified', 'role:admin'])->name('admin.accounts');
Route::get('/facilities', Facilities::class)->middleware(['auth', 'verified', 'role:admin'])->name('admin.facilities');
Route::get('/reports', Reports::class)->middleware(['auth', 'verified', 'role:admin'])->name('admin.reports');

// Route::get('/', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
