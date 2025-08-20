<?php

namespace App\Services\Impl;

use App\Models\CompetitionDivision;
use App\Repositories\CompetitionDivisionRepository;
use App\Services\CompetitionDivisionService;

class CompetitionDivisionServiceImpl implements CompetitionDivisionService
{
    private CompetitionDivisionRepository $competitionDivisionRepository;

    public function __construct(CompetitionDivisionRepository $competitionDivisionRepository)
    {
        $this->competitionDivisionRepository = $competitionDivisionRepository;
    }

    public function getAll()
    {
        return $this->competitionDivisionRepository->getAll();
    }

    public function findById(string $id)
    {
        return $this->competitionDivisionRepository->findById($id);
    }
    public function update(string $id, array $data)
    {
        return $this->competitionDivisionRepository->update($id, $data);
    }
    public function store(array $data): CompetitionDivision
    {
        return $this->competitionDivisionRepository->create($data);
    }
    public function delete(string $id)
    {
        $this->competitionDivisionRepository->delete($id);
    }
}