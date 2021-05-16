<?php

namespace App\Http\Livewire\Messages;

use Livewire\Component;

class Chats extends Component
{
    public function render()
    {
        return <<<'blade'
            <div class="font-serif">
            <h1 class="text-gray-900 pl-4 py-4 lg:text-xl  text-lg bg-gray-100">Chats</h1>
              <div class="bg-white">
              <div class=" pl-4 py-4 flex flex-wrap hover:bg-blue-100 cursor-pointer border-b-2 border-gray-300">
              <img src="{{asset('images/violeth.jpeg')}}" class="w-16 h-16 rounded-full inline">
              <div class="h-3 w-3 rounded-full bg-green-600 active"></div>
             <div class="block lg:ml-8 ml-4">
               <p class="text-gray-900 lg:text-lg text-base">Violeth</p>
               <p class="pb-2 pt-1 text-gray-900 text-sm">Hey how are you</p>
               <p class="text-gray-900 text-sm ">2 mins ago</p>
  
             </div>
           </div>
  
           <div class=" pl-4 py-4 flex flex-wrap hover:bg-blue-100 cursor-pointer border-b-2 border-gray-300">
             <img src="{{asset('images/abraham.jpeg')}}" class="w-16 h-16 rounded-full inline">
            <div class="block lg:ml-8 ml-4">
              <p class="text-gray-900 lg:text-lg text-base">Abraham</p>
              <p class="pb-2 pt-1 text-gray-900 text-sm">You: Hey am done now</p>
              <p class="text-gray-900 text-sm ">2d ago</p>
  
            </div>
          </div>
              </div>
  
            </div>
        blade;
    }
}
