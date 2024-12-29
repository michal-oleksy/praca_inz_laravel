<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Goals;

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
        $user = auth()->user();
        $userID = $user['id'];

        $info = DB::table('users')->where('id', $userID)->select('firstName', 'lastName', 'email', 'nickName')->get();
        $goals = DB::table('goals')->where('userID', $userID)->select('yearGoal', 'monthGoal', 'weekGoal','dayGoal')->get();

        return view('home')->with('info', $info)->with('goals', $goals);
    }

    public function edit(Request $request)
    {
        $user = auth()->user();
        $userID = $user['id'];

        $request->validate([
            'yearGoal' => 'nullable|numeric|gt:0',
            'monthGoal' => 'nullable|numeric|gt:0|lt:yearGoal',
            'weekGoal' => 'nullable|numeric|gt:0|lt:monthGoal',
            'dayGoal'=> 'nullable|numeric|gt:0|lt:weekGoal',
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
