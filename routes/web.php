<?php

use App\Http\Controllers\ProfileController;
use App\Livewire\DaftarPerusahaan;
use App\Livewire\Profile\Profile;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/profile', [ProfileController::class, 'index']);

Route::get('/', DaftarPerusahaan::class)->name('home');
Route::get('/profile/{id}', Profile::class)->name('profile.show');
