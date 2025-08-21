<?php

namespace App\Http\Controllers;

use App\Services\ParticipantService;
use Illuminate\Http\Request;

class ParticipantController extends Controller
{
    //
    private ParticipantService $participantsService;
    
    public function __construct(ParticipantService $participantsService)
    {
        $this->participantsService = $participantsService;
    }

    public function index()
    {
        $participants = $this->participantsService->getAll();
        return view('users.participants.index', compact('participants'));
    }
}
