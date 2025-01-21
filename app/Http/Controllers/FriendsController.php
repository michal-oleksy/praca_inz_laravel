<?php

namespace App\Http\Controllers;
use Multicaret\Acquaintances\Traits\Friendable;
use Illuminate\Http\Request;

class FriendsController extends Controller
{
    use Friendable;
    public function index()
    {
        $user = auth()->user();
        $allFrirends = $user->getAllFriendships();
        
        return view('friends')->with('allFrirends', $allFrirends);
    }
}
