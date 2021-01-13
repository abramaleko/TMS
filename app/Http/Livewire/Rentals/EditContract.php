<?php

namespace App\Http\Livewire\Rentals;

use Livewire\Component;
use App\Models\Contracts;
use App\Models\User;

class EditContract extends Component
{
    public $name,$tenants,$phone_number,$email,$move_in,$move_out,$deposited,$balance,$comments,$doc_1,$doc_2,$doc_3;
    public $contract_id,$details;

    protected $rules=[
      'name' => 'required|string',
      'phone_number'=>'required|digits:10',
       'email'=>'required|email',
       'move_in' =>'required|date',
       'move_out' => 'required|date|after:move_in',
       'deposited' => 'required',
       'balance' => 'required',
       'comments'=>'nullable|string|max:455',
       'doc_1' => 'mimes:pdf,docx,doc,jpeg,jpg|max:3072|nullable',
       'doc_2' => 'mimes:pdf,docx,doc,jpeg,jpg|max:3072|nullable',
       'doc_3' => 'mimes:pdf,docx,doc,jpeg,jpg|max:3072|nullable',
    ];
    
    public function mount($id)
    {
        $this->contract_id=$id;
        $this->details=Contracts::find($id);
        $this->name=$this->details->name;
        $this->name=$this->details->tenant_name;
        $this->phone_number=$this->details->tenant_phone_number;
        $this->email=$this->details->tenant_email;
        $this->move_in=$this->details->move_in;
        $this->move_out=$this->details->move_out;
        $this->deposited=$this->details->deposited;
        $this->balance=$this->details->balance;
        $this->comments=$this->details->comments;
    }
    
    public function updated($name)
    {
        if ($this->name=='')
         {
            unset($this->tenants);
         }
        $this->validateOnly($name, [
            'name' => 'required|string',
        ]);
         
         $this->tenants=User::where([
             ['account_type','=','Tenant'],
             ['name','like',$this->name.'%'],
             ])->get();

    }

    public function setInfo($tenantName)
    {
        $info=User::select('email','name')->where('name',$tenantName)->first();
        $this->email=$info->email;
        $this->name=$info->name;
        unset($this->tenants);
    }
    public function registerTenant()
    {
        //validates the user data
     $this->validate();
    $this->details->tenant_name=$this->name;
    $this->details->tenant_phone_number=$this->phone_number;
    $this->details->tenant_email=$this->email;
    $this->details->move_in=$this->move_in;
    $this->details->move_out=$this->move_out;
    $this->details->deposited=$this->deposited;
    $this->details->balance=$this->balance;
     if (isset($this->doc_1)) 
     {
        Storage::delete('public/'.$this->details->doc_1);
        $path = $this->doc_1->store('Contract-attachments','public');
        $this->details->attach_1=$path;
     }
     if (isset($this->doc_2)) 
     {
        Storage::delete('public/'.$this->details->doc_2);
        $path = $this->doc_2->store('Contract-attachments','public');
        $this->details->attach_2=$path;
     }
     if (isset($this->doc_3)) 
     {
        Storage::delete('public/'.$this->details->doc_3);
        $path = $this->doc_3->store('Contract-attachments','public');
        $this->details->attach_3=$path;
     }
     $this->details->comments=$this->comments;
     $this->details->save();

     return redirect()->route('view-contract', ['id' => $this->contract_id]);
    }

    public function render()
    {
        return view('livewire.rentals.edit-contract');
    }
}
