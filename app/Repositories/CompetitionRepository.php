<?php 

namespace App\Repositories;

use App\Models\Competition;

interface CompetitionRepository
{
    public function getAll();
    public function create(array $data);
}