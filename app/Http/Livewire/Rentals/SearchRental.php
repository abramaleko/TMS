<?php

namespace App\Http\Livewire\Rentals;

use Livewire\Component;

class SearchRental extends Component
{
    public $location,$districtResults=array(),$regionResults=array();
    public $districts=['Meru','Arusha mjini','Arusha vijijini','Karatu','Longido','Monduli','Ngorongoro','Ilala','Kinondoni','Temeke','Bahi','Chamwino','Chemba','Dodoma mjini','Kondoa','Kongwa','Mpwapwa','Bukombe','Chato','Geita','Mbogwe','Nyanghwale','Iringa vijijini','Iringa mjini','Kilolo','Mufindi','Mafinga mjini','Biharamulo','Bukoba vijijini','Bukoba mjini','Karagwe','Kyerwa','Misenyi','Muleba','Ngara','Mlele','Mpanda mjini','Mpanda vijijini','Buhigwe','Kakonko','Kasulu mjini','Kibondo','Kigoma mjini','Kigoma ujiji','Uvinza','Hai','Moshi mjini','Moshi vijijini','Mwanga','Rombo','Same','Siha','Kilwa','Lindi vijijini','Lindi mjini','Liwale','Nachingwea','Ruangwa','Babati Mjini','Babati vijijini','Hanang','Kiteto','Mbulu','Simanjiro','Bunda','Butiama','Musoma mjini','Musoma vijijini','Roray','Serengeti','Tarime','Chunya','Ileje','Kyela','Mbarali','Mbeya vijijini','Mbeya mjini','Mbozi','Momba','Rungwe','Tunduma','Gairo','Kilombero','Kilosa','Morogoro mjini','Morogoro vijijini','Mvomero','Ulanga','Masasi mjini','Masasi vijijini','Mtwara vijijini','Mtwara mjini','Nanyumbu','Newala','Tandahimba','Ilemela','Nyamagana','Sengerema','Kwimba','Magu','Misungwi','Ukerewe','Ludewa','Makambako','Makete','Njombe vijijini','Njombe mjini','Wanging\'ombe','Wete','Micheweni','Chake chake','Mkoani','Bagamoyo','Kibaha mjini','Kibaha vijijini','Kisarawe','Mafia','Mkuranga','Rufiji','Kalambo','Nkasi','Sumbawanga vijijini','Sumbawanga mjini','Mbinga','Namtumbo','Nyasa','Songea vijijini','Songea mjini','Tunduru','Kahama mjini','Kahama vijijini','Kishapu','Shinyanga vijijini','Shinyanga mjini','Bariadi','Busega','Itilima','Maswa','Meatu','Iramba','Manyoni','Singida vijijini','Singida mjini','Igung','Kaliua','Nzega','Sikonge','Uyui','Tabora mjini','Urambo','Handeni','Kilindi','Korogwe','Lushoto','Mkinga','Muheza','Pangani','Tanga mjini','Zanzibar kati','Zanzibar kusini','Zanzibar Mjini'];
    public $regions=['Arusha','Dar es Salaam','Dodoma','Geita','Iringa','Kagera','Katavi','Kigoma','Kilimanjaro','Manyara','Mara','Mbeya','Morogoro','Mtwara','Mwanza','Njombe','Pemba North','Pemba South','Pwani','Rukwa','Ruvuma','Shinyanga','Simiyu','Singida','Tabora','Tanga','Zanzibar North','Zanzibar South and Central','Zanzibar West'];

    public function updated($location)
    { 
        $pos=strlen($this->location);  //gets the position of the string
         //if input is null then array is emptied
        if ($pos==0) 
        {
            $this->districtResults=array();
            $this->regionResults=array();
        } else 
        {
            //search start when string is at position 2
           if ($pos>=2) {
            if (count($this->districtResults)>0 || count($this->regionResults)) 
            {
                //empties the results if array had previous values
                $this->districtResults=array();
                $this->regionResults=array();
            }
            $loc=ucfirst($this->location); //converts the first character to uppercase
            foreach ($this->regions as $region) {
                $subregion=substr($region,0,$pos);
                if ($loc==$subregion) {
                    $this->regionResults[]=$region;
                  }
            }
            foreach ($this->districts as $district) 
            {
                //compares the strings based on their positions
                $subdistrict=substr($district,0,$pos);
                if ($loc==$subdistrict) {
                  $this->districtResults[]=$district;
                }
            }
           }
        }
    }

    public function setInfo($location)
    {
        $this->location=$location;
        $this->districtResults=array();
        $this->regionResults=array();

    }

    public function render()
    {
        return view('livewire.rentals.search-rental');
    }
}
