@extends('layouts.app2')
@section('content')
@livewire('rentals.search-rental')
@inject('user', 'App\CustomClasses\CheckUser')
@if ($user->userIsLandlord())
    @livewire('button-to-rentals')
@endif
@if (count($rentals)>0)
    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                @livewire('rentals.registered-rentals', ['rentals' => $rentals])
            </div>
        </div>
    </div> 
@endif
@endsection
