<?php

namespace App\Http\Controllers;

use App\Models\Competition;
use App\Models\User;
use App\Services\CompetitionDivisionService;
use App\Services\CompetitionService;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    //
     protected CompetitionDivisionService $competitionDivisionService;

    public function __construct(CompetitionDivisionService $competitionDivisionService)
    {
        $this->competitionDivisionService = $competitionDivisionService;
    }

    public function dashboard()
    {
        $divisions = $this->competitionDivisionService->getAll();
        $users = User::where('role', 'users')->get();
        $competitions = Competition::all();

        return view('admin.dashboard', compact('divisions','users', 'competitions'));
    }
}
