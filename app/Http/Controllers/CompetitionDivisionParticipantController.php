<?php

namespace App\Http\Controllers;

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
        $participants = $this->competitionDivisionParticipantService->listParticipantsInDivision($divisionId);
        return view('admin.participant_ranking.index', compact('participants'));
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
}
