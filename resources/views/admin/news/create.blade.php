@extends('layouts.admin')

@section('title')
اضافة
@endsection
@section('breadcrumb')
<li class="breadcrumb-item"> 
    <a href="{{ route('dashboard.products.index') }}">المنتجات</a> 
</li>
<li class="breadcrumb-item">اضافة</li>
@endsection

@section('content')
<div class="container-fluid">
    <form action="{{ route('dashboard.products.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-md-6">
                
                <div class="form-group">
                    <label for="title">اسم المنتج</label>
                    <input type="text" required name="title" id="title" value="{{ old('title') }}" class="form-control" placeholder="اسم المنتج">
                    @error('title')
                        <p class="m-0 text-danger">{{ $message }}</p>
                    @enderror
                </div>
                
                <div class="form-group">
                    <label for="code">كود المنتج</label>
                    <input type="text" required name="code" id="code" value="{{ old('code') }}" class="form-control" placeholder="كود المنتج">
                    @error('code')
                        <p class="m-0 text-danger">{{ $message }}</p>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="price">سعر المنتج</label>
                    <input type="number" step="0.1" min="1" required name="price" id="price" value="{{ old('price') }}" class="form-control" placeholder="سعر المنتج">
                    @error('price')
                        <p class="m-0 text-danger">{{ $message }}</p>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="discount_price">سعر المنتج بعد الخصم</label>
                    <input type="number" step="0.1" min="0" name="discount_price" id="discount_price" value="{{ old('discount_price') }}" class="form-control" placeholder="سعر المنتج بعد الخصم">
                    @error('discount_price')
                        <p class="m-0 text-danger">{{ $message }}</p>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="short_text">وصف صغير للمنتج</label>
                    <textarea required rows="6" name="short_text" id="short_text" class="form-control" placeholder="وصف صغير للمنتج">{{ old('short_text') }}</textarea>
                    @error('short_text')
                        <p class="m-0 text-danger">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <div class="col-md-6">
                
                <div class="form-group">
                    <label for="stock">الكمية المتاحة للمنتج</label>
                    <input type="number" min="1" required name="stock" id="stock" value="{{ old('stock') }}" class="form-control" placeholder="الكمية المتاحة المنتج">
                    @error('stock')
                        <p class="m-0 text-danger">{{ $message }}</p>
                    @enderror
                </div>
                
                <div class="form-group">
                    <label for="category_id">الفئة</label>
                    <select required name="category_id" id="category_id" class="form-control">
                        <option value="">اختار الفئة</option>
                        @foreach ($categories as $item)
                            <option {{ old('category_id') == $item->id ? 'selected': '' }} value="{{ $item->id }}">{{ $item->title }}</option>
                        @endforeach
                    </select>
                    @error('category_id')
                        <p class="m-0 text-danger">{{ $message }}</p>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="is_active">الحالة</label>
                    <select required name="is_active" id="is_active" class="form-control">
                        <option value="">اختار الحالة</option>
                        <option {{ old('is_active') == '1' ? 'selected': '' }} value="1">نشط</option>
                        <option {{ old('is_active') == '0' ? 'selected': '' }} value="0">غير نشط</option>
                    </select>
                    @error('is_active')
                        <p class="m-0 text-danger">{{ $message }}</p>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="is_feature">مميزه</label>
                    <select required name="is_feature" id="is_feature" class="form-control">
                        <option value="">اختار </option>
                        <option {{ old('is_feature') == '1' ? 'selected': '' }} value="1">مميز</option>
                        <option {{ old('is_feature') == '0' ? 'selected': '' }} value="0">غير مميز</option>
                    </select>
                    @error('is_feature')
                        <p class="m-0 text-danger">{{ $message }}</p>
                    @enderror
                </div>

               

                <div class="form-group">
                    <label for="text">وصف  للمنتج</label>
                    <textarea required rows="6" name="text" id="text" class="form-control" placeholder="وصف  للمنتج">{{ old('text') }}</textarea>
                    @error('text')
                        <p class="m-0 text-danger">{{ $message }}</p>
                    @enderror
                </div>
            </div>

        </div>

        <div class="row">
            <div class="col-md-4">
                <div class="form-group text-center">
                    <label for="image1">
                        <img src="" class="preview" alt="">
                    </label>
                    <input type="file" name="image1" accept="image/*" id="image1" class="d-none"/>
                    @error('image1')
                        <p class="m-0 text-danger">{{ $message }}</p>
                    @enderror
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group text-center">
                    <label for="image2">
                        <img src="" class="preview" alt="">
                    </label>
                    <input type="file" name="image2" accept="image/*" id="image2" class="d-none"/>
                    @error('image2')
                        <p class="m-0 text-danger">{{ $message }}</p>
                    @enderror
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group text-center">
                    <label for="image3">
                        <img src="" class="preview" alt="">
                    </label>
                    <input type="file" name="image3" accept="image/*" id="image3" class="d-none"/>
                    @error('image3')
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
