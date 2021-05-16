<?php

namespace App\Http\Livewire\Messages;

use Livewire\Component;

class MessageTemplate extends Component
{
     public $messageBlock='true';
    public $newmessageBlock='false';

    public function showMessages()
    {
    //shows the messages block and disables the new message block
      $this->messageBlock='true';
      $this->newmessageBlock='false';
    }
 
    public function shownewmessage()
    {
        $this->messageBlock='false';
        $this->newmessageBlock='true';
    }
    
    public function render()
    {
        return view('livewire.messages.message-template')->extends('layouts.app2');
    }
}
