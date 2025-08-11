<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;

class HomeController extends Controller
{
    public function index()
    {
        $articles = Article::all()->map(function($article) {
            return [
                'title' => $article->title,
                'image' => $article->thumbnail ? asset('storage/' . $article->thumbnail) : asset('images/foto-artikel.png'),
                'link' => '/artikel/' . $article->id
            ];
        })->toArray();

        $infoCards = [
            [
                'bg' => 'images/achivers-bg.png',
                'icon' => 'images/icons/achivers.png',
                'title' => 'Achievers Data',
                'route' => 'info.achievers',
            ],
            [
                'bg' => 'images/scholarship-bg.png',
                'icon' => 'images/icons/scholarship.png',
                'title' => 'Scholarship',
                'route' => 'info.scholarship',
            ],
            [
                'bg' => 'images/bootcamp-bg.png',
                'icon' => 'images/icons/bootcamp.png',
                'title' => 'Bootcamp',
                'route' => 'info.bootcamp',
            ],
        ];

        $programs = [
            [
                'bg' => 'images/bg-flip/inkubator-bg.png',
                'icon' => 'images/icons/inkubator.png',
                'title' => 'Inkubator Bisnis',
                'description' => 'Wadah atau program yang memberikan dukungan kepada wirausaha pemula dalam bentuk pelatihan, mentoring, dan jaringan bisnis.',
            ],
            [
                'bg' => 'images/bg-flip/company-bg.png',
                'icon' => 'images/icons/company.png',
                'title' => 'Company Visit',
                'description' => 'Kunjungan kepada suatu perusahaan atau tempat usaha untuk mengetahui bagaimana alur kerja di perusahaan tersebut',
            ],
            [
                'bg' => 'images/bg-flip/content-bg.png',
                'icon' => 'images/icons/content.png',
                'title' => 'Content Planner',
                'description' => 'Membuat strategi atau perancanaan  untuk membranding media sosial HIPMI PT UPI CIBIRU.',
            ],
            [
                'bg' => 'images/bg-flip/kaderisasi-bg.png',
                'icon' => 'images/icons/kaderisasi.png',
                'title' => 'Kaderisasi',
                'description' => 'Merupakan Kegiatan berisi pemberian muatan pengenalan HIPMI, dari soft skill pengusaha, dan materi lainnya yang telah disusun oleh divisi HRD HIPMI PT UPI CIBIRU.',
            ],
            [
                'bg' => 'images/bg-flip/upgrading-bg.png',
                'icon' => 'images/icons/upgrading.png',
                'title' => 'Upgrading',
                'description' => 'Kegiatan internal yang diselenggarakan sebagai bentuk penguatan kapasitas dan penyelarasan visi dan misi antar pengurus dan anggota baru HIPMI PT UPI CIBIRU.',
            ],
            [
                'bg' => 'images/bg-flip/stuban-bg.png',
                'icon' => 'images/icons/stuban.png',
                'title' => 'Studi Banding',
                'description' => 'Kegiatan kunjungan organisasi HIPMI PT UPI CIBIRU ke kampus lain atau HIPMI PT lain untuk mempelajari sistem kerja, program unggulan, struktur organisasi, dan model kewirausahaan yang telah terbukti sukses.',
            ],
        ];

        return view('home', [
            'title' => 'Dashboard - HIMPI Portofolio',
            'articles' => $articles,
            'infoCards' => $infoCards,
            'programs' => $programs
        ]);
    }
}
