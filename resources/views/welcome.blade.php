<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Czytaj z nami</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('css/style_index.css')}}">
    <link rel="shortcut icon" href="{{ asset('/images/favicon1.jpg') }}">
    <!-- Fonts -->
    <!-- <link rel="preconnect" href="https://fonts.bunny.net"> -->
    <!-- <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" /> -->

    <!-- Styles / Scripts -->
    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @else




    @endif
</head>

<body>

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
        <div class="jumbotron">
            <div class="container">
                <h1 class="display-3">Zmotywuj się do czytania już teraz!</h1><br>
                <p class="display-5">Czytaj z nami.pl - jest to serwis zachęcający do czytania i wspierający czytelników. Śledź swoje dzienne postępy, oceniaj książki i dziel się postępami z innymi członkami społeczności.</p>
            </div>
        </div>
        <div class="container-fluid">
            <div class="row text-center">
                <div class="col">
                    <h2>Uzupełniaj i śledź swoje postępy</h2>
                    <img src="{{asset('images/calendar-icon.JPG')}}">
                </div>
                <div class="col">
                    <h2>Oceniaj i recenzuj książki</h2>
                    <img src="{{asset('images/rating.png')}}">
                </div>
                <div class="col">
                    <h2>Dodawaj i obserwuj znajomych</h2>
                    <img src="{{asset('images/friends.JPG')}}">
                </div>
            </div>
            <div>

    </main>







</body>

</html>