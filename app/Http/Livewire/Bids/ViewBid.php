<?php

namespace App\Http\Livewire\Bids;

use Livewire\Component;
use Illuminate\Support\Facades\DB;
use App\Models\Bids;
use Carbon\Carbon;

class ViewBid extends Component
{
    public $bid_id,$details,$confirming;
    public function mount($id)
    {
        $this->bid_id=$id;
    }
    public function deleteBid()
    {
         DB::table('bids')->where('id',$this->bid_id)->delete();
         $this->skipRender();
         return redirect()->route('tenant-bids');
    }
    public function openmodal()
    {
        //opens the modal 
      $this->confirming=true;
    }

       public function togglemodal()
       {
        $this->confirming=false;  //closes the modal
       }

       public function rejectBid()
       {
        Bids::where('id',$this->bid_id)->update(['status'=> 'Rejected']);
        return redirect()->route('Landlord-bids');
       }
    public function render()
    {
        $this->details=Bids::find($this->bid_id);
        return view('livewire.bids.view-bid');
    }
}
