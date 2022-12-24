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


    <!-- ======= Services Section ======= -->
    <section id="services" class="services section-bg">
        <div class="container" data-aos="fade-up">
            <div class="section-title">
                <h2>Research</h2>
                <p>Completed Research</p>
            </div>

            <div class="row" data-aos="fade-up" data-aos-delay="200">
                @foreach($completedresearches as $completedresearch)
                <div class="col-md-6 mt-4 mt-md-0">
                    <div class="icon-box">
                        <i class="bi bi-clock"></i>
                        <h4><a href="#">{{$completedresearch->title}}</a></h4>
                        <p>{!!$completedresearch->description!!}</p>
                    </div>
                </div>
                @endforeach
            </div>

        </div>
    </section><!-- End Services Section -->





</main><!-- End #main -->

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
<script>
    flatpickr("input[type=datetime-local]");
</script>
@endpush
@endsection