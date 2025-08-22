<?php 
namespace App\Services\Impl;

use App\Repositories\CompetitionDivisionParticipantRepository;
use App\Services\CompetitionDivisionParticipantService;

class CompetitionDivisionParticipantImpl implements CompetitionDivisionParticipantService
{
     protected CompetitionDivisionParticipantRepository $competitionDivisionParticipantRepository;

     public function __construct(CompetitionDivisionParticipantRepository $competitionDivisionParticipantRepository)
     {
        $this->competitionDivisionParticipantRepository = $competitionDivisionParticipantRepository;
     }


     public function addParticipantToDivision($competitionDivisionId, $participantId)
     {
        return $this->competitionDivisionParticipantRepository->attachParticipant($competitionDivisionId, $participantId);
     }
    public function removeParticipantFromDivision($competitionDivisionId, $participantId)
    {
        return $this->competitionDivisionParticipantRepository->detachParticipant($competitionDivisionId, $participantId);
    }
    public function listParticipantsInDivision($competitionDivisionId)
    {
        return $this->competitionDivisionParticipantRepository->getParticipantsByDivision($competitionDivisionId);
    }
    public function listDivisionForParticipant($participantId)
    {
        return $this->competitionDivisionParticipantRepository->getDivisionsByParticipant($participantId);
    }
}
