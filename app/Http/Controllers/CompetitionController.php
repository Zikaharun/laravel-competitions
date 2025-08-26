<?php

namespace App\Http\Controllers;

use App\Services\CompetitionService;
use Illuminate\Http\Request;

class CompetitionController extends Controller
{
    //
    protected CompetitionService $competitionService;

    public function __construct(CompetitionService $competitionService)
    {
        $this->competitionService = $competitionService;
    }

    public function index()
    {
        $competitions = $this->competitionService->getAll();
        return view('admin.competitions.index', compact('competitions'));
    }

    public function create()
    {
        return view('admin.competitions.index');
    }

    public function store(Request $request)
    {
        \Log::info('CompetitionController@store called', ['request' => $request->all()]);

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'start' => 'nullable|date',
            'end'   => 'nullable|date|after_or_equal:start',

        ]);

        \Log::info('CompetitionController@store validated data', ['validated' => $validated]);

        $this->competitionService->store($validated);

        \Log::info('CompetitionController@store finished storing competition');

        return redirect()->route('admin.competitions.index')
                            ->with('success', 'Competition created successfully!');
    }

    public function edit($id)
    {
        $competitions = $this->competitionService->findById($id);
        return view('admin.competitions.edit', compact('competitions'));
    }

    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'name'=> 'required|string|max:255',
            'description' => 'nullable|string',
            'start' => 'nullable|date',
            'end'   => 'nullable|date|after_or_equal:start',

        ]);

        $this->competitionService->update($id, $validated);

        return redirect()->route('admin.competitions.index')
                        ->with('success', 'Competition updated successfully!');
    }

    public function destroy($id)
    {
        $this->competitionService->delete($id);

        return redirect()->route('admin.competitions.index')->with('success', 'Competition deleted successfully!');
    }

    


}
