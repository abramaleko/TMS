<?php

use Illuminate\Support\Facades\Route;
use App\Models\Rental;
use App\Http\Livewire\Rentals\ViewRental;
use Illuminate\Support\Facades\Auth;



/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
Route::middleware(['auth:sanctum', 'verified'])->get('/rentals', function () {
    $rentals=Rental::where('landlord_id',Auth::user()->id)->orderBy('id','desc')->get();
    return view('rentals')->with('rentals',$rentals);
})->name('rentals');
Route::middleware(['auth:sanctum', 'verified'])->get('/rental-register', function () {
    return view('registerRental');
})->name('register-rental');
Route::middleware(['auth:sanctum', 'verified'])->get('/rental/{rental_id}',ViewRental::class)->name('view-rental');

