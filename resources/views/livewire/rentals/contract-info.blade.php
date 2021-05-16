<x-slot name="title">
    Contract details
</x-slot>
<x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __('Contract Details') }}
    </h2>
</x-slot>

<div class="py-12">
    <a class="text-gray-700 px-7 pb-6">View previous contracts</a>
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
            @inject('user', 'App\CustomClasses\CheckUser')
            @if ($user->LandlordIsOwner($details->landlord_id))
            <div class="block mb-15">
                <img wire:click="redirectToEditContract" src="{{asset('icons/edit2.png')}}" class="float-right mr-6 my-4 cursor-pointer" alt="edit">
            </div>    
            @endif
            <div class="flex flex-wrap mt-4 ml-4">
                <h1 class="text-gray-700 text-lg mb-4 sm:ml-8"><b>Tenant Name: </b>{{$details->tenant_name}}</h1>
                <h1 class="text-gray-700 text-lg sm:ml-8 mb-4"><b>Email: </b> {{$details->tenant_email}}</h1>
                <h1 class="text-gray-700 text-lg sm:ml-8 mb-4"><b>Phone number: </b>{{$details->tenant_phone_number}}</h1>
            </div>
            <div class="flex flex-wrap ml-4">
                <h1 class="block text-gray-700 text-lg sm:ml-8"><b>Landlord Name: </b>{{$details->user->name}}</h1>
                <h1 class="text-gray-700 text-lg sm:ml-8 "><b>Email: </b>{{$details->user->email}}</h1>
            </div>
            <div class="flex flex-wrap mt-4 ml-4">
                <h1 class="text-gray-700 text-lg mb-4 sm:ml-8"><b>Move in  (YYYY-mm-dd) :</b>  {{$details->move_in}}</h1>
                <h1 class="text-gray-700 text-lg mb-4 sm:ml-8"><b>Move out :</b> {{$details->move_out}}</h1>
                <h1 class="text-gray-700 text-lg sm:ml-8 mb-4"><b>Duration : </b> {{$duration}} @if ($duration >1)
                    Months
                @else
                    Month
                @endif
              </h1>
             </div>
             <h1 class="block text-gray-700 text-lg ml-4 sm:ml-12"><b>Next contract in : </b> {{$nextContract}} @if ($nextContract > 1)
                 Days
             @else
                 Day
             @endif</h1>
              <div class="flex flex-wrap mt-4 ml-4">
                <h1 class="text-gray-700 text-lg mb-4 sm:ml-8"><b>Price :</b>  {{number_format($details->rental->price)}} Monthly</h1>
                <h1 class="text-gray-700 text-lg mb-4 sm:ml-8"><b>Amount deposited (Tshs) :</b>  {{number_format($details->deposited)}}</h1>
                <h1 class="text-gray-700 text-lg mb-4 sm:ml-8"><b>Remaining balance (Tshs) :</b>  {{number_format($details->balance)}}</h1>
              </div>
              <div class="block ml-4">
                <h1 class="text-gray-700 text-lg mb-2 sm:ml-8"><b>Comments:</b></h1>
                 <p class="text-gray-600 text-base mb-4 sm:ml-8">{{$details->comments}}</p>
              </div>
              <div class="block mt-4 ml-4 ">
                <h1 class="text-gray-700 text-2xl mb-4 sm:ml-8"><b>Attachments </b> </h1>
                <ul class="list-disc list-inside">
                 @if ($details->attach_1)
                    <li wire:click="downloadAttachments('{{ $details->attach_1}}')" class="text-lg sm:ml-8 text-blue-500 hover:underline mb-4 cursor-pointer">.....{{substr( $details->attach_1,-12)}} <span class="text-gray-700 text-base no-underline ">&nbsp;({{round($size_1,1)}}Mb)</span></li> 
                 @endif
                 @if ($details->attach_2)
                 <li wire:click="downloadAttachments('{{ $details->attach_2}}')" class="text-lg sm:ml-8 text-blue-500 hover:underline mb-4 cursor-pointer">.....{{substr( $details->attach_2,-12)}} <span class="text-gray-700 text-base no-underline">&nbsp;({{round($size_2)}}Mb)</span></li>
                @endif
                @if ($details->attach_3)
                <li wire:click="downloadAttachments('{{ $details->attach_3}}')" class="text-lg sm:ml-8 text-blue-500 hover:underline mb-4 cursor-pointer">.....{{substr( $details->attach_3,-12)}} <span class="text-gray-700 text-base no-underline">&nbsp;({{round($size_3)}}Mb)</span></li>
               @endif
                </ul>
                {{-- <button wire:click="downloadAttachments" class="px-4 py-2 sm:ml-8 focus:outline-white text-white bg-blue-600 hover:bg-blue-400 my-4"><img src="{{asset('icons/download.png')}}" alt="download" class="h-8 inline"> &nbsp;&nbsp; DOWNLOAD ALL</button> --}}

              </div>
        </div>
    </div>
</div>
