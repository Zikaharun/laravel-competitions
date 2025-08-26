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
        $totalDivisions = CompetitionDivision::where('user_id', $users->id)->count();
        $totalParticipants = $userDivisions ? $userDivisions->participants()->count() : 0;
        $totalCompetitions = $userDivisions ? 1 : 0; // Assuming one competition per division

        return view('users.dashboard', compact('userDivisions','totalDivisions','totalParticipants','totalCompetitions'));
    }
}
