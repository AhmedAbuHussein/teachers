@extends('layouts.app')
@section("title")
    الاخبار
@endsection
@section('breadcrumb')
    <li> 
        <span>الاخبار</span>
    </li>
@endsection
@section('content')

<section class="cat-page body-inner">
    <div class="container">
        <div class="row">
            <!-- Col -->
            <div class="col-12">
                <form class="form-inline" id="search">

                    <div class="d-flex justify-content-between w-100">
                       
                        <div class="form-group">
                            <select name="category" class="form-control" onchange="document.getElementById('search').submit()">
                                <option value="">اختار فئة</option>
                                @foreach ($categories as $item)
                                    <option {{ request()->get('category') == $item->id ? 'selected' : '' }} value="{{ $item->id }}">{{ $item->title }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <a href="{{ route('news.index') }}" class="btn btn-form" title="اعادة تحميل"><i class="fa fa-recycle"></i></a>
                        </div>

                        <div class="form-group">
                            <input type="search" id="search" class="form-control" name="q" value="{{ request()->get('q') }}" placeholder="ابحث عن منتج">
                        </div>

                    </div>
                </form>

            </div>
           
            <!-- /Col -->

            @forelse ($items as $item)
                <!-- Col -->
                <div class="col-md-4 col-sm-12">
                    <div class="cat-block">
                        <div class="img">
                            <a href="{{ route('news.show', $item->id) }}">
                                <img src="{{ $item->avatar }}" />
                            </a>
                        </div>
                        <div class="details">
                            <h3>{{ $item->title }}</h3>
                            <p>{{ $item->text }}</p>
                            <a href="{{ route('news.show', $item->id) }}" class="btn-shop">عرض</a>
                        </div>
                    </div>
                </div>
                <!-- /Col -->
            @empty
            <div class="col-12">
                <p class="text-center mt-5 mb-5">لا يوجد بيانات لعرضها 💁‍♀️💁‍♀️💁‍♀️</p>
            </div>
            @endforelse

            <div class="col-12">
                {!! $items->links() !!}
            </div>

        </div>
    </div>
</section>
@endsection