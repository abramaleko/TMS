<?php

namespace App\Http\Livewire\Rentals;

use Livewire\Component;
use App\Http\Livewire\Rentals\OwnedRentals;
use Illuminate\Support\Facades\Auth;
use App\Models\Rental;

class OwnedRentals extends Component
{
    public $rentals;

public function mount()
{
  $this->rentals=Rental::where('landlord_id',Auth::user()->id)->orderBy('id','desc')->get();
}

public function register()
{
    return redirect()->route('register-rental');
}   

public function viewRental($rental_id)
{
    return redirect()->route('view-rental', ['rental_id' => $rental_id]);
} 
    public function render()
    {
        return view('livewire.rentals.owned-rentals')->extends('layouts.app2')->section('content');
    }
}
