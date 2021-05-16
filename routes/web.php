<?php

use Illuminate\Support\Facades\Route;
use App\Http\Livewire\Rentals\ViewRental;
use App\Http\Livewire\Rentals\RegisterTenant;
use App\Http\Livewire\Rentals\RegisterRental;
use App\Http\Livewire\Rentals\ContractInfo;
use App\Http\Livewire\Rentals\EditRental;
use App\Http\Livewire\Rentals\EditContract;
use App\Http\Livewire\Rentals\SearchResult;
use App\Http\Livewire\Rentals\OwnedRentals;
use App\Http\Livewire\Rentals\Rentals;
use App\Http\Livewire\Bids\SentBids;
use App\Http\Livewire\Bids\ReceivedBids;
use App\Http\Livewire\Bids\ViewBid;
use App\Http\Livewire\Messages\MessageTemplate;



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
Route::middleware(['auth:sanctum', 'verified'])->get('/rentals',Rentals::class)->name('rentals');
Route::middleware(['auth:sanctum', 'verified','checkLandlord'])->get('/rental-register',RegisterRental::class)->name('register-rental');
Route::middleware(['auth:sanctum', 'verified'])->get('/rental/{rental_id}',ViewRental::class)->name('view-rental');
Route::middleware(['auth:sanctum', 'verified','checkLandlord'])->get('/ownedrentals',OwnedRentals::class)->name('owned-rentals');
Route::middleware(['auth:sanctum', 'verified'])->get('/rental/search/{location}_{range}',SearchResult::class)->name('search-results');
Route::middleware(['auth:sanctum', 'verified','checkLandlord'])->get('/register_tenant/{id}', RegisterTenant::class)->name('register_tenant');
Route::middleware(['auth:sanctum', 'verified'])->get('/contract/{id}', ContractInfo::class)->name('view-contract');
Route::middleware(['auth:sanctum', 'verified','checkLandlord'])->get('/edit/{rental_id}', EditRental::class)->name('edit-rental');
Route::middleware(['auth:sanctum', 'verified','checkLandlord'])->get('/contract/edit/{id}', EditContract::class)->name('edit-contract');
Route::middleware(['auth:sanctum', 'verified','checkTenant'])->get('/sentbids',SentBids::class)->name('tenant-bids');
Route::middleware(['auth:sanctum', 'verified','checkLandlord'])->get('/receivedbids',ReceivedBids::class)->name('Landlord-bids');
Route::middleware(['auth:sanctum', 'verified'])->get('/bid/info/{id}',ViewBid::class)->name('view-bid');
Route::middleware(['auth:sanctum', 'verified'])->get('/messages',MessageTemplate::class)->name('messages');
