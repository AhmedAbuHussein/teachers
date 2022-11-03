@extends('layouts.app')

@section('content')

<section class="slider-h" id="topHeader">
    <div class="home-slider owl-carousel owl-theme">
        <!-- Item -->
        <div class="item">
            <div class="slider-block">
                <div class="img-slider">
                    <img src="{{ asset('site/images/slider.jpg') }}" alt="#" />
                </div>
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="text-slider">
                                <h4>عنوان مختصر هنا</h4>
                                <h1>
                                    عنوان هنا
                                </h1>
                                <p>
                                    هناك حقيقة مثبتة منذ زمن طويل وهي أن المحتوى المقروء لصفحة ما سيلهي القارئ عن التركيز على الشكل الخارجي للنص أو شكل توضع الفقرات في الصفحة التي يقرأها.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /Item -->

        <!-- Item -->
        <div class="item item2">
            <div class="slider-block">
                <div class="img-slider">
                    <img src="{{ asset('site/images/slider2.jpg') }}" alt="#" />
                </div>
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="text-slider">
                                <h4>عنوان مختصر هنا</h4>
                                <h2>
                                    عنوان هنا
                                </h2>
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
                                <h2>
                                    عنوان هنا
                                </h2>
                                <p>
                                    هناك حقيقة مثبتة منذ زمن طويل وهي أن المحتوى المقروء لصفحة ما
                                </p>
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
                    <h3>احدث المنتجات</h3>
                </div>
            </div>
            <!-- /Col -->

            <!-- Col -->
            <div class="col-md-6">
                <div class="more-products">
                    <a href="#">
                        عرض المزيد
                        <i class="la la-angle-left"></i>
                    </a>
                </div>
            </div>
            <!-- /Col -->

            <!-- Col -->
            <div class="col-md-12">
                <div class="all-pro row">
                    <!-- Col -->
                    <div class="col-md-3 col-sm-6">
                        <div class="pro-block">
                            <div class="img-block">
                                <a href="#" class="img">
                                    <img src="{{ asset('site/images/p1.png') }}" />
                                </a>
                            </div>
                            <div class="details">
                                <a href="#" class="name">
                                    اسم المنتج
                                </a>
                                <div class="price-h">
                                    <span class="new-price">
                                        219.50 <u>SAR</u>
                                    </span>
                                    <span class="old-price">
                                        250.00
                                    </span>
                                </div>
                                <a href="#" class="btn-add-cart">
                                    اضافة للسلة
                                </a>
                            </div>
                        </div>
                    </div>
                    <!-- /Col -->
                    <!-- Col -->
                    <div class="col-md-3 col-sm-6">
                        <div class="pro-block">
                            <div class="img-block">
                                <a href="#" class="img">
                                    <img src="{{ asset('site/images/p1.png') }}" />
                                </a>
                            </div>
                            <div class="details">
                                <a href="#" class="name">
                                    اسم المنتج
                                </a>
                                <div class="price-h">
                                    <span class="new-price">
                                        219.50 <u>SAR</u>
                                    </span>
                                    <span class="old-price">
                                        250.00
                                    </span>
                                </div>
                                <a href="#" class="btn-add-cart">
                                    اضافة للسلة
                                </a>
                            </div>
                        </div>
                    </div>
                    <!-- /Col -->
                    <!-- Col -->
                    <div class="col-md-3 col-sm-6">
                        <div class="pro-block">
                            <div class="img-block">
                                <a href="#" class="img">
                                    <img src="{{ asset('site/images/p2.png') }}" />
                                </a>
                            </div>
                            <div class="details">
                                <a href="#" class="name">
                                    اسم المنتج
                                </a>
                                <div class="price-h">
                                    <span class="new-price">
                                        219.50 <u>SAR</u>
                                    </span>
                                    <span class="old-price">
                                        250.00
                                    </span>
                                </div>
                                <a href="#" class="btn-add-cart">
                                    اضافة للسلة
                                </a>
                            </div>
                        </div>
                    </div>
                    <!-- /Col -->
                    <!-- Col -->
                    <div class="col-md-3 col-sm-6">
                        <div class="pro-block">
                            <div class="img-block">
                                <a href="#" class="img">
                                    <img src="{{ asset('site/images/p3.png') }}" />
                                </a>
                            </div>
                            <div class="details">
                                <a href="#" class="name">
                                    اسم المنتج
                                </a>
                                <div class="price-h">
                                    <span class="new-price">
                                        219.50 <u>SAR</u>
                                    </span>
                                    <span class="old-price">
                                        250.00
                                    </span>
                                </div>
                                <a href="#" class="btn-add-cart">
                                    اضافة للسلة
                                </a>
                            </div>
                        </div>
                    </div>
                    <!-- /Col -->
                    <!-- Col -->
                    <div class="col-md-3 col-sm-6">
                        <div class="pro-block">
                            <div class="img-block">
                                <a href="#" class="img">
                                    <img src="{{ asset('site/images/p4.png') }}" />
                                </a>
                            </div>
                            <div class="details">
                                <a href="#" class="name">
                                    اسم المنتج
                                </a>
                                <div class="price-h">
                                    <span class="new-price">
                                        219.50 <u>SAR</u>
                                    </span>
                                    <span class="old-price">
                                        250.00
                                    </span>
                                </div>
                                <a href="#" class="btn-add-cart">
                                    اضافة للسلة
                                </a>
                            </div>
                        </div>
                    </div>
                    <!-- /Col -->
                    <!-- Col -->
                    <div class="col-md-3 col-sm-6">
                        <div class="pro-block">
                            <div class="img-block">
                                <a href="#" class="img">
                                    <img src="{{ asset('site/images/p2.png') }}" />
                                </a>
                            </div>
                            <div class="details">
                                <a href="#" class="name">
                                    اسم المنتج
                                </a>
                                <div class="price-h">
                                    <span class="new-price">
                                        219.50 <u>SAR</u>
                                    </span>
                                    <span class="old-price">
                                        250.00
                                    </span>
                                </div>
                                <a href="#" class="btn-add-cart">
                                    اضافة للسلة
                                </a>
                            </div>
                        </div>
                    </div>
                    <!-- /Col -->
                    <!-- Col -->
                    <div class="col-md-3 col-sm-6">
                        <div class="pro-block">
                            <div class="img-block">
                                <a href="#" class="img">
                                    <img src="{{ asset('site/images/p3.png') }}" />
                                </a>
                            </div>
                            <div class="details">
                                <a href="#" class="name">
                                    اسم المنتج
                                </a>
                                <div class="price-h">
                                    <span class="new-price">
                                        219.50 <u>SAR</u>
                                    </span>
                                    <span class="old-price">
                                        250.00
                                    </span>
                                </div>
                                <a href="#" class="btn-add-cart">
                                    اضافة للسلة
                                </a>
                            </div>
                        </div>
                    </div>
                    <!-- /Col -->
                    <!-- Col -->
                    <div class="col-md-3 col-sm-6">
                        <div class="pro-block">
                            <div class="img-block">
                                <a href="#" class="img">
                                    <img src="{{ asset('site/images/p4.png') }}" />
                                </a>
                            </div>
                            <div class="details">
                                <a href="#" class="name">
                                    اسم المنتج
                                </a>
                                <div class="price-h">
                                    <span class="new-price">
                                        219.50 <u>SAR</u>
                                    </span>
                                    <span class="old-price">
                                        250.00
                                    </span>
                                </div>
                                <a href="#" class="btn-add-cart">
                                    اضافة للسلة
                                </a>
                            </div>
                        </div>
                    </div>
                    <!-- /Col -->
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
                    <a href="#">
                        عرض المزيد
                        <i class="la la-angle-left"></i>
                    </a>
                </div>
            </div>
            <!-- /Col -->

            <!-- Col -->
            <div class="col-md-4 col-sm-12">
                <div class="cat-block">
                    <div class="img">
                        <a href="#">
                            <img src="{{ asset('site/images/s1.png') }}" />
                        </a>
                    </div>
                    <div class="details">
                        <h3>اسم القسم</h3>
                        <p>
                            هناك حقيقة مثبتة منذ زمن طويل وهي أن المحتوى المقروء لصفحة ما
                        </p>
                        <a href="#" class="btn-shop">تسوق الان</a>
                    </div>
                </div>
            </div>
            <!-- /Col -->
            <!-- Col -->
            <div class="col-md-4 col-sm-12">
                <div class="cat-block">
                    <div class="img">
                        <a href="#">
                            <img src="{{ asset('site/images/s2.png') }}" />
                        </a>
                    </div>
                    <div class="details">
                        <h3>اسم القسم</h3>
                        <p>
                            هناك حقيقة مثبتة منذ زمن طويل وهي أن المحتوى المقروء لصفحة ما
                        </p>
                        <a href="#" class="btn-shop">تسوق الان</a>
                    </div>
                </div>
            </div>
            <!-- /Col -->
            <!-- Col -->
            <div class="col-md-4 col-sm-12">
                <div class="cat-block">
                    <div class="img">
                        <a href="#">
                            <img src="{{ asset('site/images/s3.png') }}" />
                        </a>
                    </div>
                    <div class="details">
                        <h3>اسم القسم</h3>
                        <p>
                            هناك حقيقة مثبتة منذ زمن طويل وهي أن المحتوى المقروء لصفحة ما
                        </p>
                        <a href="#" class="btn-shop">تسوق الان</a>
                    </div>
                </div>
            </div>
            <!-- /Col -->
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
                    <h3>مضاف حديثا</h3>
                </div>
            </div>
            <!-- /Col -->

            <!-- Col -->
            <div class="col-md-6">
                <div class="more-products">
                    <a href="#">
                        عرض المزيد
                        <i class="la la-angle-left"></i>
                    </a>
                </div>
            </div>
            <!-- /Col -->

            <!-- Col -->
            <div class="col-md-12">
                <div class="best-slider owl-carousel owl-theme">
                    <!-- Item -->
                    <div class="item">
                        <div class="pro-block">
                            <div class="img-block">
                                <a href="#" class="img">
                                    <img src="{{ asset('site/images/p1.png') }}" />
                                </a>
                            </div>
                            <div class="details">
                                <a href="#" class="name">
                                    اسم المنتج
                                </a>
                                <div class="price-h">
                                    <span class="new-price">
                                        219.50 <u>SAR</u>
                                    </span>
                                    <span class="old-price">
                                        250.00
                                    </span>
                                </div>
                                <a href="#" class="btn-add-cart">
                                    اضافة للسلة
                                </a>
                            </div>
                        </div>
                    </div>
                    <!-- /Item -->

                    <!-- Item -->
                    <div class="item">
                        <div class="pro-block">
                            <div class="img-block">
                                <a href="#" class="img">
                                    <img src="{{ asset('site/images/p2.png') }}" />
                                </a>
                            </div>
                            <div class="details">
                                <a href="#" class="name">
                                    اسم المنتج
                                </a>
                                <div class="price-h">
                                    <span class="new-price">
                                        219.50 <u>SAR</u>
                                    </span>
                                    <span class="old-price">
                                        250.00
                                    </span>
                                </div>
                                <a href="#" class="btn-add-cart">
                                    اضافة للسلة
                                </a>
                            </div>
                        </div>
                    </div>
                    <!-- /Item -->

                    <!-- Item -->
                    <div class="item">
                        <div class="pro-block">
                            <div class="img-block">
                                <a href="#" class="img">
                                    <img src="{{ asset('site/images/p3.png') }}" />
                                </a>
                            </div>
                            <div class="details">
                                <a href="#" class="name">
                                    اسم المنتج
                                </a>
                                <div class="price-h">
                                    <span class="new-price">
                                        219.50 <u>SAR</u>
                                    </span>
                                    <span class="old-price">
                                        250.00
                                    </span>
                                </div>
                                <a href="#" class="btn-add-cart">
                                    اضافة للسلة
                                </a>
                            </div>
                        </div>
                    </div>
                    <!-- /Item -->

                    <!-- Item -->
                    <div class="item">
                        <div class="pro-block">
                            <div class="img-block">
                                <a href="#" class="img">
                                    <img src="{{ asset('site/images/p4.png') }}" />
                                </a>
                            </div>
                            <div class="details">
                                <a href="#" class="name">
                                    اسم المنتج
                                </a>
                                <div class="price-h">
                                    <span class="new-price">
                                        219.50 <u>SAR</u>
                                    </span>
                                    <span class="old-price">
                                        250.00
                                    </span>
                                </div>
                                <a href="#" class="btn-add-cart">
                                    اضافة للسلة
                                </a>
                            </div>
                        </div>
                    </div>
                    <!-- /Item -->

                    <!-- Item -->
                    <div class="item">
                        <div class="pro-block">
                            <div class="img-block">
                                <a href="#" class="img">
                                    <img src="{{ asset('site/images/p2.png') }}" />
                                </a>
                            </div>
                            <div class="details">
                                <a href="#" class="name">
                                    اسم المنتج
                                </a>
                                <div class="price-h">
                                    <span class="new-price">
                                        219.50 <u>SAR</u>
                                    </span>
                                    <span class="old-price">
                                        250.00
                                    </span>
                                </div>
                                <a href="#" class="btn-add-cart">
                                    اضافة للسلة
                                </a>
                            </div>
                        </div>
                    </div>
                    <!-- /Item -->
                </div>
            </div>
            <!-- /Col -->
        </div>
    </div>
</section>
<!-- End New-arrival -->

@endsection
