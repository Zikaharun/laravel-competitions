<?php

namespace App\Services\Impl;

use App\Models\Competition;
use App\Repositories\CompetitionRepository;
use App\Services\CompetitionService;

class CompetitionServiceImpl implements CompetitionService
{
    private CompetitionRepository $competitionRepository;

    public function __construct(CompetitionRepository $competitionRepository)
    {
        $this->competitionRepository = $competitionRepository;
    }

    public function getAll()
    {
        return $this->competitionRepository->getAll();
    }
    
    public function store(array $data): Competition
    {
        return $this->competitionRepository->create($data);
    }
}