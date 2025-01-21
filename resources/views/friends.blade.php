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
                            {{$allFrirends}}
                        @else
                            Nie masz żadnych znajomych
                        @endif
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>



@endsection