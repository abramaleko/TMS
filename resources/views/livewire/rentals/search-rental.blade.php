{{-- Because she competes with no one, no one can compete with her. --}}
    <div class="max-w-4xl mx-auto mt-6">
        <div class="bg-blue-200 shadow-xl sm:rounded-lg py-2">
           <h1 class="text-2xl text-gray-700 font-light	text-center	mb-2">Search for rentals</h1>
           <div class="ml-16 mb-3 flex flex-wrap ">
              <div class="">
                <img src="{{asset('icons/location.png')}}" alt="location" class="absolute ml-3 pt-3">
                <input type="text" wire:model="location" placeholder="Enter region or district" class="w-72 h-12 rounded-lg focus:outline-none px-12 focus:border-blue-500 border-2  text-lg text-gray-700">
                @if (count($districtResults)>0 || count ($regionResults)>0)
                 <div class="bg-white rounded-b-lg w-72">
                    @foreach ($regionResults as $regionResult)
                    <span wire:click="setInfo('{{$regionResult}}')" class="px-5 py-2 block  text-gray-700 hover:bg-blue-100 cursor-pointer ">{{$regionResult}} <small class="text-blue-400">&nbsp;&nbsp;<b>(Region)</b></small></span>
                    @endforeach
                     @foreach ($districtResults as $districtResult)
                     <span wire:click="setInfo('{{$districtResult}}')" class="px-5 py-2 block  text-gray-700 hover:bg-blue-100 cursor-pointer ">{{$districtResult}} <small>&nbsp;&nbsp;<b>(District)</b></small></span>
                     @endforeach
                 </div>   
                @endif
              </div>
              <div class="">
                <label for="negotiation" class="text-gray-700 text-light ml-6 text-lg">Price range </label>
                <select wire:model.defer="range"aria-placeholder="Range" class=" form-select focus:outline-none ml-2 px-4 py-2 rounded-lg  w-56 md:w-50 focus:border-blue-500 border-2 text-gray-700 bg-white" >
                 <option selected class="px-2">All</option>
                 <option class="px-2">5,000-100,000 Tshs</option>
                 <option class="px-2">100,000-500,000 Tshs</option>
                 <option class="px-2">500,000-1,000,000 Tshs</option>
                 <option class="px-2">Above 1,000,000 Tshs</option>
               </select>
               <button wire:click="search" class="ml-4 border-2 rounded-xl  px-5 py-2 bg-blue-700 focus:outline-white hover:bg-blue-500	text-white  tracking-wide font-bold " type="submit">Search</button>
              </div>
            </div>
        </div>
    </div>