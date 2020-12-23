<div class="p-3">
    <h1 class="font-bold text-2xl pb-4 text-gray-700">Register house</h1>
    <div class="flex flex-wrap">
        <div class="mb-4">
        <label for="country" class="text-gray-800">Country:</label>
         <select id="country" class="ml-5 px-4 py-2 w-64 rounded-md  border-2 border-blue-400 sm:mt-2">
            <option>Tanzania</option>
            <option>Kenya</option>
            <option>Uganda</option>
            <option>Rwanda</option>
            <option>Burundi</option>


        </select>
        </div>
  
        <div class="md:ml-4 mb-4">
        <label for="region" class="text-gray-800 ">Region:</label>
        <input type="text" name="region" class="ml-5 px-4 py-2 w-64 rounded-md border-2 border-blue-400 form-input sm:mt-2" placeholder="Dar es Salaam">
        </div>

       <div class="xl:ml-4 mb-4">
       <label for="district" class="text-gray-800">District:</label>
       <input type="text" name="district" class="ml-5 px-4 py-2 w-64 rounded-md border-2 border-blue-400 form-input sm:mt-2" placeholder="Kinondoni">
        </div>
    </div>
    <div class="mb-4 block">
        <label for="description" class="text-gray-800 block">Brief Description of the house:</label>
        <textarea  name="description" class=" px-4 py-2 md:w-72 rounded-md border-2 border-blue-500 form-input" rows="5" placeholder="How many rooms,bedrooms or toilets does it have"></textarea>
      </div>
      <div class="mb-4 block">
          <h1 class=" text-3xl font-bold text-base text-gray-700">Images</h1>
          <p class="text-gray-500">Photographs of the asscociated house,only a maximum of five photos can be uploaded</p>
        <div class="flex flex-wrap mt-4">
            <div class="show-image block">
            <div class="rounded-lg border-4 w-60 ml-4">
                <h1 class="text-gray-600 py-20 px-10">No image uploaded</h1>
            </div>
            <button class="ml-4 border-2 rounded-md mt-4 py-3 px-4 bg-red-700 hover:bg-red-600 text-white  tracking-wide font-bold ">DELETE</button>

            </div>

            <div class="house-attachments mt-16 inline-flex flex-wrap">
            <div class="rounded-xl border-4 w-20 h-16 ml-4 mb-2 sm:mb-0">
                <svg class="stroke-current text-gray-500">
                    <path d="M35 15 V42 M20 28 H49" style="stroke-width:3;"  />
                </svg>
            </div>
            <div class="rounded-xl border-4 w-20 h-16 ml-4 mb-2 sm:mb-0">
                <svg class="stroke-current text-gray-500">
                    <path d="M35 15 V42 M20 28 H49" style="stroke-width:3;"  />
                </svg>
            </div>
            <div class="rounded-xl border-4 w-20 h-16 ml-4 mb-2 sm:mb-0">
                <svg class="stroke-current text-gray-500">
                    <path d="M35 15 V42 M20 28 H49" style="stroke-width:3;"  />
                </svg>
            </div>
            <div class="rounded-xl border-4 w-20 h-16 ml-4 mb-2 sm:mb-0">
                <svg class="stroke-current text-gray-500">
                    <path d="M35 15 V42 M20 28 H49" style="stroke-width:3;"  />
                </svg>
            </div>
            <div class="rounded-xl border-4 w-20 h-16 ml-4 mb-2 sm:mb-0">
                <svg class="stroke-current text-gray-500">
                    <path d="M35 15 V42 M20 28 H49" style="stroke-width:3;"  />
                </svg>
            </div>

            </div>   
        </div>
</div>