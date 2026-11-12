<?php

use App\Livewire\Admin\Barang\Barang;
use App\Livewire\Admin\Dashboard;
use App\Livewire\Admin\LaporanLaba\LaporanLaba;
use App\Livewire\Admin\Profile\Edit as ProfileEdit;
use App\Livewire\Admin\Profile\Index as ProfileIndex;
use App\Livewire\Admin\Profile\Password as ProfilePassword;
use App\Livewire\Admin\Transaksi\Transaksi;
use App\Livewire\Auth\Login;
use App\Livewire\KatalogPublik;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Livewire\Welcome;

Route::get('/', Welcome::class)->name('home');

Route::get('/katalog', KatalogPublik::class)->name('katalog.publik');

Route::get('/login', Login::class)->name('login');
Route::post('/logout', function (Request $request) {
    Auth::logout();
    $request->session()->invalidate();
    $request->session()->regenerateToken();
    session()->flash('success', 'Kamu telah berhasil logout.');

    return redirect('/login');
})->name('logout')->middleware('auth');

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', Dashboard::class)->name('dashboard');
    Route::get('/barang', Barang::class)->name('barang.index');
    Route::get('/transaksi', Transaksi::class)->name('transaksi.index');
    Route::get('/laporan-laba-rugi', LaporanLaba::class)->name('laporan.laba.rugi');
    Route::get('/profile', ProfileIndex::class)->name('profile');
    Route::get('/profile/edit', ProfileEdit::class)->name('profile.edit');
    Route::get('/profile/password', ProfilePassword::class)->name('profile.password');
});

Route::fallback(function () {
    return response()->view('errors.404', [], 404);
});
