<?php

namespace App\Http\Livewire\Rentals;
use DateTime;
use Carbon\Carbon;

use Livewire\Component;
use App\CustomClasses\CheckUser;
use App\Models\Contracts;
use Illuminate\Support\Facades\Storage;


class ContractInfo extends Component
{
    public $contract_id;
    public $details;
    public $duration,$nextContract;
    public $size_1,$size_2,$size_3;

    //when component is mounted
    public function mount($id)
    {
        //get the details of the contract
      $this->contract_id=$id;
      $this->details=Contracts::find($this->contract_id);
      
     //date calculations
      $date1=new DateTime($this->details->move_in);
      $date2=new DateTime($this->details->move_out);
      $this->duration=$date2->diff($date1)->format("%m");      
      $this->nextContract=$date2->diff(Carbon::now())->format("%d"); 

      //attachments calculation
      $this->size_1 = Storage::size('public/'.$this->details->attach_1) / 1024000;
      $this->size_2 = Storage::size('public/'.$this->details->attach_2) / 1024000;
      $this->size_3 = Storage::size('public/'.$this->details->attach_3) / 1024000;

    }

    // public function downloadAttachments()
    // {
    //     // $size = Storage::size('public/'.$this->details->attach_1) / 1024000;
    //     return Storage::download('public/'.$this->details->attach_1);

    // }

    public function downloadAttachments($path)
    {
     return Storage::download('public/'.$path);
    }
    public function redirectToEditContract()
    {
        return redirect()->route('edit-contract', ['id' => $this->contract_id]);
    }
      
    public function render()
    {
        // $info=Contracts::find($this->contract_id);
        // if (CheckUser::LandlordIsOwner(5)) 
        // {
        //     return view('livewire.rentals.contract-info');
        // } else 
        // {
        //     $this->emit('redirectToRentals');
        // }
        return view('livewire.rentals.contract-info');

    }

}
