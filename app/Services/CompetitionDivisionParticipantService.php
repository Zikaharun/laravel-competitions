<?php 

namespace App\Services;

use App\Repositories\CompetitionDivisionParticipantRepository;

interface CompetitionDivisionParticipantService
{
   

    public function addParticipantToDivision($competitionDivisionId, $participantId);
    public function removeParticipantFromDivision($competitionDivisionId, $participantId);
    public function listParticipantsInDivision($competitionDivisionId);
    public function listDivisionForParticipant($participantId);
}