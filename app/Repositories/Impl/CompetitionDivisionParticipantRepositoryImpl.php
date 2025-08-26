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
        return $division->participants()->attach($participantId);
    }
    public function detachParticipant(string $competitionDivisionId, string $participantId)
    {
        $division = CompetitionDivision::findOrFail($competitionDivisionId);
        return $division->participants()->detach($participantId);
    }
    public function getParticipantsByDivision(string $competitionDivisionId)
    {
         $division = CompetitionDivision::with(['participants', 'competition'])
        ->findOrFail($competitionDivisionId);

        // inject relasi competition ke setiap participant
        $division->participants->each(function ($participants) use ($division) {
        $participants->competition = $division->competition;
    });

    return $division->participants;
    }
    public function getDivisionsByParticipant(string $participantId)
    {
        $participant = Participant::with('division')->findOrFail($participantId);
        return $participant->division;
    }

}