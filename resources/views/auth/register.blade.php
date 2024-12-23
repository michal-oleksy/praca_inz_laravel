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


<body>
    <div id="app">
        <nav class="navbar navbar-expand-sm bg-dark">
            <div class="collapse navbar-collapse justify-content-center">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link text-light" href="{{ url('/') }}">Strona główna</a>
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

        <div class="container  ">
            <div class="row ">
                <div class="col-lg-4 offset-lg-4  my-3">
                    <div class="card">
                    <div class="card-header">Zarejestruj się</div>
                        <div class="card-body">
                            <form method="POST" action="{{ route('register') }}">
                                @csrf
                               
                                    <label for="email">{{ __('Adres e-mail') }}</label>
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror

                               

                                <div class="form-group text-start">
                                    <label for="password">{{ __('Hasło') }}</label>
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror

                                </div>

                                <div class="form-group text-start">
                                    <label for="password-confirm">{{ __('Potwierdź hasło') }}</label>
                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                </div>

                                <div class="form-group text-start">
                                    <label for="name">{{ __('Imię') }}</label>
                                    <input name="firstName" id="firstName" type="text" class="form-control @error('firstName') is-invalid @enderror" value="{{ old('firstName') }}" required autocomplete="firstName" autofocus>

                                    @error('firstName')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror

                                </div>

                                <div class="form-group text-start">
                                    <label for="name">{{ __('Nazwisko') }}</label>
                                    <input name="lastName" id="lastName" type="text" class="form-control @error('lastName') is-invalid @enderror" value="{{ old('lastName') }}" required autocomplete="lastName" autofocus>

                                    @error('lastName')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror

                                </div>

                                <div class="form-group text-start">
                                    <label for="name">{{ __('Pseudonim') }}</label>
                                    <input name="nickName" id="nickName" type="text" class="form-control @error('nickName') is-invalid @enderror" value="{{ old('nickName') }}" required autocomplete="nickName" autofocus>

                                    @error('nickName')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror

                                </div>

                                <div class="form-group text-start">
                                    <label for="gender">{{ __('Płeć') }}</label>


                                    <select id="gender" class="form-control" name="gender" required>
                                        <option value="1">Mężczyzna</value>
                                        <option value="2">Kobieta</value>
                                        <option value="3">Inna/Nie chcę podawać</value>
                                    </select>

                                </div>

                                <div class="d-grid gap-2 my-2">
                                    <div>
                                        <button type="submit" class="btn btn-primary btn-block">
                                            {{ __('Zarejestruj') }}
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </div>
</body>

</html>