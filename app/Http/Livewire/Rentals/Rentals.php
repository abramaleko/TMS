<?php

namespace App\Http\Livewire\Rentals;

use Livewire\Component;
use App\Models\Rental;

class Rentals extends Component
{
    public $rentals;
 
    public function render()
    {
         $this->rentals=Rental::whereNull('contract_id')->orderBy('id','desc')->get();
        return view('livewire.rentals.rentals')->extends('layouts.app2');
    }
}
