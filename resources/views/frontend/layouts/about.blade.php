@extends('frontend.layouts.app')

@section('content')

@push('style')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
@endpush


@include('frontend.layouts.common.heroheader')
<!-- Start #main -->
<main id="main">

    <!-- ======= About Section ======= -->
    <section id="about" class="about">
        <div class="container" data-aos="fade-up">
            <div class="row">

                <div class="col-lg-6 video-box align-self-baseline" data-aos="zoom-in" data-aos-delay="100">
                    <img src="{{ asset('frontend/assets/img/about.jpg') }}" class="img-fluid" alt="">
                    <a href="https://www.youtube.com/watch?v=jDDaplaOz7Q" class="glightbox play-btn mb-4"></a>
                </div>

                <div class="col-lg-6 pt-3 pt-lg-0 content">
                    <h3>Voluptatem dignissimos provident quasi corporis voluptates sit assumenda.</h3>
                    <p class="fst-italic">
                        {!!$about->description!!}
                    </p>
                </div>

            </div>

        </div>
    </section><!-- End About Section -->

    <!-- ======= About Boxes Section ======= -->
    <section id="about-boxes" class="about-boxes">
        <div class="container" data-aos="fade-up">

            <div class="row">
                <div class="col-lg-4 col-md-6 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="100">
                    <div class="card">
                        <img src="{{ asset('assets/uploads/mission/'.$mission->image) }}" class="card-img-top"
                            alt="...">
                        <div class="card-icon">
                            <i class="ri-brush-4-line"></i>
                        </div>
                        <div class="card-body">
                            <h5 class="card-title"><a href="">Our Mission</a></h5>
                            <p class="card-text"> {!!$mission->description!!}</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="200">
                    <div class="card">
                        <img src="{{ asset('assets/uploads/plan/'.$plan->image) }}" class="card-img-top" alt="...">
                        <div class="card-icon">
                            <i class="ri-calendar-check-line"></i>
                        </div>
                        <div class="card-body">
                            <h5 class="card-title"><a href="">Our Plan</a></h5>
                            <p class="card-text">{!!$plan->description!!}</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="300">
                    <div class="card">
                        <img src="{{ asset('assets/uploads/vision/'.$vision->image) }}" class="card-img-top" alt="...">
                        <div class="card-icon">
                            <i class="ri-movie-2-line"></i>
                        </div>
                        <div class="card-body">
                            <h5 class="card-title"><a href="">Our Vision</a></h5>
                            <p class="card-text">{!!$vision->description!!}</p>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section><!-- End About Boxes Section -->


</main><!-- End #main -->

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
<script>
    flatpickr("input[type=datetime-local]");
</script>
@endpush
@endsection
