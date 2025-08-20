<?php

namespace App\Repositories;

use App\Models\CompetitionDivision;

interface CompetitionDivisionRepository
{
    public function getAll();

    public function findById(string $id);
    public function update(string $competitionDivision, array $data);
    public function create(array $data);
    public function delete(string $id);
}