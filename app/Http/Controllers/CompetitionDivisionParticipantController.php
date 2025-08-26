<?php

namespace App\Http\Controllers;

use App\Models\CompetitionDivision;
use App\Models\Participant;
use App\Services\CompetitionDivisionParticipantService;
use Illuminate\Http\Request;

class CompetitionDivisionParticipantController extends Controller
{
    //
    protected CompetitionDivisionParticipantService $competitionDivisionParticipantService;

    

    public function __construct(CompetitionDivisionParticipantService $service)
    {
        $this->competitionDivisionParticipantService = $service;
    }

    public function index($divisionId)
    {
        $divisionName = CompetitionDivision::with(['competition', 'user'])->find($divisionId)->first();
        $participants = $this->competitionDivisionParticipantService->listParticipantsInDivision($divisionId);
        return view('admin.participant_ranking.index', compact('participants', 'divisionName'));
    }

    public function store(Request $request)
    {
        $this->competitionDivisionParticipantService->addParticipantToDivision($request->competition_division_id, $request->participant_id);
        return view('admin.participant_ranking.index');
    }

    public function participantDivisions($participantId)
    {
        
        $divisions = $this->competitionDivisionParticipantService->listDivisionForParticipant($participantId);
        return view('admin.participant_ranking.index', compact('divisions'));
    }

    public function destroy($id)
    {
        $Participant_id = Participant::findOrFail($id);
        $Participant_id->delete();
        return redirect()->back()->with('success', 'Participant removed from division successfully!');
    }
}
