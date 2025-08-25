<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\GuestController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Admin\HeadOfficialController;
use App\Http\Controllers\Admin\VillageOfficialController;
use App\Http\Controllers\Admin\UmkmController;
use App\Http\Controllers\Admin\PopulationController;
use App\Http\Controllers\Admin\DemographicController;
use App\Http\Controllers\Admin\SettingController;

// --- Authentication Routes ---
Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('login', [LoginController::class, 'login']);
Route::post('logout', [LoginController::class, 'logout'])->name('logout');

// --- Guest Routes ---
Route::get('/', [GuestController::class, 'home'])->name('home');
Route::post('/contact', [GuestController::class, 'storeContactMessage'])->name('contact.store');
Route::get('/berita/{slug}', [GuestController::class, 'showBerita'])->name('berita.show');
Route::get('/profil/kepala-desa', [GuestController::class, 'profilKepalaDesa'])->name('profil.kepala_desa');
Route::get('/profil/perangkat-desa', [GuestController::class, 'profilPerangkatDesa'])->name('profil.perangkat_desa');
Route::get('/profil/struktur-pemerintahan', [GuestController::class, 'strukturPemerintahan'])->name('profil.struktur');
Route::get('/profil/sejarah', [GuestController::class, 'sejarah'])->name('profil.sejarah');
Route::get('/profil/visi-misi', [GuestController::class, 'visiMisi'])->name('profil.visimisi');
Route::get('/data/statistik-penduduk', [GuestController::class, 'statistikPenduduk'])->name('data.statistik');
Route::get('/data/demografi', [GuestController::class, 'demografi'])->name('data.demografi');
Route::get('/umkm', [GuestController::class, 'umkm'])->name('umkm');

// --- Admin Routes ---
Route::middleware(['auth', 'is.admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::resource('posts', PostController::class);
    Route::resource('officials', VillageOfficialController::class);
    Route::resource('umkms', UmkmController::class);
    Route::resource('populations', PopulationController::class);
    Route::resource('demographics', DemographicController::class);
    Route::get('settings', [SettingController::class, 'index'])->name('settings.index');
    Route::post('settings', [SettingController::class, 'update'])->name('settings.update');
});