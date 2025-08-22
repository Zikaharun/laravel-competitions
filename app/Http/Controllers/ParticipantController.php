<?php

namespace App\Http\Controllers;

use App\Services\CompetitionDivisionParticipantService;
use App\Services\ParticipantService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ParticipantController extends Controller
{
    //
    private ParticipantService $participantsService;
    private CompetitionDivisionParticipantService $competitionDivisionParticipantService;
    
    public function __construct(ParticipantService $participantsService, CompetitionDivisionParticipantService $competitionDivisionParticipantService)
    {
        $this->participantsService = $participantsService;
        $this->competitionDivisionParticipantService = $competitionDivisionParticipantService;
    }

    public function index()
    {
        $participants = $this->participantsService->getAll();
        return view('users.participants.index', compact('participants'));
    }

    public function create()
    {
        return view('users.participants.index');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'rt' => 'required|string|max:10',
            'ranking' => 'nullable|integer'
        ]);

        $divisionId = Auth::user()->divisions->id;

        $participant = $this->participantsService->store($data);
        $this->competitionDivisionParticipantService->addParticipantToDivision($divisionId, $participant->id );

        return redirect()->route('participants.index')->with('success', 'Participants has been added!');

    }
}
