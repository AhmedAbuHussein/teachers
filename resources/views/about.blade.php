@extends('layouts.app')
@section("title")
    عن الموقع
@endsection
@section('breadcrumb')
    <li> 
        <span>عن الموقع</span>
    </li>
@endsection

@section('content')

<section class="about-page body-inner">
    <div class="container">
        <div class="row">
            <!-- Col -->
            <div class="col-md-6 col-sm-12">
                <div class="text-about">
                    <h3>{{ $about->about_title }}</h3>
                    <p>{{ $about->short_desc }}</p>
                    <p> {{ $about->about_text }}</p>
                </div>
            </div>
            <!-- /Col -->

            <!-- Col -->
            <div class="col-md-6 col-sm-12">
                <div class="img-about">
                    <div class="img">
                        <img src="{{ $about->about_image ? Storage::url($about->about_image): asset('images/logo.png') }}" alt="#" />
                    </div>
                </div>
            </div>
            <!-- /Col -->
        </div>

        
    </div>
</section>


<!-- Start Special-h -->
<section class="special-h">
    <div class="container">
        <div class="row">
            <!-- Col -->
            <div class="col-md-4 col-sm-12">
                <div class="special-block">
                    <div class="icon">
                        <i class="las la-award"></i>
                    </div>
                    <div class="details">
                        <h3>افضل المعلمين في انحاء الدولة</h3>
                    </div>
                </div>
            </div>
            <!-- /Col -->
            <!-- Col -->
            <div class="col-md-4 col-sm-12">
                <div class="special-block">
                    <div class="icon">
                        <i class="las la-couch"></i>
                    </div>
                    <div class="details">
                        <h3>سهولة الحصول علي الخدمات للمعلمين</h3>
                    </div>
                </div>
            </div>
            <!-- /Col -->
            <!-- Col -->
            <div class="col-md-4 col-sm-12">
                <div class="special-block">
                    <div class="icon">
                        <i class="las la-headset"></i>
                    </div>
                    <div class="details">
                        <h3>افضل خدمة تواصل</h3>
                    </div>
                </div>
            </div>
            <!-- /Col -->
        </div>
    </div>
</section>
<!-- End Special-h -->

@endsection
