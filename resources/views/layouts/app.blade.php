<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">


<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])

    <!-- Custom CSS for Dark Theme -->
    <style>
        body {
            background-color: #343a40; /* Dark background color */
            color: white; /* Light text color */
        }
        .card {
            background-color: #2c2f33;
        }
        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
        }
        .btn-primary:hover {
            background-color: #0056b3;
            border-color: #004085;
        }
        .table-striped tbody tr:nth-of-type(odd) {
            background-color: #3a3f44;
        }
        .nav-link {
            color: gold; /* Default text color */
        }

        .nav-link.active {
            color: white; /* Text color when selected */
        }
        .nav-link:hover {
            color: white; /* Text color on hover */
        }

    </style>
</head>
<body>
<div id="app">
    @auth
    <nav class="navbar navbar-expand-lg bg-body-tertiary sticky-top" data-bs-theme="dark">
        <div class="container-fluid">
            <a class="navbar-brand d-flex align-items-center" href="{{ url('/') }}">
                <img src="{{ asset('images/library.png') }}" alt="Logo" style="height: 30px; margin-right: 10px;">
                {{ config('app.name', 'Laravel') }}
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul  class="nav nav-underline" >
                    <li class="nav-item" role="presentation">
                        <a class="nav-link active" aria-current="page" href="{{ route('home')}}">Home</a>

                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="{{ route('book.index')}}" role="button" aria-expanded="false">Books Collection</a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="{{ route('book.index')}}">View All Book</a></li>
                            <li><a class="dropdown-item" href="{{ route('book.create')}}">Add New Book</a></li>
                            <li><a class="dropdown-item" href="{{ route('book.available')}}">View Available Book</a></li>
                            <li><a class="dropdown-item" href="{{ route('records.index')}}">View Borrowed Book</a></li>

                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="{{ route('member.index')}}" role="button" aria-expanded="false">Membership</a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="{{ route('member.index')}}">View All Member</a></li>
                            <li><a class="dropdown-item" href="{{ route('member.create')}}">Add New Member</a></li>

                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="{{ route('records.index')}}" role="button" aria-expanded="false">Borrowing Records</a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="{{ route('records.index')}}">Add New Record</a></li>
                        </ul>
                    </li>
                    @if (Auth::check() && Auth::user()->isAdmin())
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('Supervisor.register_vol') }}">Volunteer</a>
                        </li>
                    @endif
                </ul>

            <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
                <!-- Right Side Of Navbar -->
                <ul class="navbar-nav">
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
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }}
                            </a>

                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                @if (!Auth::check() || !Auth::user()->isAdmin())
                                    <a class="dropdown-item" href="{{ route('volunteer.showProfile', ['id' => Auth::user()->id]) }}">
                                        <i class="fas fa-user"></i> <!-- Font Awesome user icon -->
                                        View Profile
                                    </a>
                                @endif
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">
                                    <i class="fas fa-sign-out-alt"></i> <!-- Font Awesome logout icon -->
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    @endguest
                </ul>
            </div>
        </div>
        </div>
    </nav>
    @endauth
    <main class="py-4">
        @yield('content')
    </main>
</div>
</body>
</html>
