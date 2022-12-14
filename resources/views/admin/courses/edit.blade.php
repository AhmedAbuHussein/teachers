@extends('layouts.admin')

@section('title')
تعديل
@endsection
@section('breadcrumb')
<li class="breadcrumb-item"> 
    <a href="{{ route('dashboard.courses.index') }}">المواد</a> 
</li>
<li class="breadcrumb-item">تعديل</li>
@endsection

@section('content')
<div class="container-fluid">
    <form action="{{ route('dashboard.courses.update', $course->id) }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                    <label for="title">العنوان</label>
                    <input type="text" required name="title" id="title" value="{{ old('title', $course->title) }}" class="form-control" placeholder="العنوان">
                    @error('title')
                        <p class="m-0 text-danger">{{ $message }}</p>
                    @enderror
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="code">الكود</label>
                    <input type="text" required name="code" id="code" value="{{ old('code', $course->code) }}" class="form-control" placeholder="الكود">
                    @error('code')
                        <p class="m-0 text-danger">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <div class="col-md-4">
                <div class="form-group">
                    <label for="extra_url">لينك خارجي</label>
                    <input type="url"  name="extra_url" id="extra_url" value="{{ old('extra_url', $course->extra_url) }}" class="form-control" placeholder="لينك خارجي">
                    @error('extra_url')
                        <p class="m-0 text-danger">{{ $message }}</p>
                    @enderror
                </div>
            </div>
            
            <div class="col-md-4">
                <div class="form-group">
                    <label for="is_active">الحالة</label>
                    <select required name="is_active" id="is_active" class="form-control">
                        <option value="">اختار الحالة</option>
                        <option {{ old('is_active', $course->is_active) == '1' ? 'selected': '' }} value="1">نشط</option>
                        <option {{ old('is_active', $course->is_active) == '0' ? 'selected': '' }} value="0">غير نشط</option>
                    </select>
                    @error('is_active')
                        <p class="m-0 text-danger">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <div class="col-md-4">
                <div class="form-group">
                    <label for="user_id">المعلم</label>
                    <select required name="user_id" id="user_id" class="form-control">
                        <option value="">اختار المعلم</option>
                        @foreach ($teachers as $item) 
                        <option {{ old('user_id', $course->user_id) == $item->id ? 'selected': '' }} value="{{ $item->id }}">{{ $item->fname . ' ' .$item->lname }}</option>
                        @endforeach
                    </select>
                    @error('user_id')
                        <p class="m-0 text-danger">{{ $message }}</p>
                    @enderror
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="star">التقييم</label>
                    <select required name="star" id="star" class="form-control">
                        <option value="">اختار التقييم</option>
                        <option {{ old('star', $course->star) == '1' ? 'selected': '' }} value="1">1</option>
                        <option {{ old('star', $course->star) == '2' ? 'selected': '' }} value="2">2</option>
                        <option {{ old('star', $course->star) == '3' ? 'selected': '' }} value="3">3</option>
                        <option {{ old('star', $course->star) == '4' ? 'selected': '' }} value="4">4</option>
                        <option {{ old('star', $course->star) == '5' ? 'selected': '' }} value="5">5</option>
                    </select>
                    @error('star')
                        <p class="m-0 text-danger">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group">
                    <label for="text">وصف</label>
                    <textarea rows="8" name="text" id="text" class="form-control" placeholder="وصف">{{ old('text', $course->text) }}</textarea>
                    @error('text')
                        <p class="m-0 text-danger">{{ $message }}</p>
                    @enderror
                </div>
            </div>
           
            <div class="col-md-6">
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

        <div class="form-group d-flex justify-content-end">
            <button type="submit" class="btn btn-primary"><i class="fa fa-send"></i> حفظ</button>
        </div>
    </form>
</div>
@endsection
@section('style')
    <style>
        .preview{
            width: 220px;
            height: 180px;
            border: 1px solid #b7b7b7;
            border-radius: 3px;
        }
    </style>
@endsection
