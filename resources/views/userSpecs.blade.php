@extends('layouts.app')

@section('content')


<div class="container">
    @isset($users->privacy)
    @if($users->privacy == 1 || ($users->privacy == 2 && isset($isFriend) && $isFriend == true))
    

    


    <div class="card my-4">
        <div class="card-header">
            <h5>Informacje o użytkowniku</h5>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-auto">

                    Imię: {{ $users['firstName'] }} <br>
                    Nazwisko: {{ $users['lastName'] }} <br>
                    Pseudonim:
                    @if ( $users['nickName'] == null)
                    Brak pseudonimu
                    @else
                    {{ $users['nickName'] }}
                    @endif
                    <br>
                    Adres email: {{ $users['email'] }} <br>
                    Płeć:
                    @if ($users['gender'] == 0)
                    Mężczyzna
                    @elseif ($users['gender'] == 1)
                    Kobieta
                    @else
                    Inna/Nie chcę podawać
                    @endif <br>

                </div>
                <div class="col-auto">

                    @if($users->privacy == 2 && isset($isFriend))
                    <div class="alert alert-success" role="alert">
                        Jesteście znajomymi!
                    </div>
                    <a href="{{ route('friends.cancelFriendRequest', ['userID' => $users['id']]) }}" class="btn btn-danger">Usuń znajomego</a>
                    @endif
                </div>
            </div>
        </div>
    </div>



    <div class="card my-4">
        <div class="card-header">
            <h5>Cele użytkownika</h5>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-auto">
                    @isset($goals)
                    @foreach($goals as $data)
                    Cel roczny: {{ $data->yearGoal }} <br>
                    Cel miesięczny: {{ $data->monthGoal }} <br>
                    Cel tygodniowy: {{ $data->weekGoal }} <br>
                    Cel dzienny: {{ $data->dayGoal }} <br>
                    @endforeach
                    @endisset


                    @if (empty($goals) || $goals->isEmpty())
                    Cel roczny: brak <br>
                    Cel miesięczny: brak <br>
                    Cel tygodniowy: brak <br>
                    Cel dzienny: brak <br>
                    @endif

                </div>
            </div>
        </div>
    </div>

    <div class="card my-4">
        <div class="card-header">
            <h5>Opinie i recenzje użytkownika</h5>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-auto">
                    @isset($ratings)
                    @foreach($ratings as $rate=>$data)
                    Książka: {{$data->title}} <br>
                    Recenzja: {!!$data->review!!} <br>
                    Ocena: {{$data->rate}} <br>
                    <hr>
                    @endforeach
                    @endisset

                    @if (empty($ratings) || $ratings->isEmpty())
                    Użytkownik nie wystawił żadnych opinii <br>
                    @endif

                </div>
            </div>
        </div>
    </div>
    @endif

    @if($users->privacy == 2 && (isset($isFriend) || $isFriend == false))
    <div class="card my-4">
        <div class="card-header">
            <h5>Informacja</h5>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-auto">

                Profil publiczny jest tylko dla znajomych.

                </div>
            </div>
        </div>
    </div>
        
    @endif


    @if($users->privacy == 3)
    <div class="card my-4">
        <div class="card-header">
            <h5>Informacja</h5>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-auto">

                    Użytkownik nie udostępnia informacji publicznie.

                </div>
            </div>
        </div>
    </div>
    @endif
    @endisset



</div>


@endsection