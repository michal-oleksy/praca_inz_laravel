@extends('layouts.app')

@section('content')


<div class="container">
    <table class="table table-bordered table-hover table-sm w-autoalign-middle">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Imię</th>
                <th scope="col">Nazwisko</th>
                <th scope="col">E-mail</th>
                <th scope="col">Pseudonim</th>
                <th scope="col">Płeć</th>
                <th scope="col">Dodaj do znajomych</th>

            </tr>
        </thead>

        @foreach ($users as $user)

        <tr>
            <th scope="row">{{ $user->id }}</th>
            <td>
                <a href="{{ route('userSpecs.index', ['userID' => $user->id] )}}">
                    <p>{{ $user->firstName}}</p>
                </a>
            </td>
            <td>

                <p>{{ $user->lastName}}</p>
                </a>
            </td>
            <td>
                <p>{{ $user->email }}</p>
            </td>
            <td>
                <p>
                    @if ($user->nickName == null)
                    Brak pseudonimu
                    @else
                    {{ $user->nickName; }}
                    @endif

                </p>
            </td>
            <td>
                <p>
                    @if ($user->gender == 0)
                    Mężczyzna
                    @elseif ($user->gender == 1)
                    Kobieta
                    @else
                    Inna/Nie chcę podawać
                    @endif
                </p>
            </td>
            <td>
                <a href="{{ route('userSpecs.index', ['userID' => $user->id] )}}">
                    <button type="button" class="btn btn-primary">Dodaj do znajomych</button>
                </a>
            </td>

        </tr>

        @endforeach
    </table>
</div>



@endsection