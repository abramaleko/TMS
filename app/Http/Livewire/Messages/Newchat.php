<?php

namespace App\Http\Livewire\Messages;

use Livewire\Component;

class Newchat extends Component
{
    public function render()
    {
        return <<<'blade'
            <div class="font-serif">
          <div class="bg-white">
          @inject('user', 'App\CustomClasses\CheckUser')
          <h1 class="text-gray-900 pl-4 py-4 lg:text-xl text-lg  bg-gray-100">
          @if ($user->userIsTenant())
           Landlord's currently in negotiation
          @else
          Client's currently in negotiation
          @endif
         </h1>
         <div class="pl-4 py-4 flex flex-wrap hover:bg-blue-100 cursor-pointer border-b-2 border-gray-300">
           <img src="{{asset('images/violeth.jpeg')}}" class="w-16 h-16 rounded-full inline">
           <p class="text-gray-900 lg:ml-8 ml-4 pt-2 lg:text-lg text-base">Violeth</p>
         </div>

         <div class="pl-4 py-4 flex flex-wrap hover:bg-blue-100 cursor-pointer border-b-2 border-gray-300">
           <img src="{{asset('images/abraham.jpeg')}}" class="w-16 h-16 rounded-full inline">
           <p class="text-gray-900 lg:ml-8 ml-4 pt-2 lg:text-lg text-base">Abraham</p>
         </div>
         </div>
          </div>
        blade;
    }
}
