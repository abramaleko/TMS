<x-guest-layout>
    <style>
        * {box-sizing: border-box;}
        body {font-family: Verdana, sans-serif;}
        .mySlides {display: none;}
        img {vertical-align: middle;}

        /* Slideshow container */
        .slideshow-container {
          max-width: 1000px;
          position: relative;
        }


        /* Fading animation */
        .fade {
          -webkit-animation-name: fade;
          -webkit-animation-duration: 1.5s;
          animation-name: fade;
          animation-duration: 1.5s;
        }

        @-webkit-keyframes fade {
          from {opacity: .4}
          to {opacity: 1}
        }

        @keyframes fade {
          from {opacity: .4}
          to {opacity: 1}
        }
        </style>

    <div class="md:py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-gray-100 overflow-hidden shadow-xl sm:rounded-lg">
                <div class="lg:grid lg:grid-cols-2 gap-4">
                        <!-- Slideshow container -->
                        <div class="slideshow-container hidden lg:block">

                            <!-- Full-width images -->
                            <div class="mySlides fade">
                             <img src="{{asset('images/real3.webp')}}" class="w-full h-full" alt="Rental" style="height: 32.5rem;">
                            </div>
                            <div class="mySlides fade">
                            <img src="{{asset('images/real1.jpg')}}" class="w-full" alt="Rental" style="height: 32.5rem;">
                            </div>

                            <div class="mySlides fade">
                             <img src="{{asset('images/real5.jpg')}}" class="w-full h-full" alt="Rental" style="height: 32.5rem;">
                            </div>

                            <div class="mySlides fade">
                             <img src="{{asset('images/real4.jpg')}}" class="w-full h-full" alt="Rental" style="height: 32.5rem;">
                            </div>
                        </div>
                    <div class="px-5">
                        <div class="my-2">
                            <a href="/" class="text-4xl text-gray-700" style="font-family: 'Pacifico', cursive;">
                                <img src="{{asset('images/logo.png')}}" alt="TMS"  style="height: 55px !important" class="inline ml-6 lg:mr-4">
                                Rental
                            </a>
                        </div>


                        <x-jet-validation-errors class="mb-4" />

                        <div class="md:mt-9">
                            <form method="POST" action="{{ route('register') }}">
                                @csrf

                                <div class="mt-4">
                                    <x-jet-label for="name" value="{{ __('Full name') }}" />
                                    <x-jet-input id="name" class="block mt-1 w-full" placeholder="i.e Abraham Maleko" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                                </div>

                                <div class="lg:grid lg:grid-cols-2 gap-3">
                                    <div class="mt-4">
                                        <x-jet-label for="email" value="{{ __('Email') }}" />
                                        <x-jet-input id="email" class="block mt-1 w-full" type="email" placeholder="user@gmail.com" name="email" :value="old('email')" required />
                                    </div>

                                    <div class="mt-4">
                                        <x-jet-label for="account_type" value="{{ __('Account type') }}" />
                                        <select id="country" class="block mt-1 w-full form-select focus:outline-none rounded-md shadow-sm" name="account_type">
                                            <option>Landlord</option>
                                            <option>Tenant</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="lg:grid lg:grid-cols-2 gap-3">
                                <div class="mt-4">
                                    <x-jet-label for="password" value="{{ __('Password') }}" />
                                    <x-jet-input id="password" class="block mt-1 w-full" type="password" name="password" placeholder="**********" required autocomplete="new-password" />
                                </div>

                                <div class="mt-4">
                                    <x-jet-label for="password_confirmation" value="{{ __('Confirm Password') }}" />
                                    <x-jet-input id="password_confirmation" class="block mt-1 w-full" type="password" placeholder="**********"  name="password_confirmation" required autocomplete="new-password" />
                                </div>
                                </div>


                                <div class="flex items-center justify-start md:mt-6  my-7">

                                    <x-jet-button class="mr-6 py-3">
                                        {{ __('Register') }}
                                    </x-jet-button>

                                    <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                                        {{ __('Already registered?') }}
                                    </a>

                                </div>
                            </form>
                        </div>
                       </div>
                </div>
            </div>
        </div>
        <script>
            var slideIndex = 0;
            showSlides();

            function showSlides() {
            var i;
            var slides = document.getElementsByClassName("mySlides");
            for (i = 0; i < slides.length; i++) {
                slides[i].style.display = "none";
            }
            slideIndex++;
            if (slideIndex > slides.length) {slideIndex = 1}
            slides[slideIndex-1].style.display = "block";
            setTimeout(showSlides, 4000); // Change image every 2 seconds
            }
        </script>
</x-guest-layout>
