<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

class GoogleSignInController extends Controller
{
    //

    public function googleredirect()
    {
        return Socialite::driver('google')->redirect();

    }

    public function callback()
    {
        $user = Socialite::driver('google')->user();
          //checks whether the user is already in the database if not it regiters then
          $user=User::firstOrCreate([
              'email' => $user->email,
          ],
        [
          'name' => $user->name,
           'password' => Hash::make(Str::random(24)),
        ]);

        Auth::login($user,true);

         return redirect()->route('dashboard');
    }
}
