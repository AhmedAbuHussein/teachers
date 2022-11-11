@extends('layouts.supervisor')

@section('title')
تعديل
@endsection
@section('breadcrumb')
<li class="breadcrumb-item"> 
    <a href="{{ route('supervisor.categories.index') }}">الفئات</a> 
</li>
<li class="breadcrumb-item">تعديل</li>
@endsection

@section('content')
<div class="container-fluid">

        <div class="row">
            <div class="col-md-6 mr-auto ml-auto">
                <form action="{{ route('supervisor.categories.update', $category->id) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="title">اسم الفئة</label>
                        <input type="text" required name="title" id="title" value="{{ old('title', $category->title) }}" class="form-control" placeholder="اسم الفئة">
                        @error('title')
                            <p class="m-0 text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="text">وصف الفئة</label>
                        <textarea required rows="6" name="text" id="text" class="form-control" placeholder="وصف الفئة">{{ old('text', $category->text) }}</textarea>
                        @error('text')
                            <p class="m-0 text-danger">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="form-group text-center">
                        <label for="image">
                            <img src="{{ $category->avatar }}" class="preview" alt="">
                        </label>
                        <input type="file" name="image" accept="image/*" id="image" class="d-none"/>
                        @error('image')
                            <p class="m-0 text-danger">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="form-group d-flex justify-content-end">
                        <button type="submit" class="btn btn-primary"><i class="fa fa-send"></i> حفظ</button>
                    </div>
                </form>
            </div>
        </div>

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
