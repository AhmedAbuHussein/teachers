<section class="breadcrumb">
    <div class="img-overlay">
        <img src="{{ asset('site/images/slider.jpg') }}" alt="#" />
    </div>
    <div class="container">
        <div class="row">
            <!-- Col -->
            <div class="col-md-12">
                <div class="text-bread">
                    <h3>@yield('title')</h3>
                    <ul>
                        <li>
                            <a href="{{ route('index') }}">الرئيسية</a>
                        </li>
                       @yield('breadcrumb')
                    </ul>
                </div>
            </div>
            <!-- /Col -->
        </div>
    </div>
</section>