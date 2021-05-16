    {{-- Do your work, then step back. --}}
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg py-4">
                   @if(count($searchResults)>0)
                   @foreach ($searchResults as $searchResult )
                    <div class="block sm:ml-16 ml-4 mb-8">
                        <div class="flex flex-wrap "> 
                            <img src="{{asset('storage')}}/{{$searchResult->image_1}}" class="w-60 h-40 rounded-xl mb-4">
                            <div class="sm:ml-24  text-xl	font-serif text-gray-700">
                                    <p>{{$searchResult->region}}, {{$searchResult->district}}</p>
                                    <p>{{ number_format($searchResult->price)}} monthly, {{$searchResult->negotiation}}</p>
                                    <p>{{$searchResult->space_for}}</p>
                                <button wire:click="viewsearchResult('{{$searchResult->id}}')"  class=" block border-2 rounded-md mt-3 py-1 px-4 bg-blue-700 focus:outline-white hover:bg-blue-500 text-white  tracking-wide " type="button">View</button>
                            </div>
                        </div>
                    </div>
                @endforeach
                   @else
                        <div class="grid justify-items-center bg-white">
                            <h1 class="my-4 text-2xl text-gray-600"><img src="{{asset('icons/nothingfound.png')}}" alt="sorry" class="inline">Sorry,no results found try searching again</h1>
                            <a  href="{{route('rentals')}}" class="px-6 py-3 focus:outline-white text-white bg-blue-600	hover:bg-blue-400 mb-4">Back to rentals</a>
                            </div>
                   @endif

            </div>
        </div>
    </div>