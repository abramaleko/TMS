@section('title')
    <title>Rentals</title>
@endsection
@section('content')
<div>
    <div class="hidden lg:block">
        @livewire('rentals.search-rental')
    </div>
@inject('user', 'App\CustomClasses\CheckUser')
@if ($user->userIsLandlord())
    <div class="sm:px-7 lg:px-9 pt-6 mx-auto flex flex-wrap">
        <a href="{{route('register-rental')}}" class=" mx-6 px-4 py-2  bg-gray-700 hover:bg-gray-500 text-white focus:outline-white rounded-xl">Register rental</a>
        <a href="{{route('owned-rentals')}}" class=" mx-6 mt-2 inline sm:mt-0 px-4 py-2  bg-green-400 hover:bg-green-600 text-white focus:outline-white rounded-xl">Owned rentals</a>
     </div>
@endif
    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                @if (count($rentals)>0)
                <div class="my-4">
                    @foreach ($rentals as $rental )
                        <div class="block sm:ml-16 ml-4 mb-8">
                            <div class="flex flex-wrap "> 
                                <img src="{{asset('storage')}}/{{$rental->image_1}}" class="w-60 h-40 rounded-xl mb-4">
                                <div class="sm:ml-24  text-xl	font-serif text-gray-700">
                                    <p>{{$rental->region}}, {{$rental->district}}</p>
                                    <p>{{ number_format($rental->price)}} monthly, {{$rental->negotiation}}</p>
                                    <p class="mb-3 ">{{$rental->space_for}}</p>
                                    <a href="{{route('view-rental',$rental->id)}}" class=" border-2 rounded-md py-2 px-4 bg-blue-700 focus:outline-white hover:bg-blue-500 text-white  tracking-wide ">View</a>
                
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
    @else
            <div class="grid justify-items-center">
                <h1 class="my-4 text-2xl text-gray-600	">No rentals registered yet</h1>
                <button  wire:click="register()" class="px-4 py-2 focus:outline-white text-white bg-blue-600	 hover:bg-blue-400 mb-4">Register Now</button>
            </div>
    @endif          
  </div>
        </div>
    </div>   
</div>
@endsection
