<?php

namespace App\Http\Controllers;

use App\Models\Team;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TeamController extends Controller
{
    /**
     * Display a listing of the team members
     */
    public function index()
    {
        $teams = Team::all();
        return view('laman_admin.team', compact('teams'));
    }

    /**
     * Show the form for creating a new team member
     */
    public function create()
    {
        return view('laman_admin.add_team');
    }

    /**
     * Store a newly created team member in storage
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:100',
            'position' => 'required|string|max:100',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $photo_url = null;
        if ($request->hasFile('foto')) {
            $photo_url = $request->file('foto')->store('team', 'public');
        }

        Team::create([
            'name' => $validated['name'],
            'position' => $validated['position'],
            'photo_url' => $photo_url,
        ]);

        return redirect()->route('admin.team')
            ->with('success', 'Data team berhasil ditambahkan!');
    }

    /**
     * Show the form for editing the specified team member
     */
    public function edit($id)
    {
        $team = Team::findOrFail($id);
        return view('laman_admin.add_team', compact('team'));
    }

    /**
     * Update the specified team member in storage
     */
    public function update(Request $request, $id)
    {
        $team = Team::findOrFail($id);
        
        $validated = $request->validate([
            'name' => 'required|string|max:100',
            'position' => 'required|string|max:100',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->hasFile('foto')) {
            // Delete old photo if exists
            if ($team->photo_url) {
                Storage::disk('public')->delete($team->photo_url);
            }
            $team->photo_url = $request->file('foto')->store('team', 'public');
        }

        $team->update([
            'name' => $validated['name'],
            'position' => $validated['position'],
            'photo_url' => $team->photo_url,
        ]);

        return redirect()->route('admin.team')
            ->with('success', 'Data team berhasil diupdate!');
    }

    /**
     * Remove the specified team member from storage
     */
    public function destroy($id)
    {
        $team = Team::findOrFail($id);
        
        if ($team->photo_url) {
            Storage::disk('public')->delete($team->photo_url);
        }
        
        $team->delete();
        
        return redirect()->route('admin.team')
            ->with('success', 'Data team berhasil dihapus!');
    }
}
