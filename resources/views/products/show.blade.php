@extends('layouts.app')
@section("title")
    المنتجات
@endsection
@section('breadcrumb')

    <li> <a href="{{ route('products.index') }}">المنتجات</a></li>
    <li><span>{{ $item->title }}</span></li>
@endsection
@section('content')

<main class="main-content">

    <section class="single-page body-inner">
        <div class="container">
            <div class="row">
                <!-- Col -->
                <div class="col-md-7 col-sm-12">
                    <div class="slider-single-pro">
                        <div class="slider slider-nav thumb-image">

                            @for ($i = 1; $i <= 3; $i++)
                                @if ($item->{"image$i"})
                                <div class="thumbnail-image">
                                    <div class="thumbImg">
                                        <img src="{{  Storage::url($item->{"image$i"}) }}" alt="slider-img">
                                    </div>
                                </div>
                                @endif
                            @endfor
                           
                        </div>
                        <div class="slider slider-for">

                            @for ($i = 1; $i <= 3; $i++)
                                @if ($item->{"image$i"})
                                <div class="slider-banner-image">
                                    <div class="blokc-single-g">
                                        <img src="{{  Storage::url($item->{"image$i"}) }}" alt="slider-img">
                                    </div>
                                </div>
                                @endif
                            @endfor
                           
                        </div>
                    </div>
                </div>
                <!-- /Col -->
                <!-- Col -->
                <div class="col-md-5 col-sm-12">
                    <div class="text-single">
                        <div class="title-single">
                            <h3>{{ $item->title }}</h3>
                            <ul class="stars">
                                <li>
                                    <span class="far fa-star"></span>
                                    <span class="las la-star-half-alt"></span>
                                    <span class="la la-star"></span>
                                    <span class="la la-star"></span>
                                    <span class="la la-star"></span>
                                </li>
                            </ul>
                        </div>
                        <div class="price-s">
                            <h3>{{ $item->discount_price ? $item->discount_price : $item->price }} د.ك</h3>
                        </div>
                        <div class="ship-s">
                            <p>يتم التوصيل في خلال 1-5 ايام</p>
                        </div>
                       <form action="{{ route('payments.buy', $item->id) }}" method="GET">
                            <div class="control">
                                <button type="button" class="bttn bttn-left minus">
                                <span>-</span>
                                </button>
                                <input type="number" name="count" class="input">
                                <button type="button" class="bttn bttn-right plus">
                                <span>+</span>
                                </button>
                            </div>
                            <div class="btn-single">
                                <button type="submit" class="btn">
                                    <span>شراء الان</span>
                                </button>
                            </div>
                       </form>
                        <div id="accordion">
                            <div class="card">
                                <div class="card-header" id="headingOne">
                                    <button type="button" class="btn-link" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                        التفاصيل 
                                    </button>
                                </div>

                                <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
                                    <div class="card-body">
                                       <p class="mb-2">{{ $item->short_text }}</p>
                                       <p class="mb-2">{{ $item->text }}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-header" id="headingTwo">
                                    <button type="button" class="btn-link collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                    تفاصيل اضافية
                                    </button>
                                </div>
                                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
                                    <div class="card-body">
                                        <ul class="list-group">
                                            <li class="list-group-item d-flex justify-content-between">
                                                <span>الكمية المتاحة : </span>
                                                <span>{{ $item->stock }} عنصر</span>
                                            </li>
                                            <li class="list-group-item d-flex justify-content-between">
                                                <span>فئة العنصر : </span>
                                                <span>{{ optional($item->category)->title }}</span>
                                            </li>
                                            @if ($item->is_feature)
                                            <li class="list-group-item d-flex justify-content-between">
                                                <span>عنصر مميز : </span>
                                                <span>
                                                    <span class="badge badge-primary">نعم</span>
                                                </span>
                                            </li>
                                            @endif
                                        
                                        </ul>
                                    </div>
                                </div>
                            </div>
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
                        @foreach ($items as $item)
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