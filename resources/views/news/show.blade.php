@extends('layouts.app')
@section("title")
    الاخبار
@endsection
@section('breadcrumb')

    <li> <a href="{{ route('news.index') }}">الاخبار</a></li>
    <li><span>{{ $item->title }}</span></li>
@endsection
@section('content')

<main class="main-content">

    <section class="single-page body-inner">
        <div class="container">
            <div class="row">
                <!-- Col -->
                <div class="col-md-4">
                    <div class="img">
                        <img src="{{ $item->avatar }}" style="width: 100%" alt="">
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="text-single">
                        <div class="title-single">
                            <h3>{{ $item->title }}</h3>
                        </div>
                        <hr>
                        <div class="body-single">
                            {{ $item->text }}
                        </div>
                    </div>
                </div>
                <!-- /Col -->
            </div>
        </div>
    </section>


    <!-- Start New-arrival -->
    <section class="new-arrival">
        <div class="container">
            <div class="row">
                <!-- Col -->
                <div class="col-md-6">
                    <div class="title">
                        <h3>عناصر مشابهه</h3>
                    </div>
                </div>
                <!-- /Col -->
    
                <!-- Col -->
                <div class="col-md-6">
                    <div class="more-news text-left">
                        <a href="{{ route('news.index') }}">
                            عرض المزيد
                            <i class="la la-angle-left"></i>
                        </a>
                    </div>
                </div>
                <!-- /Col -->
    
               
                <!-- Col -->
                <div class="col-md-12">
                    <div class="best-slider owl-carousel owl-theme">
                        @foreach ($items as $item)
                            <!-- Item -->
                            <div class="item">
                                <div class="pro-block">
                                    <div class="img-block">
                                        <a href="{{ route('news.show', $item->id) }}" class="img">
                                            <img src="{{ $item->avatar }}" />
                                        </a>
                                    </div>
                                    <div class="details">
                                        <a href="{{ route('news.show', $item->id) }}" class="name">
                                            {{ $item->title }}
                                        </a>
                                        <a href="{{ route('news.show', $item->id) }}" class="btn-add-cart">
                                           عرض
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <!-- /Item -->
                        @endforeach
                        
                    </div>
                </div>
                <!-- /Col -->
            </div>
        </div>
    </section>
    <!-- End New-arrival -->
    
   
    
</main>

@endsection