<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Books;
use App\Models\Ratings;

class BookSpecsController extends Controller
{
    public function index($bookID){
        $bookInfo = Books::all()
            ->where('id', $bookID)
            ->first();
        
        $bookRate = Ratings::all()
            ->where('bookID', $bookID)
            ->avg('rate');

        $user = auth()->user();
        $userID = $user['id'];

        $userRate = Ratings::all()
            ->where('userID', $userID)
            ->where('bookID', $bookID)
            ->first();
        
        
        return view('bookSpecs')->with('bookInfo', $bookInfo)->with('bookRate',$bookRate)->with('userRate',$userRate);
    }

    public function addRate(Request $request){
        // dd()
        $request->validate([
            'rate' => 'required|numeric|gt:0'
        ]);

        $user = auth()->user();
        $userID = $user['id'];

        $addRate = Ratings::updateOrCreate([
            'userID' => $userID,
            'bookID' => $request->bookID,
        ], [
            'rate' => $request->rate,
        ]);
        return redirect()->route('bookSpecs', ['bookID' => $request->bookID] );
    }
}
