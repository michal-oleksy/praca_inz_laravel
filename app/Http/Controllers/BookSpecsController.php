<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Books;
use App\Models\Ratings;
use App\Models\Reviews;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class BookSpecsController extends Controller
{
    public function index($bookID)
    {
        //informacje o książce
        $bookInfo = Books::all()
            ->where('id', $bookID)
            ->first();
        //średnia ocena książki
        $bookRate = Ratings::all()
            ->where('bookID', $bookID)
            ->avg('rate');
        //wszystkie recenzje książki
        $bookReviews = DB::table('reviews')
            ->join('users', 'reviews.userID', '=', 'users.id')
            ->leftJoin('ratings', function ($join) use ($bookID) {
                $join->on('reviews.userID', '=', 'ratings.userID')
                    ->where('ratings.bookID', '=', $bookID);
            })
            ->select('reviews.review', 'reviews.updated_at', 'users.firstName', 'ratings.rate')
            ->where('reviews.bookID', $bookID)
            ->get();


        $user = Auth::user();

        $userID = isset($user) ? $userID = $user['id'] : 0;

        $userRate = Ratings::all()
            ->where('userID', $userID)
            ->where('bookID', $bookID)
            ->first();


        return view('bookSpecs')->with('bookInfo', $bookInfo)->with('bookRate', $bookRate)->with('userRate', $userRate)->with('bookReviews', $bookReviews);
    }

    public function addRate(Request $request)
    {
        
        

        $validator = Validator::make($request->all(), [
            'rate' => 'required|numeric|gt:0|lt:6',
        ], [
            'review.required' => 'Ocena jest wymagana.',
        ]);

        if ($validator->fails()) {
            return redirect()->route('bookSpecs', ['bookID' => $request->bookID])
                             ->withErrors($validator)
                             ->withInput();
        }

        

        $user = Auth::user();
        $userID = $user['id'];

        $addRate = Ratings::updateOrCreate([
            'userID' => $userID,
            'bookID' => $request->bookID,
        ], [
            'rate' => $request->rate,
        ]);
        return redirect()->route('bookSpecs', ['bookID' => $request->bookID]);
    }

    public function addReview(Request $request)
    {


     

        $validator = Validator::make($request->all(), [
            'review' => 'required|min:1',
        ], [
            'review.required' => 'Recenzja jest wymagana.',
        ]);

        if ($validator->fails()) {
            return redirect()->route('bookSpecs', ['bookID' => $request->bookID])
                             ->withErrors($validator)
                             ->withInput();
        }

        $user = Auth::user();
        $userID = $user['id'];

        $addReview = Reviews::updateOrCreate([
            'userID' => $userID,
            'bookID' => $request->bookID,
        ], [
            'review' => $request->review,
        ]);
        return redirect()->route('bookSpecs', ['bookID' => $request->bookID]);
    }
}
