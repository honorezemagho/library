<?php

namespace App\Http\Livewire;

use Livewire\Component;

class HomeSettings extends Component
{
    public $facebook_link;
    public $linkedIn_link;
    
    public function render()
    {
        return view('livewire.home-settings');
    }
}
