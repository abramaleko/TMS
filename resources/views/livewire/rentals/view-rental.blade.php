{{-- The best athlete wants his opponent at his best. --}}
<x-slot name="title">
  Rentals
</x-slot>
<x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __('View rental') }}
    </h2>
</x-slot>

<div class="flex flex-wrap sm:grid sm:grid-cols-3 mt-6 sm:ml-8">
    <div class="block col-span-2 ">
        <img src="{{asset('storage')}}/{{$rental->image_1}}" id="imageShow" class=" mx-auto sm:ml-0 w-80 h-52 md:h-96 sm:w-4/5 sm:h-1/2  rounded  mb-4 block">
        <div class="flex flex-wrap ml-4">
            @isset($rental->image_1)
              <img src="{{asset('storage')}}/{{$rental->image_1}}" onclick="showImage(this)" class="rounded-xl w-20 h-16 cursor-pointer mr-6 mb-4">
            @endisset
            @isset($rental->image_2)
            <img src="{{asset('storage')}}/{{$rental->image_2}}" onclick="showImage(this)" class="rounded-xl w-20 h-16 cursor-pointer mr-6 mb-4">
           @endisset
           @isset($rental->image_3)
           <img src="{{asset('storage')}}/{{$rental->image_3}}" onclick="showImage(this)" class="rounded-xl w-20 h-16 cursor-pointer  mr-6 mb-4">
          @endisset
          @isset($rental->image_4)
          <img src="{{asset('storage')}}/{{$rental->image_4}}" onclick="showImage(this)"  class="rounded-xl w-20 h-16 cursor-pointer  mr-6 mb-4">
        @endisset
        @isset($rental->image_5)
        <img src="{{asset('storage')}}/{{$rental->image_5}}" onclick="showImage(this)"  class="rounded-xl w-20 h-16 cursor-pointer  mr-6 mb-4">
       @endisset
        </div>
        <div class="mt-4 mx-3">
            <h1 class="md:text-4xl text-3xl  text-justify font-serif mb-1">Description:</h1>
            <p class="text-lg text-gray-700">{{$rental->description}}
        </div>
        <script>
            function showImage(element)
            {
            let src=element.getAttribute('src');
             document.getElementById('imageShow').setAttribute('src',src);
            }
            </script>
    </div>
    <div class="ml-4 sm:ml-0 mt-6">
        <p class="md:text-xl text-lg mb-2 text-gray-600">Location : {{$rental->region}}, {{$rental->district}} </p>
        <p class="md:text-xl text-lg mb-2 text-gray-600">Rental type : {{$rental->space_for}}</p>
        <p class="md:text-xl text-lg mb-2 text-gray-600">Price : {{number_format($rental->price)}} Tshs monthly, {{$rental->negotiation}}</p>
        <p class="md:text-xl text-lg mb-3 text-gray-600">Status : 
        {{($rental->contract_id)=='' ? 'Available for rent' : 'Rented out' }}
    </p>
    @inject('user', 'App\CustomClasses\CheckUser')
    @if ($user->LandlordIsOwner($rental->landlord_id))
     @if (($rental->contract_id)=='')
     <button type="button" class="px-4 py-2  bg-gray-700 hover:bg-gray-500 text-white focus:outline-white rounded" wire:click="registerTenant">Register tenant</button>
     @else
     <button type="button" class="px-4 py-2 inline bg-blue-600 hover:bg-blue-400 text-white focus:outline-white rounded" wire:click="redirectToContract">Contract details</button>
     @endif
    @endif
    @if ($user->LandlordIsOwner($rental->landlord_id))
        <button wire:click="redirectToEditRental" class=" xl:ml-6 sm:ml-0 px-4 py-2  focus:outline-white text-white rounded bg-gray-700 hover:bg-gray-500 mt-4"><img src="{{asset('icons/edit.png')}}" alt="edit" class="h-8 inline">EDIT RENTAL</button>
    @endif
     @if ($user->UserIsTenant())
     <button wire:click="bidRental" class=" px-4 py-2  focus:outline-white text-white rounded bg-blue-600 hover:bg-blue-400  mt-4"><img src="{{asset('icons/rent.png')}}" alt="edit" class="h-8 inline mr-2">Rent</button>
        @if ($checkBid=='true')
           <span class="text-red-700 font-bold block text-md py-3 ">Sorry, you still have an active bid for this rental</span> 
        @endif
     @endif
    </div>
    <x-jet-dialog-modal wire:model="rentModal">
        <x-slot name="title">
            {{ __('Bidding Terms') }}
        </x-slot>
    
        <x-slot name="content">
            <form autocomplete="off">
                <div class="errors my-4">
                 @error('price') <span class=" block error font-bold px-4 text-red-600 md:text-lg text-sm  mb-2">{{ $message }}</span> @enderror
                @error('duration') <span class=" block error font-bold px-4 text-red-600 md:text-lg text-sm  mb-2">{{ $message }}</span> @enderror
                @error('comments') <span class=" block error font-bold px-4 text-red-600 md:text-lg text-sm  mb-2">{{ $message }}</span> @enderror
                </div>
            <div class="block my-4">
                    <div class="mb-4">
                        <label for="amount" class="text-gray-800 md:text-lg text-sm ">Amount willing to pay per month: (Tshs)</label>
                        @if ($rental->negotiation=='Negotiable')
                        <input type="number" wire:model.defer='price' id="amount" class=" px-3 form-input border-2 border-blue-300 md:text-lg text-sm  w-45 md:inline block md:ml-4 mt-2" min="1">
                        @else
                        <input value="{{number_format($rental->price)}}" type="text" id="amount" class=" relative bg-gray-300 px-3 form-input md:text-lg text-sm  w-45 md:inline block md:ml-4 mt-2 cursor-not-allowed	" min="1" disabled>
                         <small class="block text-red-500 font-bold text-sm mt-1"><img src="{{asset('icons/help1.png')}}" alt="help" class="w-6 inline mr-1">This rental has a fixed price of {{number_format($rental->price)}} Tshs</small>
                        @endif
                        
                    </div>
                    <div class="mt-3 mb-4">
                        <label for="duration" class="text-gray-800 md:text-lg text-sm ">Contract duration: (Months)</label>
                        <input type="number" wire:model.defer="duration" id="duration" class="relative px-3 form-input border-2 border-blue-300 w-45  md:text-lg text-sm md:inline block md:ml-4 mt-2" min="1">
                        <small class="block text-gray-500 text-sm font-bold mt-1 mb-4"><img src="{{asset('icons/help2.png')}}" alt="help" class="w-6 inline mr-1">How many months are you willing to pay for</small>

                    </div>
            </div>
            <div class="my-4">
                <label for="comments" class="text-gray-800 md:text-lg text-sm block mb-3">Comments <small>(Optional)</small></label>
                <textarea id="comments" wire:model.defer="comments" rows="5" class="lg:w-8 px-3 md:text-lg text-sm form-textarea border-2 border-blue-300" placeholder="Write any additional details you want to send " style="width:100% !important;"></textarea>
            </div>
             
         
        </form>
        </x-slot>
    
        <x-slot name="footer">
            <x-jet-secondary-button wire:click="togglemodal" wire:loading.attr="disabled">
                Cancel
            </x-jet-secondary-button>
    
            <button type="button" class="px-4 py-2 ml-4 my-4 inline bg-blue-600 hover:bg-blue-300 text-white focus:outline-white rounded" wire:click="submit"  wire:loading.class="hidden" >Submit</button>
            <div class="inline ml-2 text-gray-700 mb-4 text-lg" wire:loading.inline wire:target="submit">
             Submiting bid 😊 
            </div>
        </x-slot>
    </x-jet-dialog-modal >
 </div>

