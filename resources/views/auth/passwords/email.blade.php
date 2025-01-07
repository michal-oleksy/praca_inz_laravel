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
                    <div class="card-header">{{ __('Resetuj hasło') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                        @endif

                        <form method="POST" action="{{ route('password.email') }}">
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

                            <div class="row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Wyślij link do resetowania hasła') }}
                                    </button>
                                </div>
                            </div>
                        </form>
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