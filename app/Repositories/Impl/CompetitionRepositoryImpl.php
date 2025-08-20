<?php

namespace App\Repositories\Impl;

use App\Models\Competition;
use App\Repositories\CompetitionRepository;

class CompetitionRepositoryImpl implements CompetitionRepository
{

    public function getAll()
    {
        return Competition::paginate(5);
    }

    public function findById(string $id)
    {
        return Competition::where('id',$id)->first();
    }

    public function update(string $id, array $data)
    {
        $competition = $this->findById($id);
        
        $competition->update($data);
        return $competition;
    }
    public function create(array $data)
    {
        return Competition::create($data);
    }
    public function delete(string $id)
    {
        $competition = $this->findById($id);
        return $competition->delete();
    }
}