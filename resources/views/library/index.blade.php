@extends('layouts.app')
@section("title")
    المكتبة
@endsection
@section('breadcrumb')
    <li> 
        <span>المكتبة</span>
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
                            <select name="level" class="form-control" onchange="document.getElementById('search').submit()">
                                <option value="">اختار المستوي</option>
                                @foreach ($levels as $item)
                                    <option {{ request()->get('level') == $item->id ? 'selected' : '' }} value="{{ $item->id }}">{{ $item->title }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <a href="{{ route('library.index') }}" class="btn btn-form" title="اعادة تحميل"><i class="fa fa-recycle"></i></a>
                        </div>

                        <div class="form-group">
                            <input type="search" id="search" class="form-control" name="q" value="{{ request()->get('q') }}" placeholder="ابحث عن ماده">
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
                            <a href="{{ route('library.courses.show', ['level'=> $item->level_id,'course'=>$item->id]) }}">
                                <img src="{{ $item->avatar }}" />
                            </a>
                        </div>
                        <div class="details">
                            <h3>{{ $item->title }}</h3>
                            <span class="badge badge-success">{{ $item->level->title }}</span>
                            <p>{{ $item->text }}</p>
                           <div class="d-flex justify-content-between gap-10">
                            <a href="{{ route('library.courses.show', ['level'=> $item->level_id,'course'=>$item->id]) }}" class="btn-shop">عرض</a>
                            <a href="{{ route('library.courses.index', ['level'=> $item->level_id,'course'=>$item->id]) }}" class="btn-shop">محتوي</a>
                           </div>
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
@section('styles')
    <style>
        .cat-block .details .btn-shop{
            min-width: auto;
            width:100%;
        }
        .gap-10{
            gap: 10px;
        }
    </style>
@endsection