<?php

namespace App\Livewire\Admin\Profile;

use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Layout('layouts.app')]
#[Title('WARUMA - Detail Profil')]
class Index extends Component
{
    public function render()
    {
        return view('livewire.admin.profile.index', [
            'user' => Auth::user(),
        ]);
    }
}
