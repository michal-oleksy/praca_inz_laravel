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
                    <div class="row">
                        <div class="col-auto">
                            @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                            @endif

                            {{ __('Witamy! Jesteś zalogowany/a! ') }}<br>
                            Twoje dane:<br>
                            @foreach($info as $data)
                            <strong>Imię</strong>: {{$data->firstName}}<br>
                            <strong>Nazwisko:</strong> {{$data->lastName}}<br>
                            <strong>Email:</strong> {{$data->email}}<br>
                            <strong>Pseudonim:</strong> {{$data->nickName}}<br>
                            @endforeach
                        </div>


                    </div>
                    <div class="row">

                        <div class="col-auto">
                            <hr>
                            Twoje ustawienie prywatności:<br>
                            @if(isset($data->privacy))
                            @if($data->privacy == 1)
                            <strong>Twoje dane są publiczne</strong><br>
                            @elseif($data->privacy == 2)
                            <strong>Twoje dane są dostępne tylko dla znajomych</strong><br>
                            @elseif($data->privacy == 3)
                            <strong>Twoje dane są dostępne tylko dla ciebie i nikogo innego.</strong><br>
                            @endif
                            @endif
                            Zmień ustawienia prywatności:
                            <form action="{{route('home.editPrivacySetting')}}" method="post">
                                @csrf
                                <select name="privacy" id="privacy" class="form-select my-2">
                                    <option value="1">Publiczne</option>
                                    <option value="2">Dla znajomych</option>
                                    <option value="3">Prywatne</option>
                                </select>
                                <button type="submit" class="btn btn-primary my-2">Zmień</button>
                            </form>
                        </div>
                    </div>

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
                            <strong>Twój cel roczny:</strong> {{ $data->yearGoal }}<br>
                            @else
                            <strong>Twój cel roczny:</strong> nie ustawiony<br>
                            @endif

                            @if(isset($data->monthGoal))
                            <strong>Twój cel miesięczny:</strong> {{ $data->monthGoal }}<br>
                            @else
                            <strong>Twój cel miesięczny:</strong> nie ustawiony<br>
                            @endif

                            @if(isset($data->weekGoal))
                            <strong>Twój cel tygodniowy:</strong> {{ $data->weekGoal }}<br>
                            @else
                            <strong>Twój cel tygodniowy:</strong> nie ustawiony<br>
                            @endif

                            @if(isset($data->dayGoal))
                            <strong>Twój cel dzienny:</strong> {{ $data->dayGoal }}<br>
                            @else
                            <strong>Twój cel dzienny:</strong> nie ustawiony<br>
                            @endif
                            @endforeach




                            @endif

                        </div>

                        <div class="col-auto">
                            <div class="vl"></div>
                        </div>

                        <div class="col-auto ">
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
                            <strong>Książki przeczytane</strong>
                            <ul>
                                @if(isset($bookList1)&&!$bookList1->isEmpty())
                                @foreach($bookList1 as $book)
                                <li>{{ $book->title }}</li>
                                @endforeach
                                @else
                                Nie przeczytałeś/aś jeszcze żadnej książki.
                                @endif
                            </ul>
                        </div>

                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-auto ">
                            <strong>Książki czytane obecnie</strong><br>
                            <ul>
                                @if(isset($bookList2)&&!$bookList2->isEmpty())
                                @foreach($bookList2 as $book)
                                <li>{{ $book->title }}</li>
                                @endforeach
                                @else
                                Nie czytasz jeszcze żadnej książki.
                                @endif
                            </ul>
                        </div>
                    </div>
                    <hr>
                    <div class="row ">
                        <div class="col-auto">
                            <strong>Książki do przeczytania</strong><br>
                            <ul>
                                @if(isset($bookList3)&&!$bookList3->isEmpty())
                                @foreach($bookList3 as $book)
                                <li>{{ $book->title }}</li>
                                @endforeach
                                @else
                                Nie masz żadnej książki w planach.
                                @endif
                            </ul>
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