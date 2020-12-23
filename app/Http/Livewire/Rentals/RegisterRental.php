<?php

namespace App\Http\Livewire\Rentals;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\Rental;
use Illuminate\Support\Facades\Auth;

class RegisterRental extends Component
{
    use WithFileUploads;
    //makes available the inputs
    public $region;
    public $district;
    public $ward;
    public $space_for;
    public $price;
    public $availability;
    public $description;
    public $image_1,$image_2,$image_3,$image_4,$image_5,$showImage,$imageNo;

    protected $rules =[
        'region' => 'required',
        'space_for' => 'required',
        'availability' => 'required',
        'region' => 'required',
        'district' => 'required|max:150',
        'ward' => 'required|max:150',
        'price' => 'required',
        'description' => 'required|max:450',
        'image_1' => 'image|nullable|max:2048',
        'image_2' => 'image|nullable|max:2048',
        'image_3' => 'image|nullable|max:2048',
        'image_4' => 'image|nullable|max:2048',
        'image_5' => 'image|nullable|max:2048',
  
   ];

      //real-time validation for description field
      public function updated($description)
      {
       $this->validateOnly($description);
       }
  
    
   //shows the image clicked before saving image
   public function showImage($image,$imageNo)
   {
      $this->showImage=$image;
     $this->imageNo=$imageNo;
   }

   public function deleteTempoImage($imageNo)
   {
       unset($this->showImage);
     switch ($imageNo) 
     {
         case 'image_1':
             unset($this->image_1);
             break;
         case 'image_2':
             unset($this->image_2);
             break;
          case 'image_3':
             unset($this->image_3);
            break;
         case 'image_4':
             unset($this->image_4);
             break;
         case 'image_5':
             unset($this->image_5);
              break;
     }
   }
   
   //after user press submit
   public function registerRental()
   {
       //validates the user data
       $this->validate();
        
       //inserts the data
       $validatedData=new Rental;
       $validatedData->landlord_id=Auth::user()->id;
       $validatedData->region=$this->region;
       $validatedData->district=$this->district;
       $validatedData->ward=$this->ward;
       $validatedData->description=$this->description;
       $validatedData->price=$this->price;
       $validatedData->availability=$this->availability;
       $validatedData->space_for=$this->space_for;
       if (isset($this->image_1)) {
        $path = $this->image_1->store('houseImages','public');
        $validatedData->image_1=$path;
        }
        if (isset($this->image_2)) {
            $path = $this->image_2->store('houseImages','public');
            $validatedData->image_2=$path;
         }
         if (isset($this->image_3)) {
            $path = $this->image_3->store('houseImages','public');
            $validatedData->image_3=$path;
         }
         if (isset($this->image_4)) {
            $path = $this->image_4->store('houseImages','public');
            $validatedData->image_4=$path;
         }
         if (isset($this->image_5)) {
            $path = $this->image_5->store('houseImages','public');
            $validatedData->image_5=$path;
         }
 
         $validatedData->save();
       
        return redirect()->route('rentals');
    }
   
    public function render()
    {
        return view('livewire.rentals.register-rental');
    }
}
