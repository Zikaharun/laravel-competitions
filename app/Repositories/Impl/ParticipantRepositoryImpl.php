<?php

namespace App\Repositories\Impl;

use App\Models\Participant;
use App\Repositories\ParticipantRepository;

class ParticipantRepositoryImpl implements ParticipantRepository
{
    public function getAll()
    {
        return Participant::paginate(5);
    }

    public function findById(string $id)
    {
        return Participant::where('id', $id)->first();
    }
    public function update(string $id, array $data)
    {
        $participants = $this->findById($id);
        $participants->update($data);

        return $participants;
    }
    public function create(array $data)
    {
        return Participant::create($data);
    }
    public function delete(string $id)
    {
        $participants = $this->findById($id);

        return $participants->delete();
    }

}