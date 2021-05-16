<x-slot name="title">
    Bid details
</x-slot>
<x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __('Bid Info') }}
    </h2>
</x-slot>

<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg py-6 pl-8 flex flex-col-reverse sm:flex-row">
            <div class="pb-4">
                <img src="{{asset('storage')}}/{{$details->rental->image_1}}" class="w-60 lg:w-72 lg:h-44 h-40 rounded-xl mb-4">
                <p class="text-gray-700 text-base pb-3"><b> Rental location: </b>{{$details->rental->region}}, {{$details->rental->district}}</p>
                <p class="text-gray-700 text-base pb-3"><b> Rental price: </b>{{number_format($details->rental->price)}} Tshs</p>
                <a href="{{route('view-rental',$details->rental_id)}}" class="text-lg py-3 text-blue-500 hover:underline">More details ..</a>

            </div>
            <div class="md:ml-8 ">
                <p class="text-gray-700 text-lg pb-3"><b> Amount payable: </b>{{number_format($details->price)}} Tshs</p>
                <p class="text-gray-700 text-lg pb-3"><b> Contract duration: </b>{{$details->duration}} Months</p>
                <p class="text-gray-700 text-lg pb-3"><b> Bid Status: </b>{{ucfirst($details->status)}}</p>
                <p class="text-gray-700 text-lg pb-3"><b> Submitted: </b>{{$details->created_at->diffForHumans()}}</p>
                <p class="text-gray-700 text-lg pb-1"><b> Comments:</b></p>
                <p class="text-gray-700 text-lg pb-4">{{ucfirst($details->comments)}}</p>
                @inject('user', 'App\CustomClasses\CheckUser')
                @if ($user->UserIsTenant())
                <button  wire:click="deleteBid()" class="px-5 py-2 focus:outline-white text-white bg-red-600 rounded-md	hover:bg-red-400 mb-4">DELETE BID</button>
                @endif
                @if ($user->UserIsLandlord())
                @if ($details->status=="Active")
                <button  class="px-5 py-2 mr-8 focus:outline-white text-white bg-blue-600 rounded-md	hover:bg-blue-400 mb-4">Accept</button>
                <button  wire:click="openmodal" class="px-6 py-2 lg:ml=6 focus:outline-white text-white bg-red-600 rounded-md	hover:bg-red-400 mb-4">Reject</button>
                @endif
                @if ($details->status=="Negotiating")
                <button  wire:click="openmodal" class="px-6 py-2 lg:ml=6 focus:outline-white text-white bg-red-600 rounded-md	hover:bg-red-400 mb-4">End Negotiation</button>

                @endif
                      
                @endif
                <x-jet-confirmation-modal wire:model="confirming">
                    <x-slot name="title">
                       Reject Bid
                    </x-slot>
                
                    <x-slot name="content">
                        Are you sure you want to reject bid? Once bid is rejected, you can not communicate or negotiate further with the client.
                    </x-slot>
                
                    <x-slot name="footer">
                        <x-jet-secondary-button wire:click="togglemodal" wire:loading.attr="disabled">
                            Nevermind
                        </x-jet-secondary-button>
                
                        <x-jet-danger-button class="ml-2" wire:click="rejectBid" wire:loading.attr="disabled">
                            Reject bid
                        </x-jet-danger-button>
                    </x-slot>
                </x-jet-confirmation-modal>
            </div>
        </div>
    </div>
</div>