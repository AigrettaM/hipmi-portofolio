<?php

namespace App\Http\Controllers;

use App\Models\Achiever;
use App\Models\Article;
use App\Models\Bootcamp;
use App\Models\Scholarship;
use Illuminate\Http\Request;

class InfoController extends Controller
{
    /**
     * Display achievers page
     */
    public function achievers()
    {
        $achievers = Achiever::all()->pluck('photo_url')->map(function($photo_url) {
            return asset('storage/' . $photo_url);
        });

        return view('achievers', [
            'title' => 'Achievers - HIMPI Portofolio',
            'achievers' => $achievers
        ]);
    }

    /**
     * Display scholarship page
     */
    public function scholarship()
    {
        $scholarshipCards = Scholarship::all()->map(function($scholarship) {
            return [
                'image' => $scholarship->image_url ? asset('storage/' . $scholarship->image_url) : asset('images/scholarship-example.jpg'),
                'name' => $scholarship->title,
                'desc' => $scholarship->description,
                'link' => $scholarship->link,
            ];
        })->toArray();

        return view('scholarship', [
            'title' => 'Scholarship - HIMPI Portofolio',
            'scholarshipCards' => $scholarshipCards
        ]);
    }

    /**
     * Display bootcamp page
     */
    public function bootcamp()
    {
        $bootcampCards = Bootcamp::all()->map(function($bootcamp) {
            return [
                'image' => $bootcamp->image_url ? asset('storage/' . $bootcamp->image_url) : asset('images/bootcamp-bg.png'),
                'name' => $bootcamp->title,
                'desc' => $bootcamp->description,
                'link' => $bootcamp->link,
            ];
        })->toArray();

        return view('bootcamp', [
            'title' => 'Bootcamp - HIMPI Portofolio',
            'bootcampCards' => $bootcampCards
        ]);
    }

    /**
     * Display article detail page
     */
    public function artikelDetail($id)
    {
        $article = Article::findOrFail($id);
        
        return view('artikel-detail', [
            'title' => $article->title . ' - HIMPI Portofolio',
            'article' => $article
        ]);
    }
}
