<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ ('Doggy') }}</title>
    <link rel="icon" type="image/png" href="images/logo.png">

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"
          integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <!--fontawesome link-->
    <script src="https://kit.fontawesome.com/5998f4d681.js" crossorigin="anonymous"></script>
    <!-- intl Tel Input -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/css/intlTelInput.css"/>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/intlTelInput.min.js"></script>


    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    <style>
        body {
            font-family: 'Nunito', sans-serif;
        }
    </style>
</head>
<body>
<div id="app">
    <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
        <div class="container-fluid">
            <div class="row">
                <a class="col-3 navbar-brand" href="{{ url('/') }}"><img src="{{ asset('images/doggy.png') }}"
                                                                         width=70%></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                        data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>


                <!-- Left Side Of Navbar -->

                <!-- Right Side Of Navbar -->
                <ul class="col-9 navbar-nav ms-auto">
                    <!-- Authentication Links -->
                    @guest
                        @if (Route::has('login'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                        @endif

                        @if (Route::has('register'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                            </li>
                        @endif
                    @else
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('home') }}">{{ __('Home') }}</a>
                        </li>

                        @if (Auth::user())
                            <li class="nav-item">
                                <a class="nav-link" href="{{ url('/addDogForAdoption') }}">{{ __('Add a dog for adoption') }}</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ url('/myDogs') }}">{{ __('My dogs') }}</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" href="{{ url('/dogsBreeds') }}">{{ __('Dogs breeds') }}</a>
                            </li>
                        @endif
                        <li class="nav-item dropdown">
                            <div class="dropdown">
                                <button class="btn dropdown-toggle shadow-none" id="dropdownMenuButton" type="button"
                                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fa-regular fa-paper-plane"></i>My Requests
                                </button>

                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                    <a class="dropdown-item" href="{{url('received_requests')}}"> My Received Requests</a>
                                    <a class="dropdown-item" href="{{url('sent_requests')}}">My Sent Requests
                                    </a>
                                </div>
                            </div>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>

                        </li>
                        <li class="nav-item dropdown">
                            <div class="dropdown">
                                <button class="btn dropdown-toggle shadow-none" id="dropdownMenuButton" type="button"
                                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fa-regular fa-user"></i> {{ Auth::user()->name }}
                                </button>

                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                    <a class="dropdown-item" href="{{ url('/profile') }}"><i
                                            class="fa-solid fa-user"></i> {{ __('Profile') }}</a>
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();">
                                        <i class="fa-solid fa-right-from-bracket"></i>
                                        {{ __('Logout') }}
                                    </a>
                                </div>
                            </div>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>

                        </li>


                    @endguest
                </ul>
            </div>
    </nav>

    <main class="py-4">
        @yield('content')
    </main>
</div>
<div class="footer">
    <div class="container-fluid">
        <div class="row">
            <div class="col-5">
                <h3>About Us</h3>
                <p>Whether it's a loving adoptive home or simply a better chance on the streets, we're
                    fighting to give stray animals a better life in Tunisia. Despite its smart, social personality,
                    Tunisia's native dog breed, is misunderstood as wild and dangerous, resulting in the local
                    population being highly reluctant to adopt these animals.</p>
            </div>
            <div class="col">
                <h3>What We Do</h3>
                <ul>
                    <li>Adopt</li>
                    <li>Free consultation</li>
                    <li>dogs' breeds</li>
                </ul>
            </div>
            <div class="col">
                <h3>Follow Us</h3>
                <ul>
                    <li>Facebook</li>
                    <li>Twitter</li>
                    <li>Instagram</li>
                    <li>YouTube</li>
                </ul>
            </div>
            <div class="col">
                <h3>Contact Us</h3>
                <ul>
                    <li><a href="mailto:insaf.chaibi@isimg.tn">insaf.chaibi@isimg.tn</a></li>
                    <li><a href="tel:+216 20 248 520">+216 20 248 520</a></li>
                </ul>
            </div>
        </div>
        <hr>
        <p class="copyright">Developed by Insaf - 2023</p>
    </div>
</div>
</body>
<!-- Scripts -->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
        crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
        crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
        crossorigin="anonymous"></script>

</html>
