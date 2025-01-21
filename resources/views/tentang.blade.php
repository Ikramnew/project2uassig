@extends('layout')

@section('title', 'Tentang Kami')

@section('content')
<section id="about-us" class="about-us section">
    <!-- Section Title -->
    <div class="container section-title" data-aos="fade-up">
        <h2>Tentang Kami</h2>
        <p>Kenali lebih dalam tentang tim kami yang berdedikasi.</p>
    </div><!-- End Section Title -->

    <div class="container">
        <div class="row gy-4">
            @foreach ($teamMembers as $member)
                <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="100">
                    <div class="service-item position-relative card-shadow">
                        <div class="card-body text-center p-4">
                            <div class="icon mb-3">
                                <img src="{{ $member['photo'] }}" class="card-img-top card-img-uniform mb-3" alt="Foto {{ $member['name'] }}">
                            </div>
                            <a href="#" class="stretched-link">
                                <h3 class="h5">{{ $member['name'] }}</h3>
                            </a>
                            <p class="text-muted mb-3">{{ $member['role'] }}</p>
                            <div class="d-flex justify-content-center">
                                <a href="{{ $member['github'] }}" class="btn btn-outline-dark btn-sm me-2" target="_blank">
                                    <i class="fab fa-github"></i>
                                </a>
                                <a href="{{ $member['instagram'] }}" class="btn btn-outline-danger btn-sm" target="_blank">
                                    <i class="fab fa-instagram"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div><!-- End Service Item -->
            @endforeach
        </div>
    </div>
</section><!-- End About Us Section -->
@endsection

@push('styles')
    <style>
        /* Card Styling */
        .service-item {
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            border-radius: 15px;
            background-color: #fff;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
            overflow: hidden; /* Ensures images don't overflow out of the card */
        }

        .service-item:hover {
            transform: translateY(-10px);
            box-shadow: 0 8px 30px rgba(0, 128, 0, 0.2);
        }

        .card-img-uniform {
            object-fit: cover;
            height: 180px; /* Set a uniform height for images */
            border-radius: 8px;
        }

        .card-body {
            padding: 1.5rem;
        }

        .service-item h3 {
            font-size: 1.25rem; /* Adjusts heading font size */
            margin-bottom: 10px;
            font-weight: 600;
        }

        .service-item p {
            font-size: 0.9rem;
            margin-bottom: 15px;
        }

        .btn {
            transition: all 0.3s ease;
        }

        .btn:hover {
            transform: translateY(-3px);
            box-shadow: 0 4px 10px rgba(0, 128, 0, 0.2);
        }
    </style>
@endpush
