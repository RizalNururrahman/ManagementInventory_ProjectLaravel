<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DeviceController;
// use App\Http\Controllers\UserController;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\PengirimanController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/login', [AuthController::class, 'authenticate']);
Route::get('/register', [AuthController::class, 'register'])->name('register');
Route::post('/register', [AuthController::class, 'registervalidate']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Route::middleware(['auth', 'role:admin'])->group(function () {
//     Route::get('/admin/devices', [DeviceController::class, 'index'])->name('admin.devices.index');
// });

Route::middleware(['auth', 'role:admin'])->prefix('admin')->group(function () {
    // Rute Perangkat
    Route::get('/devices', [DeviceController::class, 'index'])->name('admin.devices.index');
    Route::get('/devices/create', [DeviceController::class, 'create'])->name('admin.devices.create');
    Route::post('/devices', [DeviceController::class, 'store'])->name('admin.devices.store');
    Route::get('/devices/{id}/edit', [DeviceController::class, 'edit'])->name('admin.devices.edit');
    Route::put('/devices/{id}', [DeviceController::class, 'update'])->name('admin.devices.update');
    Route::delete('/devices/{id}', [DeviceController::class, 'destroy'])->name('admin.devices.destroy');

    Route::get('/pengiriman', [PengirimanController::class, 'index'])->name('admin.pengiriman.index');
    Route::get('/pengiriman/create', [PengirimanController::class, 'create'])->name('admin.pengiriman.create');
    Route::post('/pengiriman', [PengirimanController::class, 'store'])->name('admin.pengiriman.store');
    Route::get('/pengiriman/{id}/edit', [PengirimanController::class, 'edit'])->name('admin.pengiriman.edit');
    Route::put('/pengiriman/{id}', [PengirimanController::class, 'update'])->name('admin.pengiriman.update');
    Route::delete('/pengiriman/{id}', [PengirimanController::class, 'destroy'])->name('admin.pengiriman.destroy');
});


// Route::middleware(['auth', 'role:admin'])->prefix('admin')->group(function () {
//     Route::resource('pengiriman', PengirimanController::class);
// });
