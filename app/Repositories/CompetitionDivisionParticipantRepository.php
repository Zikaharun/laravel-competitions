<?php

namespace App\Repositories;

interface CompetitionDivisionParticipantRepository
{
    public function attachParticipant(string $competitionDivisionId, string $participantId);
    public function detachParticipant(string $competitionDivisionId, string $participantId);
    public function getParticipantsByDivision(string $competitionDivisionId);
    public function getDivisionsByParticipant(string $participantId);
}