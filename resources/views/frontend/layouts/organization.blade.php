@extends('frontend.layouts.app')

@section('content')

@push('style')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
@endpush

<!-- ======= Hero Section ======= -->
@include('frontend.layouts.common.heroheader')
<!-- End Hero -->

<!-- Start #main -->
<main id="main">



    <!-- ======= Team Section ======= -->
    <section id="team" class="team section-bg">
        <div class="container" data-aos="fade-up">

            <div class="section-title">
                <h2>Team</h2>
                <p>Check our Team</p>
            </div>

            <div class="row">

                @foreach ($members as $member)
                <div class="col-lg-4 col-md-6">
                    <div class="member" data-aos="fade-up" data-aos-delay="100">
                        <div class="pic"><img src="{{ asset('assets/uploads/member/'. $member->image) }}"
                                class="img-fluid" alt=""></div>
                        <div class="member-info">
                            <h4>{{$member->name}}</h4>
                            <span>{{$member->designation}}</span>
                            <div class="social">
                                <a href=""><i class="bi bi-twitter"></i></a>
                                <a href=""><i class="bi bi-facebook"></i></a>
                                <a href=""><i class="bi bi-instagram"></i></a>
                                <a href=""><i class="bi bi-linkedin"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>

        </div>
    </section><!-- End Team Section -->

    <!-- ======= Clients Section ======= -->
    <section id="organization" class="clients">
        <div class="container" data-aos="zoom-in">
            <div class="section-title">
                <h2>Partners</h2>
            </div>
            <div class="row">

                @foreach($organizations as $organization)
                <div class="col-lg-2 col-md-4 col-6 d-flex align-items-center justify-content-center">
                    <img src="{{ asset('assets/uploads/organization/'.$organization->image)}}" class="img-fluid" alt="">
                </div>
                @endforeach

            </div>

        </div>
    </section><!-- End Clients Section -->

    <!-- ======= Testimonials Section ======= -->
    <section id="testimonials" class="testimonials">
        <div class="container" data-aos="zoom-in">

            <div class="testimonials-slider swiper" data-aos="fade-up" data-aos-delay="100">
                <div class="swiper-wrapper">
                    @foreach ($members as $member)
                    <div class="swiper-slide">
                        <div class="testimonial-item">
                            <img src="{{ asset('assets/uploads/member/'. $member->image) }}" class="testimonial-img"
                                alt="">
                            <h3>{{$member->name}}</h3>
                            <h4>{{$member->designation}}</h4>
                            <p>
                                <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                                {{$member->message}}
                                <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                            </p>
                        </div>
                    </div><!-- End testimonial item -->
                    @endforeach
                </div>
                <div class="swiper-pagination"></div>
            </div>

        </div>
    </section><!-- End Testimonials Section -->

</main><!-- End #main -->

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
<script>
    flatpickr("input[type=datetime-local]");
</script>
@endpush
@endsection
