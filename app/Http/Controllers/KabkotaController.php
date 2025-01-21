<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kabkota;
class KabkotaController extends Controller
{
    public function index()
    {
        return view('kabkota');
    }

    public function getData()
    {
        $kabkota = Kabkota::with('provinsi') // Mengambil data kabupaten beserta nama provinsi
            ->get()
            ->map(function ($item) {
                return [
                    'name' => $item->name,
                    'alt_name' => $item->alt_name,
                    'latitude' => $item->latitude,
                    'longitude' => $item->longitude,
                    'provinsi_name' => $item->provinsi->name ?? 'Unknown', // Nama provinsi
                ];
            });

        return response()->json($kabkota);
    }
}