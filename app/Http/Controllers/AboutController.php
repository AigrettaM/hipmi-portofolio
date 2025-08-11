<?php

namespace App\Http\Controllers;

use App\Models\Team;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    /**
     * Display the about page
     */
    public function index()
    {
        $teams = Team::all();
        
        return view('about', [
            'title' => 'About - HIMPI Portofolio',
            'teams' => $teams
        ]);
    }
}
