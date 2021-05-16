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
    public $negotiation;
    public $space_for;
    public $price;
    public $description;
    public $image_1,$image_2,$image_3,$image_4,$image_5,$showImage,$imageNo;
    public $districts=['Meru','Arusha mjini','Arusha vijijini','Karatu','Longido','Monduli','Ngorongoro','Ilala','Kinondoni','Temeke','Bahi','Chamwino','Chemba','Dodoma mjini','Kondoa','Kongwa','Mpwapwa','Bukombe','Chato','Geita','Mbogwe','Nyanghwale','Iringa vijijini','Iringa mjini','Kilolo','Mufindi','Mafinga mjini','Biharamulo','Bukoba vijijini','Bukoba mjini','Karagwe','Kyerwa','Misenyi','Muleba','Ngara','Mlele','Mpanda mjini','Mpanda vijijini','Buhigwe','Kakonko','Kasulu mjini','Kibondo','Kigoma mjini','Kigoma ujiji','Uvinza','Hai','Moshi mjini','Moshi vijijini','Mwanga','Rombo','Same','Siha','Kilwa','Lindi vijijini','Lindi mjini','Liwale','Nachingwea','Ruangwa','Babati Mjini','Babati vijijini','Hanang','Kiteto','Mbulu','Simanjiro','Bunda','Butiama','Musoma mjini','Musoma vijijini','Roray','Serengeti','Tarime','Chunya','Ileje','Kyela','Mbarali','Mbeya vijijini','Mbeya mjini','Mbozi','Momba','Rungwe','Tunduma','Gairo','Kilombero','Kilosa','Morogoro mjini','Morogoro vijijini','Mvomero','Ulanga','Masasi mjini','Masasi vijijini','Mtwara vijijini','Mtwara mjini','Nanyumbu','Newala','Tandahimba','Ilemela','Nyamagana','Sengerema','Kwimba','Magu','Misungwi','Ukerewe','Ludewa','Makambako','Makete','Njombe vijijini','Njombe mjini','Wanging\'ombe','Wete','Micheweni','Chake chake','Mkoani','Bagamoyo','Kibaha mjini','Kibaha vijijini','Kisarawe','Mafia','Mkuranga','Rufiji','Kalambo','Nkasi','Sumbawanga vijijini','Sumbawanga mjini','Mbinga','Namtumbo','Nyasa','Songea vijijini','Songea mjini','Tunduru','Kahama mjini','Kahama vijijini','Kishapu','Shinyanga vijijini','Shinyanga mjini','Bariadi','Busega','Itilima','Maswa','Meatu','Iramba','Manyoni','Singida vijijini','Singida mjini','Igung','Kaliua','Nzega','Sikonge','Uyui','Tabora mjini','Urambo','Handeni','Kilindi','Korogwe','Lushoto','Mkinga','Muheza','Pangani','Tanga mjini','Zanzibar kati','Zanzibar kusini','Zanzibar Mjini'];
    public $districtResults=array();

    protected $rules =[
        'region' => 'required|string',
        'space_for' => 'required',
        'region' => 'required',
        'district' => 'required|max:150',
        'negotiation' => 'required',
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

      //real-time validation for description field
      public function updated($description,$district)
      {
       $this->validateOnly($description);
       $pos=strlen($this->district);  //gets the position of the string
       if ($pos==0) 
       {
           $this->districtResults=array();
       }
       else
       {
          //search start when string is at position 2
           if ($pos>=3) {
            if (count($this->districtResults)>0) 
            {
                //empties the results if array had previous values
                $this->districtResults=array();
            }
            $loc=ucfirst($this->district); //converts the first character to uppercase
            foreach ($this->districts as $district) {
                $subdistrict=substr($district,0,$pos);
                if ($loc==$subdistrict) {
                    $this->districtResults[]=$district;
                  }
            }
           }
       }
     }
  
     public function setInfo($Info)
     {
         $this->district=$Info;
         $this->districtResults=array();
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
       $validatedData->negotiation=$this->negotiation;
       $validatedData->description=$this->description;
       $validatedData->price=$this->price;
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
