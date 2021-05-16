@section('title')
    <title>Messages</title>
@endsection
    <div class="py-12">

   <style>
    .active
    {
      margin-top: 3.288rem;
        margin-left: -0.8rem;
    }
    </style>
      <div class="max-w-5xl mx-auto sm:px-6 lg:px-8">
          <div class="bg-gray-100 overflow-hidden shadow-xl sm:rounded-lg">
            <!-- Header -->
            <div class="grid grid-cols-2 lg:text-lg text-sm  text-white font-serif">
                 <div wire:click="showMessages" class="px-8 py-3 bg-blue-500 hover:bg-blue-400 cursor-pointer">
                    <h1>Messages</h1>
                 </div>
                 <div wire:click="shownewmessage" class=" cursor-pointer px-8 py-3 bg-green-500 hover:bg-green-400 text-white">
                    <h1>New messages</h1>
                 </div>
            </div>
            <!-- Content -->
             @if ($messageBlock==='true')
               @livewire('messages.chats')
            @endif
            @if ($newmessageBlock==='true')
              @livewire('messages.newchat')
            @endif 
    
          </div>
      </div>
    </div>


