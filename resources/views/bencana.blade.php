@extends('layout')

@section('title', 'Daerah Bencana dan Sektor Ekonomi Utama')

@section('content')
<section id="daerah-bencana" class="daerah-bencana section">
    <!-- Section Title -->
    <div class="container section-title" data-aos="fade-up">
        <h2 >Daerah Bencana dan Sektor Ekonomi Utama</h2>
        <p >
            Setiap provinsi di Pulau Jawa diberi warna berdasarkan jumlah kejadian bencana yang terjadi di provinsi tersebut.
        </p>
    </div><!-- End Section Title -->

    <!-- Map and Legend Container -->
    <div class="container">
        <div class="map-container d-flex justify-content-between">
            <div id="map" style="height: 400px; width: 75%;" class="rounded shadow"></div>
            <!-- Legend Container -->
            <div id="legend" style="width: 20%; padding-left: 20px; padding-top: 30px;">
                <div>
                    <i style="background: #FF0000; width: 20px; height: 20px; display: inline-block;"></i> 0 - 50<br>
                    <i style="background: #FF7F00; width: 20px; height: 20px; display: inline-block;"></i> 50 - 200<br>
                    <i style="background: #FFFF00; width: 20px; height: 20px; display: inline-block;"></i> 200 - 500<br>
                    <i style="background: #7FFF00; width: 20px; height: 20px; display: inline-block;"></i> 500 - 1000<br>
                    <i style="background: #00FF00; width: 20px; height: 20px; display: inline-block;"></i> 1000 - 1500<br>
                    <i style="background: #00FFFF; width: 20px; height: 20px; display: inline-block;"></i> 1500 - 2000<br>
                    <i style="background: #0000FF; width: 20px; height: 20px; display: inline-block;"></i> 2000+
                </div>
            </div>
        </div>
    </div>
</section>

<script>
    // Inisialisasi peta
    var map = L.map('map', {
        center: [-7.5, 110], // Fokus awal di Pulau Jawa
        zoom: 7,
        minZoom: 7,
        maxZoom: 10
    });

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
        "Satellite View": satellite,
        "Dark Mode": dark
    };

    L.control.layers(baseMaps).addTo(map);

    // Fungsi warna berdasarkan jumlah bencana
    function getColor(bencana) {
        return bencana <= 50    ? '#FF0000' :  // Merah untuk 0 - 50
               bencana <= 200   ? '#FF7F00' :  // Oranye untuk 50 - 200
               bencana <= 500   ? '#FFFF00' :  // Kuning untuk 200 - 500
               bencana <= 1000  ? '#7FFF00' :  // Hijau untuk 500 - 1000
               bencana <= 1500  ? '#00FF00' :  // Light Hijau untuk 1000 - 1500
               bencana <= 2000  ? '#00FFFF' :  // Biru Muda untuk 1500 - 2000
                                  '#0000FF';   // Biru untuk 2000+
    }

    // Gaya layer
    function style(feature) {
        return {
            fillColor: getColor(feature.properties.bencana),  // Gunakan properti bencana
            weight: 2,
            opacity: 1,
            color: 'white',
            dashArray: '3',
            fillOpacity: 0.7
        };
    }

    // Interaksi layer
    function onEachFeature(feature, layer) {
        layer.bindPopup(`
            <strong>${feature.properties.name}</strong><br>
            Banyak kejadian bencana: ${feature.properties.bencana} Kejadian
        `);
    }

    // Ambil data GeoJSON
    fetch('/assets/js/jawa_population_density.json')  // Pastikan Anda memiliki data GeoJSON yang sesuai
        .then(response => response.json())
        .then(data => {
            L.geoJSON(data, {
                style: style,
                onEachFeature: onEachFeature
            }).addTo(map);
        })
        .catch(error => console.error('Error loading GeoJSON:', error));

</script>

@endsection

@push('styles')
    <style>
        /* Section Title */
        .daerah-bencana .section-title {
            text-align: center;
            margin-bottom: 30px;
        }

        .daerah-bencana .section-title h2 {
            font-size: 2rem;
            font-weight: 700;
            color: #fff;
        }

        .daerah-bencana .section-title p {
            color: #bbb;
            font-size: 1rem;
            margin-top: 10px;
            line-height: 1.5;
        }

        /* Map and Legend Layout */
        .map-container {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
        }

        #map {
            border-radius: 10px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
        }

        /* Legend Styling */
        #legend {
            background: #f8f9fa;
            border-radius: 8px;
            padding: 15px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
        }

        #legend i {
            margin-right: 10px;
        }
    </style>
@endpush
