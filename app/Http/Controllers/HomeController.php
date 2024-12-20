<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;

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

        $info = DB::table('users')->where('id', $userID)->select('firstName','lastName','email','nickName')->get();
        $goals = DB::table('goals')->where('userID', $userID)->select('yearGoal','monthGoal','dayGoal')->get();
            
        
       
        // dd($info[0]);
        return view('home')->with('info',$info)->with('goals',$goals);
    }
}
