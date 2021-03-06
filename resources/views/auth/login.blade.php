<x-guest-layout>
    <x-jet-authentication-card>
        <x-slot name="logo">
            <x-jet-authentication-card-logo />
        </x-slot>

        <x-jet-validation-errors class="mb-4" />

        @if (session('status'))
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ session('status') }}
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div>
                <x-jet-label for="email" value="{{ __('Email') }}" />
                <x-jet-input id="email" class="block mt-1 w-full" type="email" placeholder="user@gmail.com" name="email" :value="old('email')" required autofocus />
            </div>

            <div class="mt-4">
                <x-jet-label for="password" value="{{ __('Password') }}" />
                <x-jet-input id="password" class="block mt-1 w-full" type="password" placeholder="**********"  name="password" required autocomplete="current-password" />
            </div>

            <div class="block mt-4">
                <label for="remember_me" class="flex items-center">
                    <input id="remember_me" type="checkbox" class="form-checkbox" name="remember">
                    <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                </label>
            </div>

            <div class="flex items-center justify-start my-7">

                <x-jet-button class="py-3 px-6" >
                    {{ __('Log in') }}
                </x-jet-button>

                @if (Route::has('password.request'))
                <a class="ml-4 underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('password.request') }}">
                    {{ __('Forgot your password?') }}
                </a>
            @endif

            </div>

            <div>
                <h1 class="font-black text-lg text-center text-gray-800">OR</h1>
                <div class="py-4 flex justify-center">
                 <a href="{{route('google-signin')}}" class="border-2 border-gray-300 hover:bg-blue-500 text-black hover:bg-transparent font-semibold hover:text-white border-transparent px-7 py-3"><img src="{{asset('icons/google.png')}}" alt="google" class="h-8 px-2 inline"> Sign in with Google</a>
             </div>

        </form>
    </x-jet-authentication-card>
</x-guest-layout>
