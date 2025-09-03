<?php

use App\Http\Controllers\ProfileController;
use App\Livewire\DaftarPerusahaan;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/profile', [ProfileController::class, 'index']);

Route::get('/', DaftarPerusahaan::class)->name('daftar-perusahaan');
