<?php

namespace App\Livewire\Admin\Profile;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithFileUploads;

#[Layout('layouts.app')]
#[Title('WARUMA - Edit Profil')]
class Edit extends Component
{
    use WithFileUploads;

    public string $username = '';
    public $foto;
    public $existingFoto;

    public function mount()
    {
        $user = Auth::user();
        $this->username = $user->username;
        $this->existingFoto = $user->foto ?? null;
    }

    public function save()
    {
        $user = Auth::user();

        $this->validate([
            'username' => [
                'required',
                'string',
                'min:3',
                'max:50',
                Rule::unique('users', 'username')->ignore($user->id),
            ],
            'foto' => 'nullable|image|max:2048', // Maksimal 2MB
        ], [
            'username.required' => 'Username wajib diisi.',
            'username.unique'   => 'Username ini sudah dipakai user lain.',
            'foto.image'        => 'File harus berupa gambar.',
            'foto.max'          => 'Ukuran foto maksimal 2MB.',
        ]);

        $data = ['username' => $this->username];

        // Jika user mengunggah foto baru
        if ($this->foto) {
            // 1. Hapus foto lama dari storage jika file-nya ada
            if ($user->foto && Storage::disk('public')->exists($user->foto)) {
                Storage::disk('public')->delete($user->foto);
            }

            // 2. Simpan foto baru ke folder profile-photos di disk public
            $path = $this->foto->store('profile-photos', 'public');
            $data['foto'] = $path;
        }

        // 3. Update data user
        $user->update($data);

        session()->flash('success', 'Profil berhasil diperbarui!');
        return $this->redirect(route('profile'), navigate: true);
    }

    public function render()
    {
        return view('livewire.admin.profile.edit');
    }
}
