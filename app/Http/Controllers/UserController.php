<?php

namespace App\Http\Controllers;

use App\Models\CompetitionDivision;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    //
    public function dashboard()
    {
        $users = Auth::user();
        $userDivisions = CompetitionDivision::with('user','competition')->where('user_id', $users->id)->first();

        return view('users.dashboard', compact('userDivisions'));
    }
}
