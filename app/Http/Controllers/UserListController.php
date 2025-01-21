<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use App\Models\Goals;
use Illuminate\Support\Facades\Auth;

class UserListController extends Controller
{
    public function index(){
        $users = User::all();

        return view('userList', ['users' => $users]);
    }

    
}
