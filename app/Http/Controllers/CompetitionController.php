<?php

namespace App\Http\Controllers;

use App\Services\CompetitionService;
use Illuminate\Http\Request;

class CompetitionController extends Controller
{
    //
    protected CompetitionService $competitionService;

    public function __construct(CompetitionService $competitionService)
    {
        $this->competitionService = $competitionService;
    }

    public function index()
    {
        $competitions = $this->competitionService->getAll();
        return view('admin.competitions.index', compact('competitions'));
    }

    public function create()
    {
        return view('admin.competitions.index');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        $this->competitionService->store($validated);

        return redirect()->route('admin.competitions.index')
                            ->with('success', 'Competition created successfully!');
    }
}
