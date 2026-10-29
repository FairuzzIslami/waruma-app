<?php

use App\Livewire\Admin\Dashboard;
use App\Livewire\Admin\Profile\Edit as ProfileEdit;
use App\Livewire\Admin\Profile\Index as ProfileIndex;
use App\Livewire\Admin\Profile\Password as ProfilePassword;
use App\Livewire\Admin\Barang\Index as BarangIndex;
use App\Livewire\Admin\Transaksi\Index as TransaksiIndex;
use Illuminate\Support\Facades\Route;
use App\Livewire\Auth\Login;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

Route::get('/', function () {
    return view('home.welcome');
});

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
    Route::get('/barang', BarangIndex::class)->name('barang.index');
    Route::get('/transaksi', TransaksiIndex::class)->name('transaksi.index');
    Route::get('/profile', ProfileIndex::class)->name('profile');
    Route::get('/profile/edit', ProfileEdit::class)->name('profile.edit');
    Route::get('/profile/password', ProfilePassword::class)->name('profile.password');
});


Route::fallback(function () {
    return response()->view('errors.404', [], 404);
});



