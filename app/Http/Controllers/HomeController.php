<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Goals;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user = Auth::user();
        $userID = $user['id'];

        $info = DB::table('users')
            ->where('id', $userID)
            ->select('firstName', 'lastName', 'email', 'nickName')->get();
        $goals = DB::table('goals')
            ->where('userID', $userID)
            ->select('yearGoal', 'monthGoal', 'weekGoal', 'dayGoal')->get();

        $bookList1 = DB::table('status')
            ->join('books', 'status.bookID', '=', 'books.id')
            ->where('userID', $userID)
            ->where('status', 1)
            ->select('books.title', 'status.bookID', 'status.status')
            ->get();

        $bookList2 = DB::table('status')
            ->join('books', 'status.bookID', '=', 'books.id')
            ->where('userID', $userID)
            ->where('status', 2)
            ->select('books.title', 'status.bookID', 'status.status')
            ->get();

        $bookList3 = DB::table('status')
            ->join('books', 'status.bookID', '=', 'books.id')
            ->where('userID', $userID)
            ->where('status', 3)
            ->select('books.title', 'status.bookID', 'status.status')
            ->get();
        
        
        // dd($bookList[0][0]->title);
        return view('home')->with('info', $info)->with('goals', $goals)->with('bookList1', $bookList1)->with('bookList2', $bookList2)->with('bookList3', $bookList3);
    }

    public function edit(Request $request)
    {
        $user = Auth::user();
        $userID = $user['id'];;

        $request->validate([
            'yearGoal' => 'nullable|numeric|gt:0',
            'monthGoal' => 'nullable|numeric|gt:0|lt:yearGoal',
            'weekGoal' => 'nullable|numeric|gt:0|lt:monthGoal',
            'dayGoal' => 'nullable|numeric|gt:0|lt:weekGoal',
        ]);

        Goals::updateOrCreate([
            'userID' => $userID,
        ], [
            'yearGoal' => $request->yearGoal,
            'monthGoal' => $request->monthGoal,
            'weekGoal' => $request->weekGoal,
            'dayGoal' => $request->dayGoal,
        ]);

        return redirect()->route('home');
    }
}
