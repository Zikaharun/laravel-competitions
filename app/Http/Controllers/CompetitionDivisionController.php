<?php

namespace App\Http\Controllers;

use App\Models\Competition;
use App\Models\User;
use App\Services\CompetitionDivisionService;
use Illuminate\Http\Request;

class CompetitionDivisionController extends Controller
{
    //
    protected CompetitionDivisionService $competitionDivisionService;

    public function __construct(CompetitionDivisionService $competitionDivisionService)
    {
        $this->competitionDivisionService = $competitionDivisionService;
    }

    public function index()
    {
        $divisions = $this->competitionDivisionService->getAll();
        $users = User::where('role', 'users')->get();
        $competitions = Competition::all();

        return view('admin.divisions.index', compact('divisions','users', 'competitions'));
    }

    public function create()
    {
        $users = User::where('role', 'users')->get();
        $competitions = Competition::all();
        
        return view('admin.divisions.index', compact('users', 'competitions'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'user_id' => 'required|exists:users,id',
            'competition_id' => 'required|exists:competitions,id'
        ]);

        $this->competitionDivisionService->store($data);

        return redirect()->route('admin.divisions.index')->with('success', 'Competition Divisions has been updated!');
    }

    public function edit(string $id)
    {
        $users = User::where('role', 'users')->get();
        $competitions = Competition::all();
        $divisions = $this->competitionDivisionService->findById($id);

        return view('admin.divisions.edit', compact('divisions','users','competitions'));
    }

    public function update(Request $request, string $id)
    {
        $data = $request->validate([
            'user_id' => 'required|exists:users,id',
            'competition_id' => 'required|exists:competitions,id',
        ]);

        $this->competitionDivisionService->update($id, $data);

        return redirect()->route('admin.divisions.index')->with('success', 'Division has been updated!');
    }

    public function destroy(string $id)
    {
        $this->competitionDivisionService->delete($id);

        return redirect()->route('admin.divisions.index')->with('success', 'Division has been deleted!');
    }
}
