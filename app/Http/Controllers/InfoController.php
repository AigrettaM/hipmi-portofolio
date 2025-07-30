<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class InfoController extends Controller
{
    public function achievers(){
        $achievers = [
            'images/achivers-carousel.png',
            'images/achivers-carousel.png',
            'images/achivers-carousel.png',
            'images/achivers-carousel.png',
            'images/achivers-carousel.png',
            'images/achivers-carousel.png',
            'images/achivers-carousel.png',
            'images/achivers-carousel.png'
        ];

        return view('achievers', [
            'title' => 'Achievers - HIMPI Portofolio',
            'achievers' => $achievers
        ]);
    }

    public function scholarship(){
        $scholarshipCards = [
            [
                'image' => 'images/scholarship-example.jpg',
                'name' => 'Grab Indonesia Program Beasiswa GrabScholar 2025',
                'desc' => 'Untuk terus mendukung generasi muda menggapai cita-cita lewat akses pendidikan yang merata, program Beasiswa GrabScholar hadir kembali dengan membuka peluang lebih besar bagi para putra/putri Mitra.
                            Pada tahun 2025 ini, Grab bersama BenihBaik.com menghadirkan jumlah kuota penerima beasiswa yang meningkat hingga 2 kali lebih banyak. 
                            Kami berharap, kabar baik ini bisa menjadi kesempatan emas bagi para putra/putri Mitra untuk terus mengejar pendidikan setinggi-tingginya. ',
            ],
        ];

        return view('scholarship', [
            'title' => 'Scholarship - HIMPI Portofolio',
            'scholarshipCards' => $scholarshipCards
        ]);
    }

    public function bootcamp(){
        $bootcampCards = [
            [
                'image' => 'images/scholarship-example.jpg',
                'name' => 'Grab Indonesia Program Beasiswa GrabScholar 2025',
                'desc' => 'Untuk terus mendukung generasi muda menggapai cita-cita lewat akses pendidikan yang merata, program Beasiswa GrabScholar hadir kembali dengan membuka peluang lebih besar bagi para putra/putri Mitra.
                            Pada tahun 2025 ini, Grab bersama BenihBaik.com menghadirkan jumlah kuota penerima beasiswa yang meningkat hingga 2 kali lebih banyak. 
                            Kami berharap, kabar baik ini bisa menjadi kesempatan emas bagi para putra/putri Mitra untuk terus mengejar pendidikan setinggi-tingginya. ',
            ],
        ];

        return view('bootcamp', [
            'title' => 'Bootcamp - HIMPI Portofolio',
            'bootcampCards' => $bootcampCards
        ]);
    }
}
