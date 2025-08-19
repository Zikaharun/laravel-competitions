<?php

namespace App\Repositories\Impl;

use App\Models\Competition;
use App\Repositories\CompetitionRepository;

class CompetitionRepositoryImpl implements CompetitionRepository
{

    public function getAll()
    {
        return Competition::paginate(5, ['*'], 5);
    }
    public function create(array $data)
    {
        return Competition::create($data);
    }
}