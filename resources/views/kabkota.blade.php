@extends('layout')

@section('title', 'Kabupaten/Kota')

@section('content')
<section id="kabupaten-kota" class="kabupaten-kota section">
    <!-- Section Title -->
    <div class="container section-title" data-aos="fade-up">
        <h2 >Peta Kabupaten/Kota</h2>
        <p class=" text-center">
            Peta ini menampilkan lokasi setiap Kabupaten/Kota di Indonesia. Anda dapat mengganti mode tampilan peta antara OpenStreetMap, Satellite View, dan Dark Mode menggunakan kontrol peta.
        </p>
    </div><!-- End Section Title -->

    <!-- Map Container -->
    <div class="container mb-5">
        <div id="map" style="height: 500px;" class="rounded shadow"></div>
    </div>
</section>

<script>
    // Inisialisasi Peta
    var map = L.map('map', {
        center: [-2.5489, 118.0149], // Fokus ke Indonesia
        zoom: 5,                    // Zoom awal
        minZoom: 5                  // Zoom minimal
    });

    // Opsi Tile Layer
    var osm = L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        maxZoom: 19,
        attribution: '© OpenStreetMap contributors'
    });

    var satellite = L.tileLayer('https://{s}.tile.opentopomap.org/{z}/{x}/{y}.png', {
        maxZoom: 17,
        attribution: '© OpenTopoMap contributors'
    });

    var dark = L.tileLayer('https://{s}.basemaps.cartocdn.com/dark_all/{z}/{x}/{y}{r}.png', {
        maxZoom: 19,
        attribution: '© CartoDB contributors'
    });

    // Tambahkan OSM sebagai default
    osm.addTo(map);

    // Layer Control untuk Pilihan Peta
    var baseMaps = {
        "OpenStreetMap": osm,
        "Satellite": satellite,
        "Dark Mode": dark
    };

    L.control.layers(baseMaps).addTo(map);

    // Ambil Data Kabupaten/Kota dari Server
    fetch('/api/kabkota')
        .then(response => response.json())
        .then(data => {
            data.forEach(kabkota => {
                // Tambahkan Marker untuk Kabupaten/Kota
                L.marker([kabkota.latitude, kabkota.longitude])
                    .addTo(map)
                    .bindPopup(`
                        <b>${kabkota.name}</b><br>
                        Provinsi: ${kabkota.provinsi_name}<br>
                        Alt Name: ${kabkota.alt_name}
                    `);
            });
        })
        .catch(error => console.error('Error fetching data:', error));
</script>
@endsection

@push('styles')
    <style>
        /* General Section Styling */
        .kabupaten-kota .section-title {
            text-align: center;
            margin-bottom: 30px;
        }

        .kabupaten-kota .section-title h2 {
            font-size: 2rem;
            font-weight: 700;
            color: #fff;
        }

        .kabupaten-kota .section-title p {
            color: #bbb;
            font-size: 1rem;
            margin-top: 10px;
            line-height: 1.5;
        }

        /* Map Container */
        #map {
            border-radius: 10px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
        }
    </style>
@endpush
