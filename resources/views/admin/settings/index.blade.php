@extends('layouts.admin')

@section('title')
الاعدادات
@endsection
@section('breadcrumb')
<li class="breadcrumb-item"> 
    <a href="{{ route('dashboard.privacy.index') }}">اعدادات الموقع</a> 
</li>
<li class="breadcrumb-item">الاعدادات</li>
@endsection

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-11 mr-auto ml-auto">
            <form action="{{ route('dashboard.settings.update') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="email">البريد الالكتروني</label>
                            <input type="text" required name="email" id="email" value="{{ old('email', $setting->email) }}" class="form-control" placeholder="البريد الالكتروني">
                            @error('email')
                                <p class="m-0 text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="phone">رقم الهاتف</label>
                            <input type="number" name="phone" id="phone" value="{{ old('phone', $setting->phone) }}" class="form-control" placeholder="رقم الهاتف">
                            @error('phone')
                                <p class="m-0 text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="whatsapp">واتس اب</label>
                            <input type="number" name="whatsapp" id="whatsapp" value="{{ old('whatsapp', $setting->whatsapp) }}" class="form-control" placeholder="واتس اب">
                            @error('whatsapp')
                                <p class="m-0 text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="address1">العنوان</label>
                            <input type="text" name="address1" id="address1" value="{{ old('address1', $setting->address1) }}" class="form-control" placeholder="العنوان الرئيسي">
                            @error('address1')
                                <p class="m-0 text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="address2">العنوان</label>
                            <input type="text" name="address2" id="address2" value="{{ old('address2', $setting->address2) }}" class="form-control" placeholder="العنوان الفرعي">
                            @error('address2')
                                <p class="m-0 text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="short_desc">وصف موجز</label>
                            <textarea name="short_desc" rows="3" id="short_desc"  class="form-control" placeholder="وصف موجز ">{{ old('short_desc', $setting->short_desc) }}</textarea>
                            @error('short_desc')
                                <p class="m-0 text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                </div>
                
                <hr>

                <div class="row">
                    <div class="col-md-8">
                        <div class="form-group">
                            <label for="about_title">عن الموقع العنوان</label>
                            <input type="text" name="about_title" id="about_title" value="{{ old('about_title', $setting->about_title) }}" class="form-control" placeholder="عن الموقع العنوان">
                            @error('about_title')
                                <p class="m-0 text-danger">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="about_text">عن الموقع الوصف التفصيلي</label>
                            <textarea name="about_text" rows="6" id="about_text"  class="form-control" placeholder="عن الموقع الوصف التفصيلي ">{{ old('about_text', $setting->about_text) }}</textarea>
                            @error('about_text')
                                <p class="m-0 text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group text-center">
                            <label for="image">
                                <img src="{{ $setting->about_image ? Storage::url($setting->about_image) : asset('images/logo.png') }}" class="preview" alt="">
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
    </div>

</div>
@endsection
@section('style')
    <style>
        .preview{
            width: 100%;
            height: 250px;
            border: 1px solid #b7b7b7;
            border-radius: 3px;
        }
    </style>
@endsection
