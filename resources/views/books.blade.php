@extends('layouts.app')

@section('content')


<div class="container">
    <table class="table table-bordered table-hover table-sm w-autoalign-middle rounded-4 overflow-hidden">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Autor</th>
                <th scope="col">Tytuł</th>
                <th scope="col">Gatunek</th>
                <th scope="col">Data pierwszego wydanian</th>
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
</div>



@endsection