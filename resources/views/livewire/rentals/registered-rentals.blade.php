@if (count($rentals)>0)
            <div class="my-4">
                @foreach ($rentals as $rental )
                    <div class="block sm:ml-16 ml-4 mb-8">
                        <div class="flex flex-wrap "> 
                            <img src="{{asset('storage')}}/{{$rental->image_1}}" class="w-60 h-40 rounded-xl mb-4">
                            <div class="sm:ml-24  text-xl	font-serif text-gray-700">
                                <p>{{$rental->region}},{{$rental->district}}</p>
                                <p>{{$rental->price}} Monthly</p>
                                <p>{{($rental->Availability)=='Yes' ? 'Available for rent' : 'Rented out' }}</p>
                                <button wire:click="viewRental('{{$rental->id}}')"  class=" block border-2 rounded-md mt-3 py-1 px-4 bg-blue-700 focus:outline-white hover:bg-blue-500 text-white  tracking-wide " type="button">View</button>
            
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
@else
@livewire('rentals.no-rental')
@endif