<?php

namespace App\Http\Controllers;
use App\Models\Books;
use App\Models\Status;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DB;

class BooksController extends Controller
{
    public function index(){
        $books = Books::all();

        return view('books', ['books' => $books]);
    }

    public function updateStatus(Request $request, $bookID){
        $status = $request->button;
        $user = Auth::user();
        $userID = $user['id'];

        Status::updateOrCreate([
            'userID' => $userID,
            'bookID' => $bookID,
        ], [
            'status' => $status,
        ]);

        return redirect()->route('books.index');
    }
}




