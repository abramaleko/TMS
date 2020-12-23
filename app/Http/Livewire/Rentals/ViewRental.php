<?php

namespace App\Http\Livewire\Rentals;
use App\Models\Rental;

use Livewire\Component;

class ViewRental extends Component
{
    public $rental;

    public function mount($rental_id)
    {
        $this->rental_id=$rental_id;
        $this->rental=Rental::find($rental_id);
    }

    public function render()
    {
        return view('livewire.rentals.view-rental');
    }
}
