<?php

use Illuminate\Support\Facades\Route;
use App\Models\Rental;
use App\Http\Livewire\Rentals\ViewRental;
use App\Http\Livewire\Rentals\RegisterTenant;
use App\Http\Livewire\Rentals\ContractInfo;
use App\Http\Livewire\Rentals\EditRental;
use App\Http\Livewire\Rentals\EditContract;
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
    $rentals=Rental::orderBy('id','desc')->get();
    return view('rentals')->with('rentals',$rentals);
})->name('rentals');
Route::middleware(['auth:sanctum', 'verified'])->get('/rental-register', function () {
    return view('registerRental');
})->name('register-rental');
Route::middleware(['auth:sanctum', 'verified'])->get('/rental/{rental_id}',ViewRental::class)->name('view-rental');
Route::middleware(['auth:sanctum', 'verified'])->get('/register_tenant/{id}', RegisterTenant::class)->name('register_tenant');
Route::middleware(['auth:sanctum', 'verified'])->get('/contract/{id}', ContractInfo::class)->name('view-contract');
Route::middleware(['auth:sanctum', 'verified'])->get('/edit/{rental_id}', EditRental::class)->name('edit-rental');
Route::middleware(['auth:sanctum', 'verified'])->get('/contract/edit/{id}', EditContract::class)->name('edit-contract');

