<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Czytaj z nami</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('css/style_index.css')}}">
    <link rel="shortcut icon" href="{{ asset('/images/favicon1.jpg') }}">

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

        <div class="container">
            <table class="table table-bordered table-hover table-sm w-autoalign-middle">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Autor</th>
                        <th scope="col">Tytuł</th>
                        <th scope="col">Gatunek</th>
                        <th scope="col">Data pierwszego wydanian</th>
                        <th scope="col">Ilość stron</th>
                        <th scope="col">Wydawnictwo</th>
                    </tr>
                </thead>

                @foreach ($books as $book)

                <tr>
                    <th scope="row">{{ $book->id; }}</th>
                    <td>
                        <p>{{ $book->author;}}</p>
                    </td>
                    <td>
                        <a href="{{ route('books.index') }}">
                            <p>{{ $book->title;}}</p>
                        </a>
                    </td>
                    <td>
                        <p>{{ $book->genre; }}</p>
                    </td>
                    <td>
                        <p>{{ $book->datePublished; }}</p>
                    </td>
                    <td>
                        <p>{{ $book->pages; }}</p>
                    </td>
                    <td>
                        <p>{{ $book->publisher; }}</p>
                    </td>
                </tr>

                @endforeach
            </table>
        </div>


    </main>







</body>

</html>