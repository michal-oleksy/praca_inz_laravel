<?php

namespace App\Http\Controllers;
use App\Models\Books;

class BooksController extends Controller
{
    public function index(){
        $books = Books::all();

        return view('books', ['books' => $books]);
    }
}


