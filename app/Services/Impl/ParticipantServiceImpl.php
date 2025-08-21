<?php 
namespace App\Services\Impl;

use App\Models\Participant;
use App\Repositories\ParticipantRepository;
use App\Services\ParticipantService;

class ParticipantServiceImpl implements ParticipantService
{
        private ParticipantRepository $participantRepository;

    public function __construct(ParticipantRepository $participantRepository)
    {
        $this->participantRepository = $participantRepository;
    }

    public function getAll()
    {
        return $this->participantRepository->getAll();
    }

    public function findById(string $id)
    {
        return $this->participantRepository->findById($id);
    }

    public function update(string $id, array $data)
    {

        
        return $this->participantRepository->update($id,$data);
    }
    
    public function store(array $data): Participant
    {
        return $this->participantRepository->create($data);
    }

    public function delete(string $id)
    {
        return $this->participantRepository->delete($id);
    }
}