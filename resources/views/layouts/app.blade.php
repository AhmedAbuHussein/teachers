<!doctype html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Teachers') }} | @yield('title',"الرئيسية")</title>

    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('images/favicon.png') }}" />
    <link href="{{ asset('site/css/style.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('site/css/mobile.css') }}" rel="stylesheet" type="text/css" />
    @yield('styles')
</head>
<body>
    <!-- Start Header -->
    @include('layouts.partials.site.header')
    @include('layouts.partials.site.mobile')

    <main class="main-content">
        @if (!request()->routeIs('index'))
            <!-- Start Breadcrumb -->
            @include('layouts.partials.site.breadcrumb')
            <!-- End Breadcrumb -->
        @endif
        
        <!-- Start Login-page -->
        @yield('content')
        <!-- End Login-page -->
    </main>

    <!-- Start Footer -->
    @include('layouts.partials.site.footer')
    <!-- End Footer -->

    <script src="{{ asset('site/js/jquery-1.11.0.min.js') }}"></script>
    <script src="{{ asset('site/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('site/js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('site/js/wow.min.js') }}"></script>
    <script src="{{ asset('site/js/jquery.fancybox.js') }}"></script>
    <script src="{{ asset('site/js/jquery.nice-select.min.js') }}"></script>
    <script src="{{ asset('site/js/slick.min.js') }}"></script>
    <script src="{{ asset('site/js/jquery-ui.js') }}"></script>
    <script src="{{ asset('site/js/java.js') }}"></script>
    <script src="{{ asset('js/sweetalert.js') }}"></script>
    @yield('script')

    @if (\Session::has('message'))
    <script>
        $(function() {

            swal({
                title:"{{ \Session::get('title', 'اشعار') }}",
                text:"{{ \Session::get('message') }}",
                icon:"{{ \Session::get('icon') }}"
            });

        })
    </script>
    @endif

    <script>
        function readURL(input,$seleector) {

            if (input.files && input.files[0]) {
                var reader = new FileReader();
    
                reader.onload = function(e) {
                    $($seleector).attr('src', e.target.result);
                }
    
                reader.readAsDataURL(input.files[0]);
          }
        }
    
        $("input[type='file']").change(function() {
            var preview = $(this).siblings('label').children('img.preview');
            readURL(this,preview);
        });
    </script>

</body>
</html>
