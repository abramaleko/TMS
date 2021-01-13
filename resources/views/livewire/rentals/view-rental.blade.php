{{-- The best athlete wants his opponent at his best. --}}
<x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __('View rental') }}
    </h2>
</x-slot>

<div class="flex flex-wrap sm:grid sm:grid-cols-3 mt-6 sm:ml-8">
    <div class="block col-span-2 ">
        <img src="{{asset('storage')}}/{{$rental->image_1}}" id="imageShow" class=" mx-auto sm:ml-0 w-80 h-52 sm:w-4/5 sm:h-1/2  rounded  mb-4 block">
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
        <div class="mt-4 ml-4">
            <h1 class="text-4xl	font-serif mb-1">Description:</h1>
            <p class="text-lg text-gray-600">{{$rental->description}}
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
        <p class="text-xl mb-2 text-gray-700">Location : {{$rental->region}}, {{$rental->district}} </p>
        <p class="text-xl mb-2 text-gray-700">Rental type : {{$rental->space_for}}</p>
        <p class="text-xl mb-2 text-gray-700">Price : {{$rental->price}} monthly, {{$rental->negotiation}}</p>
        <p class="text-xl mb-3 text-gray-700">Status : 
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

    </div>
 </div>

