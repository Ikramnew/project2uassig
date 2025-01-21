<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TentangKamiController extends Controller
{
    public function index()
    {
        // Data tim (4 orang)
        $teamMembers = [
            [
                'photo' => asset('assets/ikram.jpg'),
                'name' => 'Muhammad Ikram J',
                'role' => 'Frontend Developer',
                'github' => 'https://github.com/ikramdev',
                'instagram' => 'https://instagram.com/ikramdev'
            ],
            [
                'photo' =>asset('assets/syafa.jpeg') ,
                'name' => 'As-Syafa Putri',
                'role' => 'UI/UX Designer',
                'github' => 'https://github.com/aisyahdesign',
                'instagram' => 'https://instagram.com/aisyahdesign'
            ],
            [
                'photo' => asset('assets/wahyu.jpeg'),
                'name' => 'Muhammad Wahyu Aigi',
                'role' => 'Backend Developer',
                'github' => 'https://github.com/budipratama',
                'instagram' => 'https://instagram.com/budipratama'
            ],
            [
                'photo' => asset('assets/nadya.jpeg'),
                'name' => 'Nadya Aisyah Andriani',
                'role' => 'Data Analyst',
                'github' => 'https://github.com/fitrihandayani',
                'instagram' => 'https://instagram.com/fitrihandayani'
            ],
        ];

        // Kirim data ke view
        return view('tentang', compact('teamMembers'));
    }
}
