@extends('layouts.app')

@section('content')

<section class="slider-h" id="topHeader">
    <div class="home-slider owl-carousel owl-theme">
        <!-- Item -->
        <div class="item">
            <div class="slider-block">
                <div class="img-slider">
                    <img src="{{ asset('site/images/slider.jpg') }}" alt="" />
                </div>
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="text-slider">
                                <h4>موقع دليلي</h4>
                                <h1>دليل المعلم</h1>
                                <p>{{ $setting->short_desc }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /Item -->
        <!-- Item -->
        <div class="item item2 item3">
            <div class="slider-block">
                <div class="img-slider">
                    <img src="{{ asset('site/images/slider3.jpg') }}" alt="#" />
                </div>
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="text-slider">
                                <h2>دليل المعلم</h2>
                                <p>{{ $setting->short_desc }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /Item -->
    </div>
</section>
<!-- End Slider-h -->


<!-- Start New-arrival -->
<section class="new-arrival">
    <div class="container">
        <div class="row">
            <!-- Col -->
            <div class="col-md-6">
                <div class="title">
                    <h3>المنتجات</h3>
                </div>
            </div>
            <!-- /Col -->

            <!-- Col -->
            <div class="col-md-6">
                <div class="more-products">
                    <a href="{{ route('products.index') }}">
                        عرض المزيد
                        <i class="la la-angle-left"></i>
                    </a>
                </div>
            </div>
            <!-- /Col -->

            <!-- Col -->
            <div class="col-md-12">
                <div class="all-pro row">
                    @forelse ($products as $item)
                    <!-- Col -->
                    <div class="col-md-3 col-sm-6">
                        <div class="pro-block">
                            <div class="img-block">
                                <a href="{{ route('products.show', $item->id) }}" class="img">
                                    <img src="{{ $item->avatar }}" />
                                </a>
                            </div>
                            <div class="details">
                                <a href="{{ route('products.show', $item->id) }}" class="name">
                                    {{ $item->title }}
                                </a>
                                <div class="price-h">
                                    <span class="new-price">
                                       {{ $item->discount_price ? $item->discount_price : $item->price }} <u>د.ك</u>
                                    </span>
                                    <span class="old-price">
                                        {{ $item->price }}
                                    </span>
                                </div>
                                <a href="{{ route('products.show', $item->id) }}" class="btn-add-cart">
                                   عرض
                                </a>
                            </div>
                        </div>
                    </div>
                    <!-- /Col -->
                    @empty
                    <div class="col-12">
                        <p class="text-center">لا يوجد بيانات لعرضها 💁‍♀️💁‍♀️💁‍♀️</p>
                    </div>
                    @endforelse
                   
                </div>
            </div>
            <!-- /Col -->
        </div>
    </div>
</section>
<!-- End New-arrival -->


<!-- Start New-arrival -->
<section class="new-arrival">
    <div class="container">
        <div class="row">
            <!-- Col -->
            <div class="col-md-6">
                <div class="title">
                    <h3>المكتبة</h3>
                </div>
            </div>
            <!-- /Col -->

            <!-- Col -->
            <div class="col-md-6">
                <div class="more-products">
                    <a href="{{ route('library.index') }}">
                        عرض المزيد
                        <i class="la la-angle-left"></i>
                    </a>
                </div>
            </div>
            <!-- /Col -->

           
            <!-- Col -->
            <div class="col-md-12">
                <div class="best-slider owl-carousel owl-theme">
                    @forelse ($courses as $course)
                        <!-- Item -->
                        <div class="item">
                            <div class="pro-block">
                                <div class="img-block">
                                    <a href="{{ route('library.courses.show', ['level'=> $course->level_id,'course'=>$course->id]) }}" class="img">
                                        <img src="{{ $course->avatar }}" />
                                    </a>
                                </div>
                                <div class="details">
                                    <a href="{{ route('library.courses.show', ['level'=> $course->level_id,'course'=>$course->id]) }}" class="name">
                                        {{ $course->title }}
                                    </a>
                                    <div class="price-h">
                                        <span class="new-price">
                                        رقم الكورس {{ $course->code }}
                                        </span>
                                    </div>
                                    <a href="{{ route('library.courses.show', ['level'=> $course->level_id,'course'=>$course->id]) }}" class="btn-add-cart">
                                       عرض
                                    </a>
                                </div>
                            </div>
                        </div>
                        <!-- /Item -->
                    @empty
                        <div class="col-12">
                            <p class="text-center">لا يوجد بيانات لعرضها 💁‍♀️💁‍♀️💁‍♀️</p>
                        </div>
                    @endforelse
                    
                </div>
            </div>
            <!-- /Col -->
        </div>
    </div>
</section>
<!-- End New-arrival -->



<!-- Start Categories-h -->
<section class="categories-h">
    <div class="container">
        <div class="row">
            <!-- Col -->
            <div class="col-md-6">
                <div class="title">
                    <h3>الاقسام</h3>
                </div>
            </div>
            <!-- /Col -->

            <!-- Col -->
            <div class="col-md-6">
                <div class="more-products">
                   
                </div>
            </div>
            <!-- /Col -->

            @forelse ($categories as $item)
            <!-- Col -->
            <div class="col-md-4 col-sm-12">
                <div class="cat-block">
                    <div class="img">
                        <a href="{{ route('products.index', ['category'=> $item->id]) }}">
                            <img src="{{ $item->avatar }}" />
                        </a>
                    </div>
                    <div class="details">
                        <h3>{{ $item->title }}</h3>
                        <p>{{ $item->text }} </p>
                        <a href="{{ route('products.index', ['category'=> $item->id]) }}" class="btn-shop">تسوق الان</a>
                    </div>
                </div>
            </div>
            <!-- /Col -->
            @empty
            <div class="col-12">
                <p class="text-center">لا يوجد بيانات لعرضها 💁‍♀️💁‍♀️💁‍♀️</p>
            </div>
            @endforelse

        </div>
    </div>
</section>
<!-- End Categories-h -->

<!-- Start New-arrival -->
<section class="new-arrival">
    <div class="container">
        <div class="row">
            <!-- Col -->
            <div class="col-md-6">
                <div class="title">
                    <h3>المميزه</h3>
                </div>
            </div>
            <!-- /Col -->

            <!-- Col -->
            <div class="col-md-6">
                <div class="more-products">
                    <a href="{{ route('products.index') }}">
                        عرض المزيد
                        <i class="la la-angle-left"></i>
                    </a>
                </div>
            </div>
            <!-- /Col -->

           
            <!-- Col -->
            <div class="col-md-12">
                <div class="best-slider owl-carousel owl-theme">
                    @forelse ($features as $item)
                        <!-- Item -->
                        <div class="item">
                            <div class="pro-block">
                                <div class="img-block">
                                    <a href="{{ route('products.show', $item->id) }}" class="img">
                                        <img src="{{ $item->avatar }}" />
                                    </a>
                                </div>
                                <div class="details">
                                    <a href="{{ route('products.show', $item->id) }}" class="name">
                                        {{ $item->title }}
                                    </a>
                                    <div class="price-h">
                                        <span class="new-price">
                                           {{ $item->discount_price ? $item->discount_price : $item->price }} <u>د.ك</u>
                                        </span>
                                        <span class="old-price">
                                            {{ $item->price }}
                                        </span>
                                    </div>
                                    <a href="{{ route('products.show', $item->id) }}" class="btn-add-cart">
                                       عرض
                                    </a>
                                </div>
                            </div>
                        </div>
                        <!-- /Item -->
                    @empty
                        <div class="col-12">
                            <p class="text-center">لا يوجد بيانات لعرضها 💁‍♀️💁‍♀️💁‍♀️</p>
                        </div>
                    @endforelse
                    
                </div>
            </div>
            <!-- /Col -->
        </div>
    </div>
</section>
<!-- End New-arrival -->

@endsection
