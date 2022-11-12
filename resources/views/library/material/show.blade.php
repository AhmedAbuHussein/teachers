@extends('layouts.app')
@section("title")
    عرض
@endsection
@section('breadcrumb')
    <li><a href="{{ route('library.index') }}">المكتبة</a></li>
    <li> 
        <span>عرض</span>
    </li>
@endsection
@section('content')
<div class="container">
    <div class="row">
        <!-- Col -->
        <div class="col-8 mx-auto">
            <div class="card">
                <div class="card-body" style="min-height: 50vh">
                    <div class="row">
                        <div class="col-md-4">
                            <img src="{{ $course->avatar }}" alt="">
                        </div>
                        <div class="col-md-8">
                           <div class="course pt-3">
                                <h4>{{ $course->title }}</h4>
                                <div class="rate">
                                    @for ($i = 0; $i < $course->star; $i++)
                                        <i class="fa fa-star"></i>
                                    @endfor                    
                                    @for ($i = $course->star; $i < 5; $i++)
                                        <i class="fa fa-star-o"></i>
                                    @endfor                   
                                </div>
                                <span class="badge badge-success">{{ $course->level->title }}</span>
                                <p class="my-1">كود الكورس : {{ $course->code }}</p>
                                <p class="my-1">للحصول علي معلومات اكثر عن هذا البرنامج يمكنك الضغط <a href="{{ $course->extra_url }}">هنا</a></p>
                                <p class="text-justify">{{ $course->text }}</p>

                                <a href="{{ route('library.courses.index', ['course'=> $course->id, 'level'=> $course->level_id]) }}" class="btn btn-block btn-form">محتوي الكورس</a>
                           </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection