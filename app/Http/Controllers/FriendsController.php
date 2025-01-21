<?php

namespace App\Http\Controllers;
use Multicaret\Acquaintances\Traits\Friendable;
use App\Models\User;
use DB;

class FriendsController extends Controller
{
    use Friendable;
    public function index()
    {
        $user = auth()->user();
        $allFrirends = $user->getAllFriendships();
        $pendingFriendships = $user->getPendingFriendships();

        $senderID = $allFrirends->pluck('sender_id');

        $sender = DB::table('friendships')
            ->select('sender_id')
            ->where('sender_id', $senderID)
            ->get();
        // dd($sender[0]->sender_id);
        return view('friends')->with('allFrirends', $allFrirends)->with('pendingFriendships', $pendingFriendships)->with('sender', $sender);
    }

    public function addFriend($id)
    {
        $user = auth()->user();
        $friend = User::find($id);
        $user->befriend($friend);
        return back();
    }
}
