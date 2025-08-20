<?php

namespace App\Services;

use App\Models\CompetitionDivision;

interface CompetitionDivisionService
{
    public function getAll();
    public function findById(string $id);
    public function update(string $id, array $data);
    public function store(array $data): CompetitionDivision; 
    public function delete(string $id);
}