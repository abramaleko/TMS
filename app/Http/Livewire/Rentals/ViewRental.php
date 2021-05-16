<?php

namespace App\Http\Livewire\Rentals;
use App\Models\Rental;
use App\Models\Bids;
use Illuminate\Support\Facades\Auth;

use Livewire\Component;

class ViewRental extends Component
{
    public $rental;
    public $rental_id,$rentModal,$price,$duration,$comments;
    public $checkBid="false";

    public function mount($rental_id)
    {
        $this->rental_id=$rental_id;
        $this->rental=Rental::find($rental_id);
        if ($this->rental->negotiation=='Fixed price') {
            $this->price=number_format($this->rental->price);
         }
         
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
    public function bidRental()
    {
        //checks if the tenant has already submitted a bid and awaiting results
        $Bid=Bids::where('rental_id',$this->rental_id)->where('status','Active')->get();
        if(count($Bid)==0)  //if their is no rows returned 
        {
            // return redirect()->route('bid-rental', ['rental_id' => $this->rental_id]);
           //opens modal for bidding
            $this->rentModal=true;
        }
        else
        {
            //notify the user that he/she has already bid the rental
            $this->checkBid="true";
        }
    }
   
       public function togglemodal()
       {
        $this->rentModal=false;  //closes the modal
       }

       //submits data for bidding
       public function submit()
       {
           $validatedData = $this->validate([
               'price' => 'required',
               'duration' => 'required',
               'comments' => 'nullable|max:450',
           ]);
   
           $insert=new Bids;
           $insert->rental_id=$this->rental_id;
           $insert->tenant_id=Auth::user()->id;
           $insert->landlord_id=$this->rental->landlord_id;
           $insert->price=str_replace(',','',$validatedData['price']);  
           $insert->duration=$validatedData['duration'];
           $insert->comments=$validatedData['comments'];
           $insert->save();
   
           return redirect()->route('tenant-bids');
       }
    public function render()
    {
        return view('livewire.rentals.view-rental');
    }
}
