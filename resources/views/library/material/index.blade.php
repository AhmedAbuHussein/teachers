@extends('layouts.app')
@section("title")
    المحتوي
@endsection
@section('breadcrumb')
    <li><a href="{{ route('library.index') }}">المكتبة</a></li>
    <li> 
        <span>المحتوي</span>
    </li>
@endsection
@section('content')

<main class="main-content">
    <section class="about-page body-inner">
        <div class="container">
            <div class="row">
                <!-- Col -->
                <div class="col-md-9">
                    <div class="tab-content">
                        @foreach ($items as $key=>$item)
                      
                        <div class="tab-pane fade {{ $key == 0 ? 'show active' : '' }}" id="tab_{{ $key }}">
                            <div class="details-shapter">
                               @if ($item->type == 'file')
                                <div class="img">
                                   <iframe src="{{ Storage::url($item->src) }}" frameborder="0" style="width: 100%; min-height: 400px;"></iframe>
                                   <a class="mt-3" target="_blank" download="download" href="{{ Storage::url($item->src) }}">تحميل الملف</a>
                                </div>
                               @endif
                                <div class="title">
                                    <h3>{{ $item->title }}</h3>
                                </div>
                                @if ($item->type == 'text')
                                    <p>{{ $item->src }}</p>
                                @elseif($item->type == 'url')
                                    <p>يمكنك الحصول علي المعلومات من خلال زياره <a target="_blank" href="{{ $item->src }}">اللينك</a></p>
                                @endif
                            </div>
                        </div>
                        @endforeach
                       
                    </div>
                    {{--  end taps  --}}

                </div>
                <!-- /Col -->

                <!-- Col -->
                <div class="col-md-3">
                    <div class="sidebar-library">
                        <div class="head-side">
                            <h3>المحتوي</h3>
                        </div>
                        <ul class="nav nav-tabs">
                            @foreach ($items as $key=>$item)
                            <li class="nav-item">
                                <button class="nav-link {{ $key==0 ?'active': '' }}" data-toggle="tab" data-target="#tab_{{ $key }}">{{ $item->title }}</button>
                            </li>
                            @endforeach
                           
                        </ul>
                    </div>
                </div>
                <!-- /Col -->
            </div>
        </div>
    </section>
</main>

@endsection