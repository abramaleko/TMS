<?php

namespace App\Http\Livewire\Bids;

use Livewire\Component;
use App\Models\Bids;
use Illuminate\Support\Facades\Auth;

class SentBids extends Component
{
    public $bids;

    public function viewBid($id)
    {
        return redirect()->route('view-bid', ['id' => $id]);
    }
    public function render()
    {
        $this->bids=Bids::where('tenant_id',Auth::user()->id)->orderBy('id','desc')->get();
        return view('livewire.bids.sent-bids');
    }
}
