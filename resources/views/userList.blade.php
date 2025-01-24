@extends('layouts.app')

@section('content')


<div class="container">
    <table class="table table-bordered table-hover table-sm w-autoalign-middle rounded-4 overflow-hidden">
        <thead>
            <tr>
                <!-- <th scope="col">#</th> -->
                <th scope="col">Imię</th>
                <th scope="col">Nazwisko</th>
                <th scope="col">E-mail</th>
                <th scope="col">Pseudonim</th>
                <th scope="col">Płeć</th>
                <th scope="col">Dodaj do znajomych</th>
                <th scope="col">Zobacz profil</th>
            </tr>
        </thead>

        @foreach ($users as $user)
        @if ($user->id == $userID)
        @continue
        @endif
        <tr>
            <!-- <th scope="row">{{ $user->id }}</th> -->
            <td>

                <p>{{ $user->firstName}}</p>

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
                <a href="{{ route('friends.addFriend', ['userID' => $user->id] )}}">
                    <button type="button" class="btn btn-primary">Dodaj do znajomych</button>
                </a>
            </td>
            <td>
                <a href="{{ route('userSpecs.index', ['userID' => $user->id] )}}">
                    <button type="button" class="btn btn-primary">Zobacz profil</button>
                </a>
            </td>

        </tr>

        @endforeach
    </table>

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
</div>



@endsection