<?php

use App\Http\Controllers\ProfileController;
use App\Livewire\DaftarPerusahaan;
use App\Livewire\Profile\Bbc;
use App\Livewire\Profile\BbcAdd;
use App\Livewire\Profile\Handak;
use App\Livewire\Profile\HandakAdd;
use App\Livewire\Profile\Iui;
use App\Livewire\Profile\IuiAdd;
use App\Livewire\Profile\Iuran;
use App\Livewire\Profile\IuranAdd;
use App\Livewire\Profile\Kim;
use App\Livewire\Profile\KimAdd;
use App\Livewire\Profile\Ktt;
use App\Livewire\Profile\KttAdd;
use App\Livewire\Profile\Le;
use App\Livewire\Profile\LeAdd;
use App\Livewire\Profile\Profile;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/profile', [ProfileController::class, 'index']);

Route::get('/', DaftarPerusahaan::class)->name('home');
Route::get('/profile/{id}', Profile::class)->name('profile.show');

Route::get('/profile/iuran/{id}', Iuran::class)->name('iuran.show');
Route::get('/profile/add/iuran', IuranAdd::class)->name('iuran.add');

Route::get('/profile/iui/{id}', Iui::class)->name('iui.show');
Route::get('/profile/add/iui', IuiAdd::class)->name('iui.add');

Route::get('/profile/ktt/{id}', Ktt::class)->name('ktt.show');
Route::get('/profile/add/ktt', KttAdd::class)->name('ktt.add');

Route::get('/profile/kim/{id}', Kim::class)->name('kim.show');
Route::get('/profile/add/kim', KimAdd::class)->name('kim.add');

Route::get('/profile/handak/{id}', Handak::class)->name('handak.show');
Route::get('/profile/add/handak', HandakAdd::class)->name('handak.add');

Route::get('/profile/bbc/{id}', Bbc::class)->name('bbc.show');
Route::get('/profile/add/bbc', BbcAdd::class)->name('bbc.add');

Route::get('/profile/le/{id}', Le::class)->name('le.show');
Route::get('/profile/add/le', LeAdd::class)->name('le.add');
