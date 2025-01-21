@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8 ">
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


                            @if ($goals->isEmpty())
                            Nie masz ustawionych jeszcze żadnych celi czytelniczych. <br>
                            Może zrobić to tutaj.
                            @else


                            @foreach($goals as $data)
                            @if(isset($data->yearGoal))
                            Twój cel roczny: {{ $data->yearGoal }}<br>
                            @else
                            Twój cel roczny: nie ustawiony<br>
                            @endif

                            @if(isset($data->monthGoal))
                            Twój cel miesięczny: {{ $data->monthGoal }}<br>
                            @else
                            Twój cel miesięczny: nie ustawiony<br>
                            @endif

                            @if(isset($data->weekGoal))
                            Twój cel tygodniowy: {{ $data->weekGoal }}<br>
                            @else
                            Twój cel tygodniowy: nie ustawiony<br>
                            @endif

                            @if(isset($data->dayGoal))
                            Twój cel dzienny: {{ $data->dayGoal }}<br>
                            @else
                            Twój cel dzienny: nie ustawiony<br>
                            @endif
                            @endforeach




                            @endif

                        </div>

                        <div class="col-auto">
                            <div class="vl"></div>
                        </div>

                        <div class="col-auto border border-secondary">
                            <form id="goalsForm" action="{{ route('home.edit') }}" method="post">
                                <div class="form-group">
                                    @csrf
                                    <div class="d-flex align-items-center my-2">
                                        <label for="yearGoal" class="me-2">Roczny:</label>
                                        <input class="form-control" oninput="this.value = !!this.value && Math.abs(this.value) >= 0 ? Math.abs(this.value) : null" style="width:100px;" class="my-1" type="number" name="yearGoal" id="yearGoal">
                                    </div>


                                    <div class="d-flex align-items-center my-2">
                                        <label for="monthGoal" class="me-2">Miesięczny: </label>
                                        <input class="form-control" oninput="this.value = !!this.value && Math.abs(this.value) >= 0 ? Math.abs(this.value) : null" style="width:100px;" class="my-1" type="number" name="monthGoal" id="monthGoal">
                                    </div>

                                    <div class="d-flex align-items-center my-2">
                                        <label for="weekGoal" class="me-2">Tygodniowy: </label>
                                        <input class="form-control" oninput="this.value = !!this.value && Math.abs(this.value) >= 0 ? Math.abs(this.value) : null" style="width:100px;" class="my-1" type="number" name="weekGoal" id="weekGoal">
                                    </div>


                                    <div class="d-flex align-items-center my-2">
                                        <label for="dayGoal" class="me-2">Dzienny: </label>
                                        <input class="form-control" oninput="this.value = !!this.value && Math.abs(this.value) >= 0 ? Math.abs(this.value) : null" style="width:100px;" class="my-1" type="number" name="dayGoal" id="dayGoal"> <br>
                                    </div>
                                    <p>Pamiętaj, następujące po sobie <br>cele muszą być coraz mniejsze.</p>
                                    <button type="submit" class="btn btn-primary my-2" id="saveBtn">Edytuj</button>
                                </div>
                            </form>
                        </div>

                        @if($errors->any())
                        <div class="col-auto">
                            <div class="alert alert-danger alert-dismissible fade show my-2">

                                <h5>{{$errors->first()}}</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                            </div>
                        </div>
                        @endif
                    </div>

                </div>

            </div>
            <div class="card my-2">
                <div class="card-header">
                    <h5>Twoje książki</h5>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-auto">
                            <strong>Książki przeczytane</strong><br>
                            @foreach($bookList1 as $book)
                            {{ $book->title }} <br>
                            @endforeach

                        </div>

                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-auto">
                            <strong>Książki czytane obecnie</strong><br>
                            @foreach($bookList2 as $book)
                            {{ $book->title }}<br>
                            @endforeach
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-auto">
                            <strong>Książki do przeczytania</strong><br>
                            @foreach($bookList3 as $book)
                            {{ $book->title }} <br>
                            @endforeach
                        </div>
                    </div>
                    <hr>
                </div>

            </div>


        </div>
    </div>
</div>
<script>
    document.getElementById('goalsForm').onsubmit = function(e) {
        var yearGoal = document.getElementById('yearGoal').value;
        var monthGoal = document.getElementById('monthGoal').value;
        var weekGoal = document.getElementById('weekGoal').value;
        var dayGoal = document.getElementById('dayGoal').value;

        if (!yearGoal && !monthGoal && !weekGoal && !dayGoal) {
            e.preventDefault();
            alert('Musisz wypełnić co najmniej jedno pole.');
        }
    };
</script>

@endsection