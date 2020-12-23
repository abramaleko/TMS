<div class="p-3">
    <form method="POST" autocomplete="off" wire:submit.prevent="registerRental">
        @csrf
        @error('country') <span class=" block error font-bold px-4 text-red-600 mb-2">{{ $message }}</span> @enderror
        @error('region') <span class=" block error font-bold px-4 text-red-600 mb-2">{{ $message }}</span> @enderror
        @error('district') <span class=" block error font-bold px-4 text-red-600 mb-2">{{ $message }}</span> @enderror
        @error('ward') <span class=" block error font-bold px-4 text-red-600 mb-2">{{ $message }}</span> @enderror
        @error('space_for') <span class=" block error font-bold px-4 text-red-600 mb-2">{{ $message }}</span> @enderror
        @error('price') <span class=" block error font-bold px-4 text-red-600 mb-2">{{ $message }}</span> @enderror
        @error('availability') <span class=" block error font-bold px-4 text-red-600 mb-2">{{ $message }}</span> @enderror

   
    <div class="flex flex-wrap">
        <div class="mb-4">
        <label for="region" class="text-gray-800 ">Region:</label>
        <select id="region" wire:model.defer="region" class="ml-5 px-4 py-2 w-56 md:w-40 rounded-md  border-2 border-blue-400 sm:mt-2 focus:outline-none" >
        <option>Choose..</option>
        <option>Arusha</option>
        <option>Dar es Salaam	</option>
        <option>Dodoma</option>
        <option>Geita</option>
        <option>Iringa</option>
        <option>Kagera	</option>
        <option>Katavi</option>
        <option>Kigoma</option>
        <option>Kilimanjaro</option>
        <option>Lindi	</option>
        <option>Manyara	</option>
        <option>Mara</option>
        <option>Mbeya</option>
        <option>Morogoro</option>
        <option>Mtwara</option>
        <option>Mwanza</option>
        <option>Njombe	</option>
        <option>Pemba North	</option>
        <option>Pemba South	</option>
        <option>Pwani</option>
        <option>Rukwa	</option>
        <option>Ruvuma	</option>
        <option>Shinyanga</option>
        <option>Simiyu</option>
        <option>Singida</option>
        <option>Tabora</option>
        <option>Tanga</option>
        <option>Zanzibar North	</option>
        <option>Zanzibar South and Central	</option>
        <option>Zanzibar West	</option>
        </select>
        </div>

       <div class="md:ml-4 mb-4">
       <label for="district" class="text-gray-800">District:</label>
       <input type="text" id="district" wire:model.defer="district" class="focus:outline-none ml-5 px-4 py-2 w-56 md:w-40 rounded-md border-2 border-blue-400 form-input sm:mt-2" placeholder="Kinondoni">
        </div>

       <div class=" md:ml-4 mb-4">
        <label for="Ward" class="text-gray-800">Ward:</label>
        <input type="text" wire:model.defer="ward" id="ward" class="focus:outline-none ml-5 px-4 py-2 w-56 md:w-40 rounded-md border-2 border-blue-400 form-input sm:mt-2" placeholder="">
         </div>

         <div class="mb-4 md:ml-4">
            <label for="space for" class="text-gray-800">Rented out</label>
            <select id="space for" wire:model.defer="space_for" class="focus:outline-none ml-5 px-4 py-2 w-40 rounded-md  w-56 md:w-40 border-2 border-blue-400 sm:mt-2" >
              <option selected>Choose..</option>
              <option>House/Rooms</option>
              <option>Office Space</option>
            </select>
             </div>
         <div class="md:ml-4 mb-4">
            <label for="price" class="text-gray-800">Price per month (Tshs):</label>
            <input type="number" wire:model.defer="price" class=" focus:outline-none ml-3 px-4 py-2 w-56  md:w-40 rounded-md border-2 border-blue-400 form-input sm:mt-2" min="1">
             </div>
         <div class="md:ml-4 mb-4">
            <label for="available" class="text-gray-800">Available for rent:</label>
            <select id="available"  wire:model.defer="availability" class=" focus:outline-none ml-5 px-4 py-2 w-40 rounded-md  w-56 md:w-48 border-2 border-blue-400 sm:mt-2" >
              <option selected>Choose..</option>
              <option>Yes</option>
              <option>No</option>
            </select>
         </div>    
   </div>

   <div class="mb-4 block">
    <label for="description" class="text-gray-800 block">Brief Description of the rental:</label>
    @error('description') <span class=" block error font-bold text-red-600 my-2">{{ $message }}</span> @enderror
    <textarea wire:model.debounce.500ms="description" class="focus:outline-none mt-2 px-4 py-2 w-72  rounded-md border-2 border-blue-500 form-input" rows="5" placeholder="How big is the space or house,how many rooms,toilet does it have?"></textarea>
  </div>
  <div class="mb-4 block">
    <h1 class=" text-3xl font-bold text-base text-gray-700">Images</h1>
    <p class="text-red-600 text-serif">*****Images are optional to upload*****</p>
    <p class="text-gray-500">A maximum of five photos can be uploaded of format jpg, jpeg of less than 2MB</p>
    @error('image_1') <span class=" block error font-bold px-4 text-red-600 mb-2">{{ $message }}</span> @enderror
    @error('image_2') <span class=" block error font-bold px-4 text-red-600 mb-2">{{ $message }}</span> @enderror
    @error('image_3') <span class=" block error font-bold px-4 text-red-600 mb-2">{{ $message }}</span> @enderror
    @error('image_4') <span class=" block error font-bold px-4 text-red-600 mb-2">{{ $message }}</span> @enderror
    @error('image_5') <span class=" block error font-bold px-4 text-red-600 mb-2">{{ $message }}</span> @enderror
    <div class="flex flex-wrap mt-4">
      <div class="show-image block">
          @if ($showImage)
           <img src="{{$showImage}}"  class="rounded-xl w-60 ml-4 " />
          @else
          <div class="rounded-lg border-4 w-60 ml-4">
            <h1 class="text-gray-600 py-20 px-10">No image uploaded</h1>
        </div> 
          @endif
      <button  @isset($showImage)
    wire:click="deleteTempoImage('{{$imageNo}}')"
      @endisset   
      type="button"  class="ml-4 border-2 rounded-md mt-4 py-3 px-4 focus:outline-white bg-red-700 hover:bg-red-600 text-white  tracking-wide font-bold ">DELETE</button>
      </div>

      <div class="house-attachments sm:mt-16 mt-4 inline-flex flex-wrap">
     @if ($image_1) 
     <div class="rounded-xl   w-20 h-16 ml-4 mb-2 sm:mb-0 ">
     @else
     <div class="rounded-xl  border-4 w-20 h-16 ml-4 mb-2 sm:mb-0 ">
     @endif 
          @if ($image_1)
          <img src="{{ $image_1->temporaryUrl()}}" wire:click="showImage('{{ $image_1->temporaryUrl()}}','image_1')"  class="rounded-xl w-20 h-16 cursor-pointer" />
          @else
          <label for="file-upload1" class="relative cursor-pointer">
            <svg class="stroke-current text-gray-500">
                <path d="M35 15 V42 M20 28 H49" style="stroke-width:3;"  />
            </svg>
            <input id="file-upload1" wire:model="image_1" type="file" class="sr-only"/>
          </label>    
          @endif
      </div>
      @if (isset($image_1))
      @if ($image_2) 
      <div class="rounded-xl  w-20 h-16 ml-4 mb-2 sm:mb-0 ">
      @else
      <div class="rounded-xl  border-4 w-20 h-16 ml-4 mb-2 sm:mb-0 ">
      @endif 
       @if ($image_2)
       <img src="{{ $image_2->temporaryUrl()}}" wire:click="showImage('{{ $image_2->temporaryUrl()}}','image_2')"  class="rounded-xl w-20 h-16 cursor-pointer" />
       @else
       <label for="file-upload2" class="relative cursor-pointer">
        <svg class="stroke-current text-gray-500">
            <path d="M35 15 V42 M20 28 H49" style="stroke-width:3;"  />
        </svg>
        <input id="file-upload2"  wire:model="image_2" type="file" class="sr-only"/>
      </label> 
       @endif
      @else
        <div class="hidden">
      @endif
      </div>
      @if (isset($image_2))
      @if ($image_3)
      <div class="rounded-xl w-20 h-16 ml-4 mb-2 sm:mb-0">
      @else
      <div class="rounded-xl border-4 w-20 h-16 ml-4 mb-2 sm:mb-0">
      @endif
      @if ($image_3)
      <img src="{{ $image_3->temporaryUrl()}}" wire:click="showImage('{{ $image_3->temporaryUrl()}}','image_3')"  class="rounded-xl w-20 h-16 cursor-pointer" />
      @else
      <label for="file-upload3" class="relative cursor-pointer">
        <svg class="stroke-current text-gray-500">
            <path d="M35 15 V42 M20 28 H49" style="stroke-width:3;"  />
        </svg>
        <input id="file-upload3" wire:model="image_3" type="file" class="sr-only">
      </label>  
      @endif
      @else
        <div class="hidden">
      @endif
      </div>
      @if (isset($image_3))
        @if ($image_4)
        <div class="rounded-xl w-20 h-16 ml-4 mb-2 sm:mb-0">
        @else
        <div class="rounded-xl border-4 w-20 h-16 ml-4 mb-2 sm:mb-0">
        @endif
        @if ($image_4)
        <img src="{{ $image_4->temporaryUrl()}}" wire:click="showImage('{{ $image_4->temporaryUrl()}}','image_4')"  class="rounded-xl w-20 h-16 cursor-pointer" />
        @else
        <label for="file-upload4" class="relative cursor-pointer">
          <svg class="stroke-current text-gray-500">
              <path d="M35 15 V42 M20 28 H49" style="stroke-width:3;"  />
          </svg>
          <input id="file-upload4" wire:model="image_4" type="file" class="sr-only">
        </label>
        @endif
      @else
          <div class="hidden">
      @endif
      </div>
      @if (isset($image_4))
      @if ($image_5)
      <div class="rounded-xl w-20 h-16 ml-4 mb-2 sm:mb-0">
      @else
      <div class="rounded-xl border-4 w-20 h-16 ml-4 mb-2 sm:mb-0">
      @endif
      @if ($image_5)
      <img src="{{ $image_5->temporaryUrl()}}" wire:click="showImage('{{ $image_5->temporaryUrl()}}','image_5')"  class="rounded-xl w-20 h-16 cursor-pointer" />
      @else
      <label for="file-upload5" class="relative cursor-pointer">
        <svg class="stroke-current text-gray-500">
            <path d="M35 15 V42 M20 28 H49" style="stroke-width:3;"  />
        </svg>
        <input id="file-upload5" wire:model="image_5" type="file" class="sr-only">
      </label>
      @endif
      </div>
      @else
          <div class="hidden">
      @endif
      </div>   
  </div>
</div>
<button class="ml-4 border-2 rounded-md mt-16 py-2 px-5 bg-blue-700 focus:outline-white hover:bg-blue-500	text-white  tracking-wide font-bold " type="submit">SAVE</button>
    </form>
</div>
