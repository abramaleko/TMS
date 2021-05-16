<?php

namespace App\Http\Livewire\Rentals;

use Livewire\Component;
use App\Models\Rental;

class SearchResult extends Component
{
    public $searchResults;
  
    
    public function mount($location,$range)
    {
      switch ($range) {
          case 'All':
             $this->searchResults=Rental::where('region',$location)->orWhere('district',$location)->whereNull('contract_id')->get();
            break;
          case '5,000-100,000 Tshs':
            $this->searchResults=Rental::where('region',$location)->orWhere('district',$location)->whereNull('contract_id')->where([
                ['price', '>=', '5000'],
                ['price', '<=', '100000'],
            ])->get();
              break;
              case '100,000-500,000 Tshs':
                $this->searchResults=Rental::where('region',$location)->orWhere('district',$location)->whereNull('contract_id')->where([
                    ['price', '>=', '100000'],
                    ['price', '<=', '500000'],
                ])->get();
                  break;
              case '500,000-1,000,000 Tshs':
                $this->searchResults=Rental::where('region',$location)->orWhere('district',$location)->whereNull('contract_id')->where([
                    ['price', '>=', '500000'],
                    ['price', '<=', '1000000'],
                ])->get();
                  break;
                  case 'Above 1,000,000 Tshs':
                    $this->searchResults=Rental::where('region',$location)->whereNull('contract_id')->orWhere('district',$location)
                    ->where('price','>','1000000')->get();
                      break;

      }
    }

    public function viewRental($rental_id)
    {
        return redirect()->route('view-rental', ['rental_id' => $rental_id]);
    }

    public function render()
    {
        return view('livewire.rentals.search-result')->extends('layouts.app2')->section('content');
    }
}
