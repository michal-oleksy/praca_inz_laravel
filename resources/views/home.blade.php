<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="{{ asset('/images/favicon1.jpg') }}">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Czytaj z nami</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('css/style_index.css')}}">

    <!-- Scripts -->
    <!-- @vite(['resources/sass/app.scss', 'resources/js/app.js']) -->
    @vite(['resources/js/app.js'])
</head>


<body>
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

                    <li class="nav-item">
                        <a class="nav-link text-light" href="{{ route('home') }}">Twój profil</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link text-light" href="{{ route('calendar.index') }}">Twój kalendarz</a>
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
                </ul>

            </div>
        </nav>

        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8 my-3">
                    <div class="card">
                        <div class="card-header">
                            <h5>Twoje dane</h5>
                        </div>
                        <div class="card-body">
                            @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                            @endif

                            {{ __('Jesteś zalogowany! Witamy!') }}
                            Twoje dane:<br>
                            @foreach($info as $data)
                            Imię: {{$data->firstName}}<br>
                            Nazwisko: {{$data->lastName}}<br>
                            Email: {{$data->email}}<br>
                            Pseudonim: {{$data->nickName}}<br>
                            @endforeach
                        </div>
                    </div>

                    <div class="card my-4">
                        <div class="card-header">
                            <h5>Twoje cele/Edytuj cele</h5>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-auto">
                                    @isset($goals)
                                    @foreach($goals as $data)
                                    Twój cel roczny: {{ $data->yearGoal }} <br>
                                    Twój cel miesięczny: {{ $data->monthGoal }} <br>
                                    Twój cel tygodniowy: {{ $data->weekGoal }} <br>
                                    Twój cel dzienny: {{ $data->dayGoal }} <br>
                                    @endforeach
                                    @else
                                    Twój cel roczny: brak <br>
                                    Twój cel miesięczny: brak <br>
                                    Twój cel tygodniowy: brak <br>
                                    Twój cel dzienny: brak <br>
                                    @endisset
                                </div>



                                <div class="col-auto border border-secondary">
                                    <form action="{{ route('home.edit') }}" method="post">
                                        @csrf
                                        Roczny: <input oninput="this.value = !!this.value && Math.abs(this.value) >= 0 ? Math.abs(this.value) : null" style="width:100px;" class="my-1" type="number" name="yearGoal" id="yearGoal"> <br>
                                        Miesięczny: <input oninput="this.value = !!this.value && Math.abs(this.value) >= 0 ? Math.abs(this.value) : null" style="width:100px;" class="my-1" type="number" name="monthGoal" id="monthGoal"> <br>
                                        Tygodniowy: <input oninput="this.value = !!this.value && Math.abs(this.value) >= 0 ? Math.abs(this.value) : null" style="width:100px;" class="my-1" type="number" name="weekGoal" id="weekGoal"> <br>
                                        Dzienny: <input oninput="this.value = !!this.value && Math.abs(this.value) >= 0 ? Math.abs(this.value) : null" style="width:100px;" class="my-1" type="number" name="dayGoal" id="dayGoal"> <br>
                                        <p>Pamiętaj, następujące po sobie <br>cele muszą być coraz mniejsze.</p>
                                        <button type="submit" class="btn btn-primary my-2" id="saveBtn">Edytuj</button>

                                    </form>
                                </div>
                            </div>

                        </div>

                    </div>
                    <div class="card">
                        <div class="card-header">
                            <h5>Twoje książki</h5>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-auto">
                                    <strong>Książki przeczytane</strong><br>
                                    @foreach($bookList1 as $book)
                                        {{ $book->title }}
                                        {{ $book->status }} <br>
                                    @endforeach

                                </div>

                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-auto">
                                <strong>Książki czytane obecnie</strong><br>
                                    @foreach($bookList2 as $book)
                                        {{ $book->title }}
                                        {{ $book->status }} <br>
                                    @endforeach
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-auto">
                                <strong>Książki do przeczytania</strong><br>
                                    @foreach($bookList3 as $book)
                                        {{ $book->title }}
                                        {{ $book->status }} <br>
                                    @endforeach
                                </div>
                            </div>
                            <hr>
                        </div>

                    </div>


                </div>
            </div>
        </div>
    </div>
    </div>


</body>

</html>