<?php

namespace App\Http\Controllers;

use Multicaret\Acquaintances\Traits\Friendable;
use Multicaret\Acquaintances\Traits\CanFollow;
use Multicaret\Acquaintances\Traits\CanBeFollowed;
use Multicaret\Acquaintances\Traits\CanLike;
use Multicaret\Acquaintances\Traits\CanBeLiked;
use Multicaret\Acquaintances\Traits\CanRate;
use Multicaret\Acquaintances\Traits\CanBeRated;
use App\Models\User;
use DB;

use Illuminate\Support\Facades\Auth;


class FriendsController extends Controller
{
    use Friendable;
    use CanFollow, CanBeFollowed;
    use CanLike, CanBeLiked;
    use CanRate, CanBeRated;
    public function index()
    {
        $user = auth()->user();
        $allAcceptedFrirends = $user->getAcceptedFriendships();
        $pendingFriendships = $user->getPendingFriendships();

        $recipient_id = $pendingFriendships->pluck('recipient_id');

        // dd($senderID);

        $pendingFriendshipsForView = DB::table('users')
            ->select('users.id', 'users.firstName', 'users.lastName', 'users.email')
            ->whereIn('users.id', $recipient_id)
            ->get();

        // dd($pendingFriendshipsForView);

        return view('friends')
        ->with('pendingFriendshipsForView', $pendingFriendshipsForView)
        ->with('allAcceptedFrirends', $allAcceptedFrirends);
    }

    public function addFriend($id)
    {
        $user = auth()->user();
        $friend = User::find($id);
        $user->befriend($friend);
        return back();
    }

    public function acceptFriend($id)
    {
        $user = Auth::user();
        $friend = User::find($id);

        if ($friend) {
            // dd($id);
            $user->acceptFriendRequest($friend);
            return redirect()->back()->with('success', 'Friend request accepted.');
        }

        return redirect()->back()->with('error', 'User not found.');
    }
}
