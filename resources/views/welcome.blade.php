@extends('layouts.app')

@section('content')



<div class="jumbotron">
    <div class="container">
        <h1 class="display-3">Zmotywuj się do czytania już teraz!</h1><br>
        <p class="display-5">Czytaj z nami.pl - jest to serwis zachęcający do czytania i wspierający czytelników. Śledź swoje dzienne postępy, oceniaj książki i dziel się postępami z innymi członkami społeczności.</p>
    </div>
</div>
<div class="container-fluid">
    <div class="row text-center">
        <div class="col-sm">
            <h2>Uzupełniaj i śledź swoje postępy</h2>
            <img src="{{asset('images/calendar-icon.JPG')}}">
        </div>
        <div class="col-sm">
            <h2>Oceniaj i recenzuj książki</h2>
            <img src="{{asset('images/rating.png')}}">
        </div>
        <div class="col-sm">
            <h2>Dodawaj i obserwuj znajomych</h2>
            <img src="{{asset('images/friends.JPG')}}">
        </div>
    </div>
</div>


@endsection