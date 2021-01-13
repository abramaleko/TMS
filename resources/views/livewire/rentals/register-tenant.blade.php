    {{-- If you look to others for fulfillment, you will never truly be fulfilled. --}}
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Register tenant') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <form  autocomplete="off" wire:submit.prevent="registerTenant">
                    @error('name') <span class=" block error font-bold pl-7 text-red-600 my-3">{{ $message }}</span> @enderror
                    <div class="ml-7 my-4 table">
                        <label for="name" class="text-gray-800 table-cell">Tenant Name :</label>
                        <div class="ml-7">
                            <input type="text" id="name" wire:model="name" class=" form-input focus:outline-none px-4 py-2 w-50 rounded-md  md:w-58 border-2 border-blue-400 sm:mt-2">
                            @if (!isset($tenants))
                            <small class=" block mt-2 text-gray-500">Registered users as tenants will show up in the dropdown</small>
                            @endif
                        </div>
                        @isset($tenants)
                        <div class="ml-7 bg-gray-300  rounded-b-md ">
                            @foreach ($tenants as $tenant)
                            <span wire:click="setInfo('{{$tenant->name}}')" class="px-5 py-2 block  text-gray-700 hover:bg-gray-200 cursor-pointer ">{{$tenant->name}}</span>
                            @endforeach
                        </div> 
                        @endisset
                        </div> 
                        @error('phone_number') <span class=" block error font-bold pl-7 text-red-600 my-3">{{ $message }}</span> @enderror
                        @error('email') <span class=" block error font-bold pl-7 text-red-600 my-3">{{ $message }}</span> @enderror
                        <div class="flex flex-wrap mt-4">
                        <div class="ml-7  mb-3">
                            <label for="phone_number" class="text-gray-800">Phone number :</label>
                            <input type="text"  wire:model.defer="phone_number" id="phone_number" class="ml-3 form-input focus:outline-none px-4 py-2 w-40 rounded-md  md:w-48 border-2 border-blue-400 sm:mt-2">
                        </div> 
                        <div class="ml-7 mb-3">
                            <label for="email" class="text-gray-800">Email :</label>
                            <input type="email" wire:model.defer="email" id="email" class="ml-3 form-input focus:outline-none px-4 py-2 w-40 rounded-md  md:w-48 border-2 border-blue-400 sm:mt-2">
                        </div>
                    </div>
                    @error('move_in') <span class=" block error font-bold pl-7 text-red-600 my-3">{{ $message }}</span> @enderror
                    @error('move_out') <span class=" block error font-bold pl-7 text-red-600 my-3">{{ $message }}</span> @enderror
                    <div class="block mt-2">
                        <div class="flex flex-wrap">
                            <div class="ml-7 mb-3">
                                <label for="movein" class="text-gray-800">Move in  (mm/dd/yyyy):</label>
                                <input type="date" id="movein" wire:model.defer="move_in" class="ml-3 form-input focus:outline-none px-4 py-2 w-40 rounded-md  md:w-48 border-2 border-blue-400 sm:mt-2" placeholder="mm/dd/yyyy">
                            </div>
                            <div class="ml-7 mb-3">
                                <label for="moveout" class="text-gray-800">Move out :</label>
                                <input type="date" id="move out" wire:model.defer="move_out" class="ml-3 form-input focus:outline-none px-4 py-2 w-40 rounded-md  md:w-48 border-2 border-blue-400 sm:mt-2" placeholder="mm/dd/yyyy">
                            </div>
                        </div>
                    </div>
                    @error('deposited') <span class=" block error font-bold pl-7 text-red-600 my-3">{{ $message }}</span> @enderror
                    @error('balance') <span class=" block error font-bold pl-7 text-red-600 my-3">{{ $message }}</span> @enderror
                    <div class="block mt-2">
                        <div class="flex flex-wrap">
                            <div class="ml-7 mb-3">
                                <label for="deposited" class="text-gray-800">Deposited Amount (Tshs):</label>
                                <input type="number" wire:model.defer="deposited" id="deposited" class="ml-3 form-input focus:outline-none px-4 py-2 w-40 rounded-md  md:w-48 border-2 border-blue-400 sm:mt-2">
                            </div>
                            <div class="ml-7 mb-3">
                                <label for="balance" class="text-gray-800" >Remaining Amount (Tshs):</label>
                                <input type="number"  wire:model.defer="balance" id="balance" min="0" class="ml-3 form-input focus:outline-none px-4 py-2 w-40 rounded-md  md:w-48 border-2 border-blue-400 sm:mt-2">
                            </div>
                        </div>
                    </div>
                    <div class="block mt-3">
                        <div class="ml-5">
                                <h1 class=" text-3xl font-bold text-base text-gray-700 ml-7 mb-2">Contract Attachments</h1>
                                <p class="text-red-600 text-serif mb-1">*****Attachments are optional to upload*****</p>
                                <p class="text-gray-500 mb-5">A maximum of three attachments can be uploaded of format pdf,docx,jpg, jpeg each less than 3MB</p>
                                @error('doc_1') <span class=" block error font-bold pl-7 text-red-600 my-3">{{ $message }}</span> @enderror
                                @error('doc_2') <span class=" block error font-bold pl-7 text-red-600 my-3">{{ $message }}</span> @enderror
                                @error('doc_3') <span class=" block error font-bold pl-7 text-red-600 my-3">{{ $message }}</span> @enderror
                              @if ($doc_1)
                                <div class="block mb-5">
                                    <p class="inline text-gray-700">{{$doc_1->getClientOriginalName()}}</p>
                                    <button type="button" wire:click="resetDoc('doc_1')" class="ml-4 border-2 rounded-md  py-1 px-2 focus:outline-white bg-red-700 hover:bg-red-600 text-white  tracking-wide font-bold ">DELETE</button>
                                </div>
                              @else
                              <input type="file" wire:model.defer="doc_1" class="block my-3 focus:outline-none">
                              @endif
                              @if ($doc_2)
                              <div class="block mb-5">
                                <p class="inline text-gray-700">{{$doc_2->getClientOriginalName()}}</p>
                                <button type="button" wire:click="resetDoc('doc_2')" class="ml-4 border-2 rounded-md  py-1 px-2 focus:outline-white bg-red-700 hover:bg-red-600 text-white  tracking-wide font-bold ">DELETE</button>
                             </div>  
                              @else
                              <input type="file" wire:model.defer="doc_2" class=" block my-3 focus:outline-none">
                              @endif
                              @if ($doc_3)
                              <div class="block mb-5">
                                <p class="inline text-gray-700">{{$doc_3->getClientOriginalName()}}</p>
                                <button type="button" wire:click="resetDoc('doc_3')" class="ml-4 border-2 rounded-md  py-1 px-2 focus:outline-white bg-red-700 hover:bg-red-600 text-white  tracking-wide font-bold ">DELETE</button>
                             </div>
                              @else
                              <input type="file" wire:model.defer="doc_3" class=" block my-3 focus:outline-none">
                              @endif
                        </div>
                    </div>
                    <div class="block mt-5 ml-5">
                        <label for="comments" class="text-gray-800 block text-lg" wire:model.defer="comments">Comments</label>
                        <textarea wire:model.defer="comments" id="comments" rows="5" class="focus:outline-none mt-2 px-4 py-2 w-72  rounded-md border-2 border-blue-400 form-input text-gray-600"></textarea>
                    </div>
                    <button class="ml-4 border-2 rounded-md my-7 py-2 px-4 bg-blue-700 focus:outline-white hover:bg-blue-500	text-white  tracking-wide font-bold " type="submit">Register</button>
                </form>
            </div>
        </div>
    </div>
