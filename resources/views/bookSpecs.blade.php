@extends('layouts.app')

@section('content')


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
    <div class="card my-3">
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



            </div>
            <div class="row">

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










@endsection