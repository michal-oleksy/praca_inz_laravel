@extends('layouts.app')

@section('content')


<div class="container">
    <div class="row justify-content-center">
        <div class="column">
            <div class="card">
                <div class="card-header">
                    <h5>Twoi znajomi</h5>
                </div>
                <div class="card-body">




                    @if(isset($allAcceptedFrirends))
                    @if(count($allAcceptedFrirends) > 0)
                    {{$allAcceptedFrirends}}
                    <!-- {{ $sender[0]->sender_id }} -->
                    <!-- @foreach ($sender as $sender)
                                Twój znajomy to: {{  $sender->sender_id }}
                            @endforeach -->
                    @else
                    Nie masz żadnych znajomych
                    @endif
                    @endif
                </div>
            </div>


            <div class="card my-2">
                <div class="card-header">
                    <h5>Lista oczekująca</h5>
                </div>
                <div class="card-body">

                    @if(isset($pendingFriendshipsForView))

                    @if(count($pendingFriendshipsForView) > 0)
                    @foreach($pendingFriendshipsForView as $user)
                    <div class="row my-2">
                        <div class="col-md-4">
                            &#128900;
                            id: {{ $user->id }}
                            {{ $user->firstName }}
                            {{ $user->lastName }}
                            Email: {{ $user->email }}
                        </div>
                        <div class="col-md-4">


                            <a href="{{ route('friends.acceptFriend', ['userID' => $user->id]) }}" class="btn btn-success">Akceptuj</a>

                            <form action="{{ route('friends.acceptFriend', ['userID' => $user->id]) }}" method="POST">
                                @csrf
                                <button type="submit" class="btn btn-primary">Accept Friend Request</button>
                            </form>
                            {{-- <a href="{{ route('rejectFriend', ['id' => $user->id]) }}" class="btn btn-danger">Odrzuć</a> --}}
                        </div>
                    </div>
                    @endforeach
                    @else
                    Nie masz nikogo na liście oczekującej
                    @endif
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>



@endsection