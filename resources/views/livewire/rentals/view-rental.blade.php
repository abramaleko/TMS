{{-- The best athlete wants his opponent at his best. --}}
<x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __('View rental') }}
    </h2>
</x-slot>

<div class="flex flex-wrap sm:grid sm:grid-cols-3 mt-6 sm:ml-8">
    <div class="block col-span-2 ">
        <img src="{{asset('storage')}}/{{$rental->image_1}}" id="imageShow" class=" ml-4 sm:ml-0 w-72 h-52 sm:w-4/5 sm:h-1/2  rounded  mb-4 block">
        <div class="flex flex-wrap ml-2">
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
    <div class="ml-4 sm:ml-0">
        <h1 class="text-4xl	font-serif mb-2">Location:</h1>
        <p class="text-xl mb-2 text-gray-700">Region: {{$rental->region}}</p>
        <p class="text-xl mb-2 text-gray-700">District: {{$rental->district}}</p>
        <p class="text-xl mb-2 text-gray-700">Ward: {{$rental->ward}}</p>
        <p class="text-xl mb-3 text-gray-700">Status: 
        {{($rental->Availability)=='Yes' ? 'Available for rent' : 'Rented out' }}
    </p>
    @inject('user', 'App\CustomClasses\CheckUser')
    @if ($user->LandlordIsOwner($rental->landlord_id))
     @if (($rental->Availability)=='Yes')
     <button type="button" class="px-4 py-2  bg-gray-700 hover:bg-gray-500 text-white focus:outline-white rounded" wire:click="redirectToRegister">Register tenant</button>
     @else
     <button type="button" class="px-4 py-2  bg-blue-600 hover:bg-blue-400 text-white focus:outline-white rounded" wire:click="redirectToRegister">Contract details</button>
     @endif
    @endif

    </div>
</div>