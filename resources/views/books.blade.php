@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row my-2 ">
        <div class="col-md-3">

            <form action="{{ route('books.search') }}" method="POST">
                <div class="input-group rounded">
                    @csrf
                    <input name="search" id="search" type="search" class="form-control rounded" placeholder="Wyszukaj" aria-label="Wyszukaj" aria-describedby="Wyszukaj-addon" />
                    <button type="submit" class="btn btn-primary">Wyszukaj</button>
                </div>
            </form>

        </div>
    </div>
</div>

<div class="container">
    @if(isset($books) && count($books) > 0)
    <table class="table table-bordered table-hover table-sm w-autoalign-middle rounded-4 overflow-hidden">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Autor</th>
                <th scope="col">Tytuł</th>
                <th scope="col">Gatunek</th>
                <th scope="col">Data pierwszego wydania</th>
                <th scope="col">Ilość stron</th>
                <th scope="col">Wydawnictwo</th>
                <th scope="col">Status</th>
            </tr>
        </thead>

        @foreach ($books as $book)

        <tr>
            <th scope="row">{{ $book->id; }}</th>
            <td>
                <p>{{ $book->author;}}</p>
            </td>
            <td>
                <a href="{{ route('bookSpecs', ['bookID' => $book->id] )}}">
                    <p>{{ $book->title;}}</p>
                </a>
            </td>
            <td>
                <p>{{ $book->genre; }}</p>
            </td>
            <td>
                <p>{{ $book->datePublished; }}</p>
            </td>
            <td>
                <p>{{ $book->pages; }}</p>
            </td>
            <td>
                <p>{{ $book->publisher; }}</p>
            </td>
            <td>
                <div class="btn-group">
                    <form class="mr-1" action="{{ route('books.updateStatus', ['bookID' => $book->id]) }}" method="POST">
                        @csrf
                        <button value="1" name="button" type="submit" class="btn btn-secondary btn-custom-space">Przeczytana</button>
                    </form>
                    <form action="{{ route('books.updateStatus', ['bookID' => $book->id]) }}" method="POST">
                        @csrf
                        <button value="2" name="button" type="submit" class="btn btn-success btn-custom-space">Czytam teraz</button>
                    </form>
                    <form action="{{ route('books.updateStatus', ['bookID' => $book->id]) }}" method="POST">
                        @csrf
                        <button value="3" name="button" type="submit" class="btn btn-primary btn-custom-space">Do przeczytania</button>
                    </form>
                </div>
            </td>
        </tr>

        @endforeach
    </table>
    @elseif(isset($books) && count($books) == 0)
    <div class="card">
        <div class="card-header">
            <h5>Wyniki wyszukiwania
        </div>
        <div class="card-body">
            Nie znaleziono książek spełniających kryteria wyszukiwania.
        </div>
    </div>

    @endif

</div>



@endsection