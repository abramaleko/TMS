    <x-slot name="title">
        Bids sent
    </x-slot>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Bids Submitted') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 border-separate">
<div class="flex flex-col">
  <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
    <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
      <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
         @if (count($bids)>0)
                     <table class="min-w-full divide-y divide-gray-200">
          <thead class="bg-gray-50">
            <tr>
              <th scope="col" class="px-6 py-3 text-left text-base font-medium text-gray-500  tracking-wider">
                Rental Location
              </th>
              <th scope="col" class="px-6 py-3 text-left text-base font-medium text-gray-500  tracking-wider">
                Bid price (Tshs)
              </th>
              <th scope="col" class="px-6 py-3 text-left text-base font-medium text-gray-500  tracking-wider">
                Status
              </th>
              <th scope="col" class="px-6 py-3 text-left text-base font-medium text-gray-500 tracking-wider">
                Submitted
              </th>
              <th scope="col" class="relative px-6 py-3">
                <span class="sr-only">Edit</span>
              </th>
            </tr>
          </thead>
          <tbody class="bg-white divide-y divide-gray-200">
            @foreach ($bids as $bid)
            <tr class="hover:bg-gray-200">
              <td class="px-6 py-4 whitespace-nowrap">
                <div class="text-sm text-gray-900">{{$bid->rental->region}},{{$bid->rental->district}}</div>
              </td>
              <td class="px-6 py-4 whitespace-nowrap">
                <div class="text-sm text-gray-900">{{number_format($bid->price)}}</div>
              </td>
              <td class="px-6 py-4 whitespace-nowrap">
                @if ($bid->status=='Active')
                <span class="px-4 py-2 inline-flex text-base leading-5 font-semibold rounded-md bg-green-200 text-green-800">
                @elseif($bid->status=='Rejected')
                <span class="px-4 py-2 inline-flex text-base leading-5 font-semibold rounded-md bg-red-500 text-white">
                 @else
                 <span class="px-4 py-2 inline-flex text-base leading-5 font-semibold rounded-md bg-blue-500 text-white">
                @endif
                 {{$bid->status}}
                </span>
              </td>
              <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                {{$bid->created_at->diffForHumans()}}
              </td>
              <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                <a href="{{route('view-bid',$bid->id)}}" class="text-indigo-600 text-base hover:text-indigo-900">View</a>
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
         @else
         <div class="grid justify-items-center bg-white">
          <h1 class="my-4 text-2xl text-gray-600"><img src="{{'icons/sad.png'}}" alt="sad" class="inline"> Sorry, no bids done yet</h1>
          <a  href="{{route('rentals')}}" class="px-6 py-3 focus:outline-white text-white bg-blue-600	hover:bg-blue-400 mb-4">Bid Now</a>
          </div>
         @endif
      </div>
    </div>
  </div>
</div>
        </div>
    </div>