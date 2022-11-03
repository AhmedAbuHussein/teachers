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
                    <h3>من نحن</h3>
                    <p>
                        هناك حقيقة مثبتة منذ زمن طويل وهي أن المحتوى المقروء لصفحة ما سيلهي القارئ عن التركيز على الشكل الخارجي للنص أو شكل توضع الفقرات في الصفحة التي يقرأها.
                    </p>
                </div>
            </div>
            <!-- /Col -->

            <!-- Col -->
            <div class="col-md-6 col-sm-12">
                <div class="img-about">
                    <div class="img">
                        <img src="{{ asset('site/images/p3.png') }}" alt="#" />
                    </div>
                </div>
            </div>
            <!-- /Col -->
        </div>

        <div class="row">
            <!-- Col -->
            <div class="col-md-6 col-sm-12">
                <div class="text-about">
                    <h3>أهدافنا</h3>
                    <p>
                        هناك حقيقة مثبتة منذ زمن طويل وهي أن المحتوى المقروء لصفحة ما سيلهي القارئ عن التركيز على الشكل الخارجي للنص أو شكل توضع الفقرات في الصفحة التي يقرأها.
                    </p>
                    <ul>
                        <li>هناك حقيقة مثبتة منذ زمن طويل وهي أن المحتوى المقروء لصفحة ما</li>
                        <li>هناك حقيقة مثبتة منذ زمن طويل وهي أن المحتوى المقروء لصفحة ما</li>
                        <li>هناك حقيقة مثبتة منذ زمن طويل وهي أن المحتوى المقروء لصفحة ما</li>
                    </ul>
                </div>
            </div>
            <!-- /Col -->

            <!-- Col -->
            <div class="col-md-6 col-sm-12">
                <div class="img-about">
                    <div class="img">
                        <img src="{{ asset('site/images/p1.png') }}" alt="#" />
                    </div>
                </div>
            </div>
            <!-- /Col -->
        </div>
    </div>
</section>

<section class="about-more">
    <div class="container">
        <div class="row">
            <!-- Col -->
            <div class="col-md-6 col-sm-12">
                <div class="about-block">
                    <h3>رؤيتنا</h3>
                    <p>
                        هناك حقيقة مثبتة منذ زمن طويل وهي أن المحتوى المقروء لصفحة ما سيلهي القارئ عن التركيز على الشكل الخارجي للنص أو شكل توضع الفقرات في الصفحة التي يقرأها.
                    </p>
                </div>
            </div>
            <!-- /Col -->
            <!-- Col -->
            <div class="col-md-6 col-sm-12">
                <div class="about-block">
                    <h3>مهمتنا</h3>
                    <p>
                        هناك حقيقة مثبتة منذ زمن طويل وهي أن المحتوى المقروء لصفحة ما سيلهي القارئ عن التركيز على الشكل الخارجي للنص أو شكل توضع الفقرات في الصفحة التي يقرأها.
                    </p>
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
                        <h3>ضمان 100 يوم خالٍ من المتاعب</h3>
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
                        <h3>لدينا أثاث مصنوع في المملكة العربية السعودية</h3>
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
                        <h3>أفضل خدمة عملاء في فئتها</h3>
                    </div>
                </div>
            </div>
            <!-- /Col -->
        </div>
    </div>
</section>
<!-- End Special-h -->

@endsection
