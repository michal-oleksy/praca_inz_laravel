@extends('layouts.app')

@section('content')


<div class="container">
    <div class="row justify-content-center">
        <div class="column">
            @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
            @endif
            @if (session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
            @endif
            @if (session('warning'))
            <div class="alert alert-warning">
                {{ session('warning') }}
            </div>
            @endif
            <div class="card">
                <div class="card-header">
                    <h5>Twoi znajomi</h5>
                </div>
                <div class="card-body">





                    @if(isset($allAcceptedFriends))
                    @if(count($allAcceptedFriends) > 0)

                    @foreach($allAcceptedFriends as $user)
                    <div class="row my-2">
                        <div class="col-sm-3">

                            <strong>Imię:</strong> {{ $user->firstName }}<br>
                            <strong>Nazwisko:</strong> {{ $user->lastName }}<br>
                            <strong>Email:</strong> {{ $user->email }}

                            <hr>
                        </div>
                        <div class="col-sm-3">
                            <form action="{{ route('friends.cancelFriendRequest', ['userID' => $user->id]) }}" method="POST">
                                @csrf
                                <button type="submit" class="btn btn-danger">Usuń znajomego</button>
                            </form>
                        </div>
                    </div>
                    @endforeach
                    @else
                    Nie masz żadnych znajomych
                    @endif
                    @endif



                </div>
            </div>




            <div class="card my-2">
                <div class="card-header">
                    <h5>Otrzymane zaproszenia</h5>
                </div>
                <div class="card-body">


                    @if(isset($pendingInvitationsFriends))

                    @if(count($pendingInvitationsFriends) > 0)
                    @foreach($pendingInvitationsFriends as $user)
                    <div class="row my-2 ">
                        <div class="col-sm-3">


                            <strong>Imię:</strong> {{ $user->firstName }} <br>
                            <strong>Nazwisko:</strong> {{ $user->lastName }} <br>
                            <strong>Email:</strong> {{ $user->email }}
                            <hr>
                        </div>
                        <div class="col-auto">
                            <form action="{{ route('friends.acceptFriend', ['userID' => $user->id]) }}" method="POST">
                                @csrf
                                <button type="submit" class="btn btn-success">Akceptuj</button>
                            </form>
                        </div>
                        <div class="col-auto">
                            <form action="{{ route('friends.denyFriend', ['userID' => $user->id]) }}" method="POST">
                                @csrf
                                <button type="submit" class="btn btn-danger">Odrzuć</button>
                            </form>
                        </div>
                        
                    </div>
                    

                    @endforeach
                    @else
                    Nikt jeszcze nie wysłał ci zaproszenia.
                    @endif
                    @endif



                </div>
            </div>




            <div class="card my-2">
                <div class="card-header">
                    <h5>Wysłane zaproszenia</h5>
                </div>
                <div class="card-body">


                    @if(isset($sendInvitationsFriends))

                    @if(count($sendInvitationsFriends) > 0)
                    @foreach($sendInvitationsFriends as $user)
                    <div class="row my-2 ">
                        <div class="col-sm-3">


                            <strong>Imię:</strong> {{ $user->firstName }} <br>
                            <strong>Nazwisko:</strong> {{ $user->lastName }} <br>
                            <strong>Email:</strong> {{ $user->email }}
                            <hr>
                        </div>

                        <div class="col-sm-3">
                            <form action="{{ route('friends.cancelFriendRequest', ['userID' => $user->id]) }}" method="POST">
                                @csrf
                                <button type="submit" class="btn btn-danger">Anuluj</button>
                            </form>
                        </div>


                    </div>


                    @endforeach
                    @else
                    Nikomu jeszcze nie wysłałeś zaproszenia.
                    @endif
                    @endif



                </div>
            </div>


        </div>
    </div>
</div>



@endsection