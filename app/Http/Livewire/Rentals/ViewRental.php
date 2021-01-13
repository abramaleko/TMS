<?php

namespace App\Http\Livewire\Rentals;
use App\Models\Rental;

use Livewire\Component;

class ViewRental extends Component
{
    public $rental;
    public $rental_id;

    public function mount($rental_id)
    {
        $this->rental_id=$rental_id;
        $this->rental=Rental::find($rental_id);
    }
    
    public function registerTenant()
    {
        return redirect()->route('register_tenant',['id' => $this->rental_id]);
    }
    
    public function redirectToContract()
    {
        return redirect()->route('view-contract', ['id' => $this->rental->contract_id]);
    }

    public function redirectToEditRental()
    {
        return redirect()->route('edit-rental', ['rental_id' => $this->rental_id]);

    }

    public function render()
    {
        return view('livewire.rentals.view-rental');
    }
}
