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
use App\Livewire\Profile\Pa;
use App\Livewire\Profile\PaAdd;
use App\Livewire\Profile\Pelabuhan;
use App\Livewire\Profile\PelabuhanAdd;
use App\Livewire\Profile\Pl;
use App\Livewire\Profile\PlAdd;
use App\Livewire\Profile\Profile;
use App\Livewire\Profile\Rpt;
use App\Livewire\Profile\RptAdd;
use App\Livewire\Profile\Rr;
use App\Livewire\Profile\RrAdd;
use App\Livewire\Profile\Stk;
use App\Livewire\Profile\StkAdd;
use App\Livewire\Profile\Tb;
use App\Livewire\Profile\TbAdd;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Route::get('/profile', [ProfileController::class, 'index']);

Route::get('/home', DaftarPerusahaan::class)->name('home');
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

Route::get('/profile/pelabuhan/{id}', Pelabuhan::class)->name('pelabuhan.show');
Route::get('/profile/add/pelabuhan', PelabuhanAdd::class)->name('pelabuhan.add');

Route::get('/profile/pl/{id}', Pl::class)->name('pl.show');
Route::get('/profile/add/pl', PlAdd::class)->name('pl.add');

Route::get('/profile/pa/{id}', Pa::class)->name('pa.show');
Route::get('/profile/add/pa', PaAdd::class)->name('pa.add');

Route::get('/profile/rpt/{id}', Rpt::class)->name('rpt.show');
Route::get('/profile/add/rpt', RptAdd::class)->name('rpt.add');

Route::get('/profile/rr/{id}', Rr::class)->name('rr.show');
Route::get('/profile/add/rr', RrAdd::class)->name('rr.add');

Route::get('/profile/stk/{id}', Stk::class)->name('stk.show');
Route::get('/profile/add/stk', StkAdd::class)->name('stk.add');

Route::get('/profile/tb/{id}', Tb::class)->name('tb.show');
Route::get('/profile/add/tb', TbAdd::class)->name('tb.add');
