<?php

namespace App\Livewire\Admin\Auth;

use Livewire\Component;

class Index extends Component
{
    public function render()
    {
        return view('livewire.admin.auth.index')->layout('layouts.admin.auth');
    }
}
