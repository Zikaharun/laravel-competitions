<?php

namespace App\Http\Controllers;

use App\Models\CompetitionDivision;
use App\Models\CompetitionDivisionParticipant;
use App\Models\Participant;
use App\Services\CompetitionDivisionParticipantService;
use App\Services\ParticipantService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ParticipantController extends Controller
{
    //
    private ParticipantService $participantsService;
    private CompetitionDivisionParticipantService $competitionDivisionParticipantService;
    
    public function __construct(ParticipantService $participantsService, CompetitionDivisionParticipantService $competitionDivisionParticipantService)
    {
        $this->participantsService = $participantsService;
        $this->competitionDivisionParticipantService = $competitionDivisionParticipantService;
    }

    public function index()
    {
         $user = Auth::user();

    // Ambil division milik user + participants
    $division = CompetitionDivision::with(['participants','competition'])
        ->where('user_id', $user->id)
        ->first();

    // Kalau ada division, ambil participants-nya, kalau nggak kosongkan array
    $participants = $division ? $division->participants : collect();

    return view('users.participants.index', compact('participants', 'division'));
    }

    public function create()
    {
        return view('users.participants.index');
    }

    public function store(Request $request)
    {
    $user = Auth::user();

    // Ambil divisi milik user
    $division = CompetitionDivision::where('user_id', $user->id)->first();

    if (!$division) {
        return redirect()->back()->with('error', 'Anda belum memiliki divisi.');
    }

    // Validasi data participant
    $validated = $request->validate([
        'name' => 'required|string|max:255',
        'rt' => 'nullable|string|max:50',
        'ranking' => 'nullable|integer',
    ]);

    // Simpan participant baru
    $participant = Participant::create([
        'name' => $validated['name'],
        'rt' => $validated['rt'] ?? null,
        'ranking' => $validated['ranking'] ?? null,
    ]);

    // Hubungkan participant ke divisi menggunakan repository
    $this->competitionDivisionParticipantService->addParticipantToDivision($division->id, $participant->id);

    return redirect()->route('participants.index')
                     ->with('success', 'Participant berhasil ditambahkan ke divisi Anda.');

    }

    public function edit(string $id)
    {
        $participants = $this->participantsService->findById($id);
        return view('users.participants.edit', compact('participants'));
    }

    public function update(Request $request, string $id)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'rt' => 'required|string|max:10',
            'ranking' => 'nullable|integer'
        ]);

        $this->participantsService->update($id, $data);

        return redirect()->route('participants.index')->with('success', 'Participants has been updated!');
    }

    public function destroy($id)
    {
        $this->participantsService->delete($id);

        return redirect()->route('participants.index')->with('success', 'Participants deleted successfully!');
    }
}
