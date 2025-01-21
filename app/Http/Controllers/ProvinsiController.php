<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Provinsi;
class ProvinsiController extends Controller
{
    public function index()
    {
        return view('provinsi');
    }

    public function getData()
    {
        // Ambil semua data provinsi yang diperlukan
        $provinsi = Provinsi::select('name', 'latitude', 'longitude', 'alt_name')->get();
        return response()->json($provinsi);
    }
}
