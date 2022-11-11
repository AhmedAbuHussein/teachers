@extends('layouts.admin')

@section('title')
تعديل
@endsection
@section('breadcrumb')
<li class="breadcrumb-item"> 
    <a href="{{ route('dashboard.news.index') }}">الاخبار</a> 
</li>
<li class="breadcrumb-item">تعديل</li>
@endsection

@section('content')
<div class="container-fluid">
    <form action="{{ route('dashboard.news.update', ['news'=> $news->id]) }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-md-8 mx-auto">
                
                <div class="form-group">
                    <label for="title">عنوان الخبر</label>
                    <input type="text" required name="title" id="title" value="{{ old('title', $news->title) }}" class="form-control" placeholder="عنوان الخبر">
                    @error('title')
                        <p class="m-0 text-danger">{{ $message }}</p>
                    @enderror
                </div> 
                
                
                <div class="form-group">
                    <label for="category_id">الفئة</label>
                    <select required name="category_id" id="category_id" class="form-control">
                        <option value="">اختار الفئة</option>
                        @foreach ($categories as $item)
                            <option {{ old('category_id', $news->category_id) == $item->id ? 'selected': '' }} value="{{ $item->id }}">{{ $item->title }}</option>
                        @endforeach
                    </select>
                    @error('category_id')
                        <p class="m-0 text-danger">{{ $message }}</p>
                    @enderror
                </div>


                <div class="form-group">
                    <label for="text">وصف  الخبر</label>
                    <textarea required rows="6" name="text" id="text" class="form-control" placeholder="وصف  الخبر">{{ old('text', $news->text) }}</textarea>
                    @error('text')
                        <p class="m-0 text-danger">{{ $message }}</p>
                    @enderror
                </div>

                <div class="form-group text-center">
                    <label for="image">
                        <img src="{{ $news->avatar }}" class="preview" alt="">
                    </label>
                    <input type="file" name="image" accept="image/*" id="image" class="d-none"/>
                    @error('image')
                        <p class="m-0 text-danger">{{ $message }}</p>
                    @enderror
                </div>
            
                <div class="form-group d-flex justify-content-end">
                    <button type="submit" class="btn btn-primary"><i class="fa fa-send"></i> حفظ</button>
                </div>
            </div>

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
