<?php

namespace App\Http\Livewire;

use Livewire\Component;

class ButtonToRentals extends Component
{
    public function redirectToRegister()
    {
        return redirect()->route('register-rental');
    }
    
    public function render()
    {
        return <<<'blade'
            <div class="sm:px-7 lg:px-9 pt-6 mx-auto">
            <button type="button" class=" mx-6 px-4 py-2  bg-gray-700 hover:bg-gray-500 text-white focus:outline-white rounded-xl" wire:click="redirectToRegister">Register rental</button>
            </div>
        blade;
    }
}
