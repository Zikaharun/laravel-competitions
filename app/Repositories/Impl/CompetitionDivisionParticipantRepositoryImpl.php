<?php 

namespace App\Repositories\Impl;

use App\Models\CompetitionDivision;
use App\Models\Participant;
use App\Repositories\CompetitionDivisionParticipantRepository;

class CompetitionDivisionParticipantRepositoryImpl implements CompetitionDivisionParticipantRepository
{
    public function attachParticipant(string $competitionDivisionId, string $participantId)
    {
        $division = CompetitionDivision::findOrFail($competitionDivisionId);
        return $division->participant()->attach($participantId);
    }
    public function detachParticipant(string $competitionDivisionId, string $participantId)
    {
        $division = CompetitionDivision::findOrFail($competitionDivisionId);
        return $division->participant()->detach($participantId);
    }
    public function getParticipantsByDivision(string $competitionDivisionId)
    {
        $division = CompetitionDivision::with('participant')->findOrFail($competitionDivisionId);
        return $division->participant;
    }
    public function getDivisionsByParticipant(string $participantId)
    {
        $participant = Participant::with('division')->findOrFail($participantId);
        return $participant->division;
    }

}