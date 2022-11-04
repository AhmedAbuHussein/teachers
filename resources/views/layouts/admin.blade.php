<!DOCTYPE html>
<html dir="rtl" lang="ar">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Favicon icon -->
    <link rel="icon"  href="{{ url('images/favicon.png') }}">
    <title>لوحة التحكم | المشرف</title>

    <!-- Custom CSS -->
    <link href="{{ url('res/dist/css/style.min.css') }}" rel="stylesheet">
    <link href="{{ url('css/datatables.min.css') }}" rel="stylesheet">
    <link href="{{ url('css/multiple-select.css') }}" rel="stylesheet">
    <link href="{{ url('css/font-awesome.min.css') }}" rel="stylesheet">
    <link href="{{ url('color/css/colorpicker.css') }}" rel="stylesheet">
    <link href="{{ url('css/flaticon.css') }}" rel="stylesheet">
    <link href="{{ url('css/simditor.css') }}" rel="stylesheet" />
    <link href="{{ url('css/datetimepicker.css') }}" rel="stylesheet" />
    @yield('style')
    <link rel="stylesheet" href="{{ url('css/admin_rtl.css') }}" />
</head>

<body>
<div id="app">
    <div class="preloader">
        <div class="lds-ripple">
            <div class="lds-pos"></div>
            <div class="lds-pos"></div>
        </div>
    </div>

    <div id="main-wrapper" data-navbarbg="skin6" data-theme="light" data-layout="vertical" data-sidebartype="full" data-boxed-layout="full">

        <header class="topbar" data-navbarbg="skin6">
            <nav class="navbar top-navbar navbar-expand-md navbar-light">
                <div class="navbar-header nav" data-logobg="skin5">

                    <a class="nav-toggler waves-effect waves-light d-block d-md-none" href="javascript:void(0)">
                        <i class="ti-menu ti-close"></i>
                    </a>
                    <div class="navbar-brand">
                        <a href="{{ route('dashboard.index') }}" class="logo">
                            <b class="logo-icon">
 
                                <img style="max-width:200px; " src="{{ url('images/logo.png') }}" alt="Bacura" class="light-logo" />
                            </b>
                        </a>
                    </div>
                   
                    <a class="topbartoggler d-block d-md-none waves-effect waves-light" href="javascript:void(0)" data-toggle="collapse" data-target="#navbarSupportedContent"
                        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <i class="ti-more"></i>
                    </a>
                </div>

                <div class="navbar-collapse collapse" id="navbarSupportedContent" data-navbarbg="skin6">

                    <ul class="navbar-nav ml-auto mr-ar-auto">

                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-muted waves-effect waves-dark pro-pic" href="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <img src="{{ url('images/logo.png') }}" alt="user" class="rounded-circle" width="31"></a>
                            <div class="dropdown-menu dropdown-menu-right user-dd animated dropdown-menu-left-ar">
                                      

                                <a class="dropdown-item" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                              document.getElementById('logout-form').submit();">
                                              <i class="fa fa-sign-out"></i> تسجيل الخروج
                                </a>

                             <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                 @csrf
                             </form>  

                            </div>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>
        
        @include('layouts.partials.side')

        <div class="page-wrapper">
            <div style="min-height: 87vh">

                @include('layouts.partials.breadcrumbs')
                @yield('content')
            </div>
            <footer class="footer text-center">
                جميع الحقوق محفوظة لموقع [<a href="/">Teacher Guides</a>] &copy; {{ date('Y') }}
            </footer>
        </div>
    </div>
</div>


<script src="{{ url('js/app.js') }}"></script>
<script src="{{ url('js/datatables.min.js') }}"></script>
<script src="{{ url('js/sweetalert.js') }}"></script>
<script src="{{ url('js/multiple-select.js') }}"></script>
<script src="{{ url('js/datetimepicker.js') }}"></script>

<script src="{{ url('color/js/colorpicker.js') }}"></script>
<script src="{{ url('color/js/eye.js') }}"></script>
<script src="{{ url('color/js/utils.js') }}"></script>

    @if (\Session::has('message'))
    <script>
        $(function() {

            swal({
                text:"{{ \Session::get('message') }}",
                icon:"{{ \Session::get('icon') }}"
            });

        })
        
    </script>
    @endif


    <script src="{{ url('res/sparkline.js') }}"></script>
    <script src="{{ url('res/waves.js') }}"></script>
    <script src="{{ url('res/sidebarmenu.js') }}"></script>
    <script src="{{ url('res/custom.js') }}"></script>
    <script src="{{ url('js/module.js') }}"></script>
    <script src="{{ url('js/uploader.js') }}"></script>
    <script src="{{ url('js/hotkeys.js') }}"></script>
    <script src="{{ url('js/dompurify.js') }}"></script>
    <script src="{{ url('js/simditor.js') }}"></script>
    <script>
        $(function() {

            $('.confirm').click(function(){
                return confirm("هل انت متاكد من الحذف ؟");
            });

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


            $(".multiSelect").multipleSelect({
                filter: true,
                placeholderText: '-- Select --',
            });
        });
    </script>
    
    @yield('script')

</body>

</html>
