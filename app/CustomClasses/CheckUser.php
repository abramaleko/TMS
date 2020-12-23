<?php
namespace App\CustomClasses;
use Illuminate\Support\Facades\Auth;

class CheckUser
{
    // checks if the user authenticated is a landlord if not is tenant
    function userIsLandlord()
    {
        $user=Auth::user()->account_type;
        if($user=='Landlord')
        {
            return true;
        }
    }
 
    // //checks if the rental owner id matches the the current user authenticated
    function LandlordIsOwner($id)
    {
        $currentUser=Auth::user()->id;
        if ($currentUser==$id) {
           return true;
        }
    }
}

?>