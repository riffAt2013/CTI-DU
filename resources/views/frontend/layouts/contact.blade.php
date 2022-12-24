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


        <!-- ======= Contact Section ======= -->
        <section id="contact" class="contact">
            <div class="container" data-aos="fade-up">

                <div class=" section-title">
                    <h2>Contact</h2>
                    <p>Contact Us</p>
                </div>

                <div class="row">

                    <div class="col-lg-6">

                        <div class="row">
                            <div class="col-12">
                                <div class="info-box">
                                    <i class="bx bx-map"></i>
                                    <h3>Our Address</h3>
                                    <div id="map" style='height:400px'></div>
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="col-lg-6 mt-4 mt-lg-0">
                        <form action="{{route('public.contactStore')}}" method="post" role="form" >
                            @csrf
                            <div class="row">
                                <div class="col-md-6 form-group">
                                    <input type="text" name="name" class="form-control" id="name" placeholder="Your Name"
                                           required>
                                </div>
                                <div class="col-md-6 form-group mt-3 mt-md-0">
                                    <input type="email" class="form-control" name="email" id="email"
                                           placeholder="Your Email" required>
                                </div>
                            </div>
                            <div class="form-group mt-3">
                                <input type="text" class="form-control" name="address" id="address" placeholder="address"
                                       required>
                            </div>
                            <div class="form-group mt-3">
                                <input type="text" class="form-control" name="phone" id="phone" placeholder="phone"
                                       required>
                            </div>
                            <div class="form-group mt-3">
                            <textarea class="form-control" name="message" rows="5" placeholder="Message"
                                      required></textarea>
                            </div>
                            @include('sweetalert::alert')
                            <div class="my-3">
                                <div class="text-center"><button type="submit" class="btn btn-warning">Send Message</button></div>
                            </div>
                        </form>
                    </div>

                </div>

            </div>
        </section><!-- End Contact Section -->

    </main><!-- End #main -->

    @push('scripts')
        <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
        <script>
            flatpickr("input[type=datetime-local]");
        </script>
        <script type="text/javascript">
            function initializeMap() {
                const locations = <?php echo json_encode($locations) ?>;

                const map = new google.maps.Map(document.getElementById("map"));
                var infowindow = new google.maps.InfoWindow();
                var bounds = new google.maps.LatLngBounds();
                for (var location of locations) {
                    var marker = new google.maps.Marker({
                        position: new google.maps.LatLng(location.lat, location.lng),
                        map: map
                    });
                    bounds.extend(marker.position);
                    google.maps.event.addListener(marker, 'click', (function(marker, location) {
                        return function() {
                            infowindow.setContent(location.lat + " & " + location.lng);
                            infowindow.open(map, marker);
                        }
                    })(marker, location));

                }
                map.fitBounds(bounds);
            }
        </script>

        <script type="text/javascript" src="https://maps.google.com/maps/api/js?key={{ env('GOOGLE_MAPS_API_KEY') }}&callback=initializeMap"></script>
    @endpush
@endsection
