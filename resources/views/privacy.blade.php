@extends('layouts.app')
@section("title")
    سياسة الاستخدام
@endsection
@section('breadcrumb')
    <li> 
        <span>سياسة الاستخدام</span>
    </li>
@endsection

@section('content')

<section class="privacy-page body-inner">
    <div class="container">

        <div class="row">
            <!-- Col -->
            <div class="col-md-8 col-sm-12">
                <div class="text-about">
                    @forelse ($items as $item)
                        <h3>{{ $item->title }}</h3>
                        <p>{{ $item->text }}</p>
                    @empty
                    <p class="text-center">لا يوجد بيانات لعرضها 💁‍♀️💁‍♀️💁‍♀️</p>
                    @endforelse
                </div>
            </div>
            <!-- /Col -->
        </div>
    </div>
</section>

@endsection
