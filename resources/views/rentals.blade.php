<x-app-layout>
<x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __('Rentals') }}
    </h2>
</x-slot>

@if (count($rentals)>0)
@livewire('button-to-rentals')
@endif
    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                @livewire('rentals.registered-rentals', ['rentals' => $rentals])
            </div>
        </div>
    </div>
</x-app-layout>