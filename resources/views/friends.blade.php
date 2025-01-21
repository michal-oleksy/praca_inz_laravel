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
                   



                    @if(isset($allFrirends))
                        @if(count($allFrirends) > 0)
                            
                            <!-- {{ $sender[0]->sender_id }} -->
                            @foreach ($sender as $sender)
                                Twój znajomy to: {{  $sender->sender_id }}
                            @endforeach
                        @else
                            Nie masz żadnych znajomych
                        @endif
                    @endif
                </div>
            </div>


            <div class="card">
                <div class="card-header">
                    <h5>Lista oczekująca</h5>
                </div>
                <div class="card-body">
                   



                    @if(isset($pendingFriendships))
                        @if(count($pendingFriendships) > 0)
                            {{$pendingFriendships}}
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