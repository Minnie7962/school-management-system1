<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class UserProfileMenu extends Component
{
    public $user;
    public $themes = ['light', 'dark', 'system'];

    public function mount()
    {
        $this->user = Auth::user();
    }

    public function changeTheme($theme)
    {
        $this->user->update(['theme' => $theme]);
        $this->dispatch('theme-changed', $theme);
    }

    public function render()
    {
        return view('livewire.user-profile-menu');
    }
}
