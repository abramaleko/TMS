<?php

namespace App\Http\Livewire\Rentals;

use Livewire\Component;

class NoRental extends Component
{
    public function register()
    {
        return redirect()->route('register-rental');

    }
    public function render()
    {
        return view('livewire.rentals.no-rental');
    }
}
