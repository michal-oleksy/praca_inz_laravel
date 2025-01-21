<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class UserSpecsController extends Controller
{
    public function index($userID)
    {
        $users = User::all()
            ->where('id', $userID)
            ->first();

        $goals = DB::table('goals')
            ->where('userID', $userID)
            ->select('yearGoal', 'monthGoal', 'weekGoal', 'dayGoal')
            ->get();

        $ratings = DB::table('ratings')
            ->join('books', 'ratings.bookID', '=', 'books.id')
            ->leftJoin('reviews', function($join) use ($userID) {
                $join->on('ratings.bookID', '=', 'reviews.bookID')
                     ->where('reviews.userID', '=', $userID);
            })
            ->where('ratings.userID', $userID)
            ->select('books.title', 'ratings.rate', 'reviews.review')
            ->get();
       



        return view('userSpecs', compact('users', 'goals', 'ratings'));
    }
}
