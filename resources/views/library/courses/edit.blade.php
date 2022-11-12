@extends('layouts.app')
@section("title")
     تعديل الدرس
@endsection
@section('breadcrumb')
    <li> 
        <a href="{{ route('profile.index') }}">الصفحة الشخصية</a>
    </li>
    <li> 
        <span>تعديل الدرس</span>
    </li>
@endsection
@section('content')

<main class="main-content">
    <div class="container">
        <div class="row">
            <div class="col-md-10 mx-auto">
                <form action="{{ route('library.courses.update', ['course'=> $course->id,'level'=> $level]) }}" method="post">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="title">العنوان</label>
                                <input type="text" required name="title" id="title" value="{{ old('title', $course->title) }}" class="form-control" placeholder="العنوان">
                                @error('title')
                                    <p class="m-0 text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="code">الكود</label>
                                <input type="text" required name="code" id="code" value="{{ old('code', $course->code) }}" class="form-control" placeholder="الكود">
                                @error('code')
                                    <p class="m-0 text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
            
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="extra_url">لينك خارجي</label>
                                <input type="url"  name="extra_url" id="extra_url" value="{{ old('extra_url', $course->extra_url) }}" class="form-control" placeholder="لينك خارجي">
                                @error('extra_url')
                                    <p class="m-0 text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
            
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="text">وصف</label>
                                <textarea rows="8" name="text" id="text" class="form-control" placeholder="وصف">{{ old('text', $course->text) }}</textarea>
                                @error('text')
                                    <p class="m-0 text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                       
                        <div class="col-md-4 mx-auto">
                            <div class="form-group text-center">
                                <label for="image" class="d-block">صورة الغلاف</label>
                                <label for="image">
                                    <img src="{{ $course->avatar }}" class="preview" alt="">
                                </label>
                                <input type="file" name="image" accept="image/*" id="image" class="d-none"/>
                                @error('image')
                                    <p class="m-0 text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                    </div>
            
                    <div class="form-group d-flex justify-content-start">
                        <button type="submit" class="btn btn-primary bg-primary"><i class="fa fa-send"></i> حفظ</button>
                    </div>

                </form>
            </div>
        </div>
    </div>
</main>
@endsection
@section('styles')
    <style>
        .preview{
            width: 220px;
            height: 180px;
            border: 1px solid #b7b7b7;
            border-radius: 3px;
        }
    </style>
@endsection