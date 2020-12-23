<?php

namespace App\Http\Livewire\Rentals;

use Livewire\Component;

class RegisteredRentals extends Component
{
    public $rentals;

      
    public function viewRental($rental_id)
    {
        return redirect()->route('view-rental', ['rental_id' => $rental_id]);
    }

    public function render()
    {
        return view('livewire.rentals.registered-rentals');
    }
}
