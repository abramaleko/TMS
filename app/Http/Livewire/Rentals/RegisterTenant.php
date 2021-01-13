<?php

namespace App\Http\Livewire\Rentals;
use Livewire\WithFileUploads;
use App\Models\User;
use App\Models\Rental;
use App\Models\Contracts;
use Illuminate\Support\Facades\Auth;


use Livewire\Component;

class RegisterTenant extends Component
{
    use WithFileUploads;

    public $name,$tenants,$phone_number,$email,$move_in,$move_out,$deposited,$balance,$comments,$doc_1,$doc_2,$doc_3;
    public $rental_id;

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
        $this->rental_id=$id;
    }

     // real-time validation for input field name
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
    public function resetDoc($docNo)
    {
        switch ($docNo) {
            case 'doc_1':
                unset($this->doc_1);
                break;
            case 'doc_2':
                unset($this->doc_2);
                break;
            case 'doc_3':
                unset($this->doc_3);
                break;    
        }
    }

    public function registerTenant()
    {
        //validates the user data
        $this->validate();
        
        $validatedData=new Contracts;
        $validatedData->rental_id=$this->rental_id;
        $validatedData->landlord_id=Auth::user()->id;
        $validatedData->tenant_name=$this->name;
        $validatedData->tenant_phone_number=$this->phone_number;
        $validatedData->tenant_email=$this->email;
        $validatedData->move_in=$this->move_in;
        $validatedData->move_out=$this->move_out;
        $validatedData->deposited=$this->deposited;
        $validatedData->balance=$this->balance;
         if (isset($this->doc_1)) 
         {
            $path = $this->doc_1->store('Contract-attachments','public');
            $validatedData->attach_1=$path;
         }
         if (isset($this->doc_2)) 
         {
            $path = $this->doc_2->store('Contract-attachments','public');
            $validatedData->attach_2=$path;
         }
         if (isset($this->doc_3)) 
         {
            $path = $this->doc_3->store('Contract-attachments','public');
            $validatedData->attach_3=$path;
         }
         $validatedData->comments=$this->comments;
         $validatedData->save();
         Rental::where('id',$this->rental_id)->update(['contract_id'=> $validatedData->id]);

         return redirect()->route('view-rental', ['rental_id' => $this->rental_id]);

      
    }
    public function render()
    {
        return view('livewire.rentals.register-tenant');
    }
}
