<?php

namespace App\Livewire\Auth;

use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('layouts.guest')]
class Login extends Component
{
    public string $username = '';
    public string $password = '';
    public bool $remember = false;

    protected array $messages = [
        'username.required' => 'username wajib di isi',
        'password.required' => 'password wajib di isi',
    ];

    public function login()
    {
        $this->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        if (Auth::attempt(['username' => $this->username, 'password' => $this->password], $this->remember)) {
            session()->regenerate();

            return $this->redirect('/dashboard', navigate: true);
        }

        //Jika Kredensial Salah (Terisi tapi tidak cocok)
        session()->flash('auth_error', 'Username atau password yang kamu masukkan salah.');
    }

    public function render()
    {
        return view('livewire.auth.login');
    }
    public function mount()
    {
        if (Auth::check()) {
            return $this->redirect('/dashboard', navigate: true);
        }
    }
}
