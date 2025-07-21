<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function index()
    {
        $members = [
            [
                'name' => 'Lorem Ipsum',
                'image' =>  asset('images/dummy-profile.png'),
                'position'  => 'Anggota'
            ],
            [
                'name' => 'Lorem Ipsum',
                'image' =>  asset('images/dummy-profile.png'),
                'position'  => 'Anggota'
            ],
            [
                'name' => 'Lorem Ipsum',
                'image' =>  asset('images/dummy-profile.png'),
                'position'  => 'Anggota'
            ],
            [
                'name' => 'Lorem Ipsum',
                'image' =>  asset('images/dummy-profile.png'),
                'position'  => 'Anggota'
            ],
            [
                'name' => 'Lorem Ipsum',
                'image' =>  asset('images/dummy-profile.png'),
                'position'  => 'Anggota'
            ],
            [
                'name' => 'Lorem Ipsum',
                'image' =>  asset('images/dummy-profile.png'),
                'position'  => 'Anggota'
            ],
            [
                'name' => 'Lorem Ipsum',
                'image' =>  asset('images/dummy-profile.png'),
                'position'  => 'Anggota'
            ],
        ];

        return view('about', [
            'title' => 'About - HIMPI Portofolio',
            'members' => $members
        ]);
    }
}
