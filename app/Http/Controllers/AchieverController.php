<?php

namespace App\Http\Controllers;

use App\Models\Achiever;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AchieverController extends Controller
{
    /**
     * Display a listing of the achievers
     */
    public function index()
    {
        $achievers = Achiever::all();
        return view('laman_admin.achievers', compact('achievers'));
    }

    /**
     * Show the form for creating a new achiever
     */
    public function create()
    {
        return view('laman_admin.add_achievers');
    }

    /**
     * Store a newly created achiever in storage
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'foto' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $photo_url = $request->file('foto')->store('achievers', 'public');

        Achiever::create([
            'photo_url' => $photo_url,
        ]);

        return redirect()->route('admin.achievers')
            ->with('success', 'Data achiever berhasil ditambahkan!');
    }

    /**
     * Show the form for editing the specified achiever
     */
    public function edit($id)
    {
        $achiever = Achiever::findOrFail($id);
        return view('laman_admin.add_achievers', compact('achiever'));
    }

    /**
     * Update the specified achiever in storage
     */
    public function update(Request $request, $id)
    {
        $achiever = Achiever::findOrFail($id);
        
        $validated = $request->validate([
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->hasFile('foto')) {
            // Delete old photo if exists
            if ($achiever->photo_url) {
                Storage::disk('public')->delete($achiever->photo_url);
            }
            $achiever->photo_url = $request->file('foto')->store('achievers', 'public');
        }

        $achiever->update([
            'photo_url' => $achiever->photo_url,
        ]);

        return redirect()->route('admin.achievers')
            ->with('success', 'Data achiever berhasil diupdate!');
    }

    /**
     * Remove the specified achiever from storage
     */
    public function destroy($id)
    {
        $achiever = Achiever::findOrFail($id);
        
        if ($achiever->photo_url) {
            Storage::disk('public')->delete($achiever->photo_url);
        }
        
        $achiever->delete();
        
        return redirect()->route('admin.achievers')
            ->with('success', 'Data achiever berhasil dihapus!');
    }
} 