<?php

namespace App\Http\Controllers;

use Multicaret\Acquaintances\Traits\Friendable;

use App\Models\User;
use DB;

use Illuminate\Support\Facades\Auth;


class FriendsController extends Controller
{
    use Friendable;

    public function index()
    {
        $user = auth()->user();
        $allAcceptedFriends = $user->getFriends(); //zaakceptowani znajomi



        $friendRequests = $user->getFriendRequests(); //zaproszenia od innych dla nas

        $myRequests = $user->getPendingFriendships(); //nasze zaproszenia dla innych


        $comingInvitationsUsersIds = $friendRequests->pluck('sender_id'); //id wysyłających zaproszenia

        $myInvitationsUsersIds = $myRequests->pluck('recipient_id'); //id odbiorców zaproszeń

        $pendingInvitationsFriends = User::whereIn('id', $comingInvitationsUsersIds)
            ->select('id', 'firstName', 'lastName', 'email')
            ->get();

        $sendInvitationsFriends = User::whereIn('id', $myInvitationsUsersIds)
            ->select('id', 'firstName', 'lastName', 'email')
            ->where('id', '!=', $user->id)
            ->get();

        // dd($sendInvitationsFriends);

        return view('friends')
            ->with('allAcceptedFriends', $allAcceptedFriends)
            ->with('friendRequests', $friendRequests)
            ->with('pendingInvitationsFriends', $pendingInvitationsFriends)
            ->with('sendInvitationsFriends', $sendInvitationsFriends);
    }

    public function addFriend($id)
    {
        $user = auth()->user();
        $friend = User::find($id);
        if ($friend) {
            $user->befriend($friend);
            return redirect()->to('userList')->with('success', 'Poprawnie wysłano zaproszenie do znajomych.');
        } else {
            return redirect()->to('userList')->with('error', 'Nie udało się wysłać zaproszenia do znajomych.');
        }
    }

    public function denyFriend($id)
    {
        $user = Auth::user();
        $friend = User::find($id);


        if ($friend) {
            $user->denyFriendRequest($friend);
            return redirect()->to('friends')->with('warning', 'Poprawnie odmówiono przyjęcia do znajomych.');
        } 

        return redirect()->to('friends')->with('error', 'Nie udało się odmówić zaproszenia do znajomych.');
        
    }

    public function acceptFriend($id)
    {

        $user = Auth::user(); // Poprawione
        $friend = User::find($id);

        if ($friend) {
            $user->acceptFriendRequest($friend);
            return redirect()->back()->with('success', 'Zaproszenie zostało zaakceptowane.');
        }

        return redirect()->back()->with('error', 'Błąd. Nie udało się zaakceptować zaproszenia.');
        
        
    }

    public function cancelFriendRequest($id)
    {
        $user = Auth::user();
        $friend = User::find($id);

        if ($friend) {
            $user->unfriend($friend);
            return back()->with('warning', 'Usunięto znajomego lub zaproszenie do znajomych zostało anulowane.');
        }

        return back()->with('error', 'Nie udało się usunąć znajomego lub anulować zaproszenia do znajomych.');
    }
}
