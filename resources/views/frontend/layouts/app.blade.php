<!DOCTYPE html>
<html lang="en">

@include('frontend.layouts.common.head')
@stack('style')
<body>

<!-- ======= Header ======= -->

@include('frontend.layouts.common.header')
<!-- End Header -->

<div>
    @yield('content')
</div>

<!-- ======= Footer ======= -->
@include('frontend.layouts.common.footer')
<!-- End Footer -->

<div id="preloader"></div>
<a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

<!-- Vendor JS Files -->
<script src="{{asset('frontend/assets/vendor/purecounter/purecounter_vanilla.js')}}"></script>
<script src="{{asset('frontend/assets/vendor/aos/aos.js')}}"></script>
<script src="{{asset('frontend/assets/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('frontend/assets/vendor/glightbox/js/glightbox.min.js')}}"></script>
<script src="{{asset('frontend/assets/vendor/isotope-layout/isotope.pkgd.min.js')}}"></script>
<script src="{{asset('frontend/assets/vendor/swiper/swiper-bundle.min.js')}}"></script>
<script src="{{asset('frontend/assets/vendor/php-email-form/validate.js')}}"></script>

<!-- Template Main JS File -->
<script src="{{asset('frontend/assets/js/main.js')}}"></script>
@stack('scripts')

</body>

</html>
