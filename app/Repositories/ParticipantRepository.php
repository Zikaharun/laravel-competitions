<?php

namespace App\Repositories;

interface ParticipantRepository
{
    public function getAll();

    public function findById(string $id);
    public function update(string $id, array $data);
    public function create(array $data);
    public function delete(string $id);
}