<?php

namespace App\Livewire\Admin\Profile;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Layout('layouts.app')]
#[Title('WARUMA - Ubah Password')]
class Password extends Component
{
    public string $current_password = '';
    public string $new_password = '';
    public string $new_password_confirmation = '';

    public function save()
    {
        $this->validate([
            'current_password'          => 'required|current_password',
            'new_password'              => 'required|string|min:6|confirmed',
            'new_password_confirmation' => 'required',
        ], [
            'current_password.required'         => 'Password saat ini wajib diisi.',
            'current_password.current_password' => 'Password saat ini salah.',
            'new_password.required'             => 'Password baru wajib diisi.',
            'new_password.min'                  => 'Password baru minimal 6 karakter.',
            'new_password.confirmed'            => 'Konfirmasi password baru tidak cocok.',
        ]);

        Auth::user()->update([
            'password' => Hash::make($this->new_password),
        ]);

        session()->flash('success', 'Password akun kamu telah berhasil diperbarui!');
        return $this->redirect(route('profile'), navigate: true);
    }

    public function render()
    {
        return view('livewire.admin.profile.password');
    }
}
