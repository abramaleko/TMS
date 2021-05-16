<?php

namespace App\Http\Livewire\Rentals;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\Rental;
use Illuminate\Support\Facades\Storage;

class EditRental extends Component
{
    use WithFileUploads;
    public $details;
    public $region;
    public $district;
    public $negotiation;
    public $space_for;
    public $price;
    public $description;
    public $image_1,$image_2,$image_3,$image_4,$image_5,$showImage,$imageNo,$rental_id;

    protected $rules =[
        'region' => 'required|string',
        'space_for' => 'required',
        'region' => 'required',
        'district' => 'required|max:150',
        'negotiation' => 'required|max:150"',
        'price' => 'required',
        'description' => 'required|max:450',
        'image_1' => 'image|nullable|max:3072',
        'image_2' => 'image|nullable|max:3072',
        'image_3' => 'image|nullable|max:3072',
        'image_4' => 'image|nullable|max:3072',
        'image_5' => 'image|nullable|max:3072',
  
   ];
    protected $messages = [
        'image_1.max' => 'The first image uploaded has size greater than 3MB',
        'image_2.max' => 'The second image uploaded has size greater than 3MB',
        'image_3.max' => 'The third image uploaded has size greater than 3MB',
        'image_4.max' => 'The fourth image uploaded has size greater than 3MB',
        'image_5.max' => 'The fifth image uploaded has size greater than 3MB',
    ];

    public function mount($rental_id)
    {
        $this->rental_id=$rental_id;
        $this->details=Rental::find($rental_id);
        $this->region=$this->details->region;
        $this->district=$this->details->district;
        $this->negotiation=$this->details->negotiation;
        $this->space_for=$this->details->space_for;
        $this->price=$this->details->price;
        $this->description=$this->details->description;
        
    }

      //shows the image clicked before saving image
   public function showImage($image,$imageNo)
   {
      $this->showImage=$image;
     $this->imageNo=$imageNo;
   }

     //real-time validation for description field
     public function updated($description)
     {
      $this->validateOnly($description);
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
      public function registerRental()
      {
          //validates the user data
          $this->validate();
             //updates the info
          $this->details->region=$this->region;
          $this->details->district=$this->district;
          $this->details->negotiation=$this->negotiation;
          $this->details->description=$this->description;
          $this->details->price=$this->price;
          $this->details->space_for=$this->space_for;
          if (isset($this->image_1)) {
            Storage::delete('public/'.$this->details->image_1);
           $path = $this->image_1->store('houseImages','public');
           $this->details->image_1=$path;
           }
           if (isset($this->image_2)) {
               Storage::delete('public/'.$this->details->image_2);
               $path = $this->image_2->store('houseImages','public');
               $this->details->image_2=$path;
            }
            if (isset($this->image_3)) {
               Storage::delete('public/'.$this->details->image_3);
               $path = $this->image_3->store('houseImages','public');
               $this->details->image_3=$path;
            }
            if (isset($this->image_4)) {
                Storage::delete('public/'.$this->details->image_4);
               $path = $this->image_4->store('houseImages','public');
               $this->details->image_4=$path;
            }
            if (isset($this->image_5)) {
                Storage::delete('public/'.$this->details->image_5);
               $path = $this->image_5->store('houseImages','public');
               $this->details->image_5=$path;
            }
    
            $this->details->save();
          
           return redirect()->route('view-rental',['rental_id' => $this->rental_id]);
           
          //updates the data
    
       }
    public function render()
    {
        return view('livewire.rentals.edit-rental');
    }
}
