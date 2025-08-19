<?php

namespace App\Services;

use App\Models\Competition;

interface CompetitionService
{
    public function getAll();
   public function store(array $data): Competition; 
}