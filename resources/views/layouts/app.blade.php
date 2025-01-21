<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Czytaj z nami</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('css/style_index.css')}}">
    <link rel="shortcut icon" href="{{ asset('/images/favicon1.jpg') }}">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.4.0/fullcalendar.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.4.0/fullcalendar.min.js"></script>

    <link rel="stylesheet" href="{{asset('css/cke_style.css')}}">
    <link rel="stylesheet" href="https://cdn.ckeditor.com/ckeditor5/44.1.0/ckeditor5.css" crossorigin>


    <meta name="csrf-token" content="{{ csrf_token() }}" />
    
    <!-- Styles / Scripts -->
    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @else
    @endif
</head>

<body class="d-flex flex-column min-vh-100">
    <div class="snowflakes" aria-hidden="true">
        <div class="snowflake">
            <div class="inner">&#8226;</div>
        </div>
        <div class="snowflake">
            <div class="inner">&#8226;</div>
        </div>
        <div class="snowflake">
            <div class="inner">&#8226;</div>
        </div>
        <div class="snowflake">
            <div class="inner">&#8226;</div>
        </div>
        <div class="snowflake">
            <div class="inner">&#8226;</div>
        </div>
        <div class="snowflake">
            <div class="inner">&#8226;</div>
        </div>
        <div class="snowflake">
            <div class="inner">&#8226;</div>
        </div>
        <div class="snowflake">
            <div class="inner">&#8226;</div>
        </div>
        <div class="snowflake">
            <div class="inner">&#8226;</div>
        </div>
        <div class="snowflake">
            <div class="inner">&#8226;</div>
        </div>
        <div class="snowflake">
            <div class="inner">&#8226;</div>
        </div>
        <div class="snowflake">
            <div class="inner">&#8226;</div>
        </div>
    </div>

    <nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">
        <div class="collapse navbar-collapse justify-content-center">
            <ul class="navbar-nav mr-auto">

                <li class="nav-item">
                    <a class="nav-link text-light" href="{{ url('/') }}">Strona główna</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link text-light" href="{{ route('books.index') }}">Książki</a>
                </li>
                @if (Route::has('login'))


                @auth

                <li class="nav-item">
                    <a class="nav-link text-light" href="{{ route('home') }}">Twój profil</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link text-light" href="{{ url('calendar') }}">Twój kalendarz</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-light" href="{{ route('userList.index') }}">Użytkownicy</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link text-light" href="{{ route('friends.index') }}">Twoi znajomi</a>
                </li>


                <li class="nav-item dropdown ">
                    <a id="navbarDropdown ms-auto" class="nav-link dropdown-toggle text-light" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        Zalogowany użytkownik: {{ Auth::user()->firstName }}
                    </a>

                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                                                document.getElementById('logout-form').submit();">
                            {{ __('Wyloguj się') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </div>
                </li>

                @else
                <li class="nav-item">
                    <a class="nav-link text-light" href="{{ route('login') }}">Zaloguj</a>
                </li>

                @if (Route::has('register'))
                <li class="nav-item">
                    <a class="nav-link text-light" href="{{ route('register') }}">Zarejestruj</a>
                </li>
                @endif
                @endauth
            </ul>
        </div>
    </nav>
    @endif
    <br><br>

    <main>
        @yield('content')
    </main>



    <footer class="footer mt-auto py-3">
        <div class="container">
            <span class="text-body-secondary"><strong>Czytajznami.pl 2025</strong></span>
        </div>
    </footer>



    <script src="https://cdn.ckeditor.com/ckeditor5/44.1.0/ckeditor5.umd.js" crossorigin></script>
    <script src="{{ asset('js/ckeditor.js') }}"></script>
</body>

</html>