<?php

namespace App\Repositories\Impl;

use App\Models\CompetitionDivision;
use App\Repositories\CompetitionDivisionRepository;

class CompetitionDivisionRepositoryImpl implements CompetitionDivisionRepository
{
    public function getAll()
    {
        return CompetitionDivision::with(['user', 'competition'])->paginate(5);
    }

    public function findById(string $id)
    {
        return CompetitionDivision::with(['user', 'competition'])->findOrFail($id);
    }
    public function update(string $id, array $data)
    {
        $competitionDivison = $this->findById($id);
        $competitionDivison->update($data);
        return $competitionDivison;
    }
    public function create(array $data)
    {
        return CompetitionDivision::create($data);
    }
    public function delete(string $id)
    {
        $competitionDivision = $this->findById($id);
        return $competitionDivision->delete();
    }
}