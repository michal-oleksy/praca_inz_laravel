<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <title>Czytaj z nami</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('css/style_index.css')}}">

    <link rel="stylesheet" href="https://cdn.ckeditor.com/ckeditor5/44.1.0/ckeditor5.css" />
    <script src="https://cdn.ckeditor.com/ckeditor5/44.1.0/ckeditor5.umd.js"></script>

    <script src="https://cdn.ckeditor.com/ckeditor5/44.1.0/translations/pl.umd.js"></script>

    <link rel="shortcut icon" href="{{ asset('/images/favicon1.jpg') }}">



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


            <div class="card my-4">
                <div class="card-header">
                    <h5>Informacje o książce</h5>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-auto">
                            <img style="width: 200px;" src="{{asset('images/frontPages/'.$bookInfo['id'].'_okladka.jpg')}}"><br>
                            Tytuł: {{ $bookInfo['title'] }} <br>
                            Autor: {{ $bookInfo['author'] }} <br>
                            Gatnek: {{ $bookInfo['genre'] }} <br>
                            Data opublikowania: {{ $bookInfo['datePublished'] }} <br>
                            Strony: {{ $bookInfo['pages'] }} <br>
                            Wydawnictwo: {{ $bookInfo['publisher'] }}
                        </div>



                        <div class="col-auto">
                            Średnia ocena użytkowników: {{ round($bookRate, 2) }} <br>
                            @if(round($bookRate, 2)>=4.75)
                            <img style="width:320px;" src="{{asset('images/stars/5star.jpg')}}">
                            @elseif(round($bookRate, 2)>=4.5)
                            <img style="width:320px;" src="{{asset('images/stars/4.5star.jpg')}}">
                            @elseif(round($bookRate, 2)>=4)
                            <img style="width:320px;" src="{{asset('images/stars/4star.jpg')}}">
                            @elseif(round($bookRate, 2)>=3.5)
                            <img style="width:320px; " src="{{asset('images/stars/3.5star.jpg')}}">
                            @elseif(round($bookRate, 2)>=3)
                            <img style="width:320px; " src="{{asset('images/stars/3star.jpg')}}">
                            @elseif(round($bookRate, 2)>=2.5)
                            <img style="width:320px;" src="{{asset('images/stars/2.5star.jpg')}}">
                            @elseif(round($bookRate, 2)>=2)
                            <img style="width:320px;" src="{{asset('images/stars/2star.jpg')}}">
                            @elseif(round($bookRate, 2)>=1.5)
                            <img style="width:320px;" src="{{asset('images/stars/1.5star.jpg')}}">
                            @elseif(round($bookRate, 2)>=1)
                            <img style="width:320px;" src="{{asset('images/stars/1star.jpg')}}">
                            @endif
                            @auth
                            @isset($userRate->rate)
                            Twoja ocena: {{$userRate->rate}}
                            <hr>
                            @else
                            Nie oceniłeś jeszcze tej książki.
                            <hr>
                            @endisset
                            <form action="{{ route('bookSpecs.addRate', ['bookID' => $bookInfo['id']] ) }}" method="post">
                                Twoja ocena od 1 do 5:<br>
                                @csrf
                                <input type="radio" name="rate" id="rate1" value="1">
                                <label for="rate1">1</label><br>

                                <input type="radio" name="rate" id="rate2" value="2">
                                <label for="rate2">2</label><br>

                                <input type="radio" name="rate" id="rate3" value="3">
                                <label for="rate3">3</label><br>

                                <input type="radio" name="rate" id="rate4" value="4">
                                <label for="rate4">4</label><br>

                                <input type="radio" name="rate" id="rate5" value="5">
                                <label for="rate5">5</label><br>


                                @error('rate')
                                <div class="alert alert-danger my-2">
                                    {{ $message }}
                                </div>
                                @enderror


                                <button type="submit" class="btn btn-primary my-2" id="saveBtn">Dodaj ocenę</button>
                            </form>
                            @endauth

                            @guest
                            Nie jesteś zalogowany/zalogowana. Zaloguj się, aby ocenić lub zrecenzować książkę.
                            <hr>
                            @endguest


                        </div>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-header">
                    <h5>Recenzje książki</h5>
                </div>
                <div class="card-body">
                    <div class="row">


                        <div class="col-auto">

                            @foreach($bookReviews as $review)
                            Recenzję utworzono:
                            {{ $review->updated_at  }}<br>
                            Imię użytkownika: {{ $review->firstName }}<br>
                            @isset($review->rate)
                            Ocena od 1 do 5 użytkownika: {{ $review->rate }}<br>
                            @else
                            Użytkownik nie ocenił tej książki.<br>
                            @endisset

                            {!! $review->review !!}

                            <hr>
                            @endforeach
                        </div>


                        <div class="col-auto w-50">
                            @auth

                            <form action="{{ route('bookSpecs.addReview', ['bookID' => $bookInfo['id']] ) }}" method="post">

                                @csrf
                                <label for="review">
                                    <h5>Dodaj recenzję: </h5>
                                </label>

                                <textarea required name="review" id="editor">
                                {{ old('review') }}
                                </textarea>
                                @error('review')
                                <div class="alert alert-danger my-2">
                                    {{ $message }}
                                </div>
                                @enderror
                                <button type="submit" class="btn btn-primary my-2" id="saveBtn">Dodaj recenzję</button>
                            </form>
                            <br>

                            @endauth
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
        </div>
    </main>
    <script>
        const {
            ClassicEditor,
            Essentials,
            Bold,
            Italic,
            Font,
            Paragraph,
            SpecialCharacters,
            SpecialCharactersEssentials
        } = CKEDITOR;


        ClassicEditor
            .create(document.querySelector('#editor'), {
                licenseKey: 'eyJhbGciOiJFUzI1NiJ9.eyJleHAiOjE3MzY3MjYzOTksImp0aSI6IjQ5MjY5YmUzLTI3MzAtNDE0MC05M2ZlLTIxZTkwY2QxMTM3NyIsInVzYWdlRW5kcG9pbnQiOiJodHRwczovL3Byb3h5LWV2ZW50LmNrZWRpdG9yLmNvbSIsImRpc3RyaWJ1dGlvbkNoYW5uZWwiOlsiY2xvdWQiLCJkcnVwYWwiLCJzaCJdLCJ3aGl0ZUxhYmVsIjp0cnVlLCJsaWNlbnNlVHlwZSI6InRyaWFsIiwiZmVhdHVyZXMiOlsiKiJdLCJ2YyI6ImRmMjU3M2VkIn0.4j83IN3OnlFK6qplsbNRracJvpa4_Yum58Y85Ln8tgF3S4ENU1pCLh8dxFv53gZDt49F5AfYbuZYsQGiIYctUw',
                plugins: [Essentials, Bold, Italic, Font, Paragraph, SpecialCharacters, SpecialCharactersEssentials, ],
                toolbar: [
                    'undo', 'redo', '|', 'bold', 'italic', 'specialCharacters', '|',
                    'fontSize', 'fontFamily', 'fontColor', 'fontBackgroundColor', '|'
                ],
            })
            .catch(error => {
                console.error(error);
            });
    </script>
    <footer style="background-color: rgb(131,43,33); border-top: 1px solid black;" class="footer mt-auto py-3">
        <div class="container">
            <span class="text-body-secondary"><strong>Czytajznami.pl 2025</strong></span>
        </div>
    </footer>


</body>

</html>