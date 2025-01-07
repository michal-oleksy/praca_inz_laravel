<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('css/style_index.css')}}">

    <!-- Scripts -->
    <!-- @vite(['resources/sass/app.scss', 'resources/js/app.js']) -->
    @vite(['resources/js/app.js'])
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
    <div id="app">
        <nav class="navbar navbar-expand-sm bg-dark">
            <div class="collapse navbar-collapse justify-content-center">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link text-light" href="{{ url('/') }}">Strona główna</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-light" href="{{ route('books.index') }}">Książki</a>
                    </li>
                    @guest
                    @if (Route::has('login'))
                    <li class="nav-item">
                        <a class="nav-link text-light" href="{{ route('login') }}">{{ __('Zaloguj') }}</a>
                    </li>
                    @endif

                    @if (Route::has('register'))
                    <li class="nav-item">
                        <a class="nav-link text-light" href="{{ route('register') }}">{{ __('Zarejestruj') }}</a>
                    </li>
                    @endif
                    @else

                </ul>
                @endguest
            </div>
        </nav>
        <div class="container my-3">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">Zaloguj się</div>
                        <!-- // WYRZUCIĆ CARD HEADER ZEBY BORDER WYGLADAL JAK W REGISTERZE -->
                        <div class="card-body">
                            <form method="POST" action="{{ route('login') }}">
                                @csrf

                                <div class="row mb-3">
                                    <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('E-mail:') }}</label>

                                    <div class="col-md-6">
                                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                        @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Hasło:') }}</label>

                                    <div class="col-md-6">
                                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                        @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <div class="col-md-6 offset-md-4">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                            <label class="form-check-label" for="remember">
                                                {{ __('Zapamiętaj mnie') }}
                                            </label>
                                        </div>
                                    </div>
                                </div>

                                <div class="row mb-0">
                                    <div class="col-md-8 offset-md-4">
                                        <button type="submit" class="btn btn-primary">
                                            {{ __('Zaloguj się') }}
                                        </button>

                                        @if (Route::has('password.request'))
                                        <a class="btn btn-link" href="{{ route('password.request') }}">
                                            {{ __('Zapomniałeś hasła?') }}
                                        </a>
                                        @endif
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <footer style="background-color: rgb(131,43,33); border-top: 1px solid black;" class="footer mt-auto py-3">
        <div class="container">
            <span class="text-body-secondary"><strong>Czytajznami.pl 2025</strong></span>
        </div>
    </footer>
</body>



</html>