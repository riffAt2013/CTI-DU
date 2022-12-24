<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>

    @include('admin.layouts.common.head')
</head>

<body>
    <div class="app-container app-theme-white body-tabs-shadow fixed-sidebar fixed-header">
        @include('admin.layouts.common.header')

        <div class="app-main">
            @include('admin.layouts.common.sidebar')

            <div class="app-main__outer">
                @yield('content')
            </div>
        </div>

        @include('admin.layouts.common.footer')
    </div>
{{--    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>--}}
{{--    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>--}}

    <script src="https://code.jquery.com/jquery-3.5.1.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js"></script>
    <script type="text/javascript" src="{{asset('backend/assets/scripts/main.js')}}"></script>


    @stack('scripts')

<script>
    $('.summernote').summernote({
        tabsize: 2,
        height: 200,
        toolbar: [
            ['font', ['bold', 'underline','italic','clear',]],
            ['color', ['color']],
            ['para', ['ul', 'ol', 'paragraph']],
        ]
    });
</script>

</body>

</html>
