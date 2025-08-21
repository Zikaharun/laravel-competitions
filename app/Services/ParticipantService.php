<?php 

namespace App\Services;

use App\Models\Participant;

interface ParticipantService
{
    public function getAll();
    public function findById(string $id);
    public function update(string $id, array $data);
    public function store(array $data): Participant; 
    public function delete(string $id);

}