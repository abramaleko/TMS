<?php

namespace App\Http\Livewire\Bids;

use Livewire\Component;
use Carbon\Carbon;
use App\Models\Bids;
use Illuminate\Support\Facades\Auth;

class ReceivedBids extends Component
{
    public $bids;

    public function render()
    {
        $this->bids=Bids::where('landlord_id',Auth::user()->id)->orderBy('id','desc')->get();
        return view('livewire.bids.received-bids');
    }
}
