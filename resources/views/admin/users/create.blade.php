@extends('layouts.admin')

@section('title')
اضافة
@endsection
@section('breadcrumb')
<li class="breadcrumb-item"> 
    <a href="{{ route('dashboard.users.index') }}">المستخدمون</a> 
</li>
<li class="breadcrumb-item">اضافة</li>
@endsection

@section('content')
<div class="container-fluid">
    <form action="{{ route('dashboard.users.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="fname">الاسم الاول</label>
                    <input type="text" required name="fname" id="fname" value="{{ old('fname') }}" class="form-control" placeholder="الاسم الاول">
                    @error('fname')
                        <p class="m-0 text-danger">{{ $message }}</p>
                    @enderror
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="lname">الاسم الاخير</label>
                    <input type="text" required name="lname" id="lname" value="{{ old('lname') }}" class="form-control" placeholder="الاسم الاخير">
                    @error('lname')
                        <p class="m-0 text-danger">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group">
                    <label for="email">البريد الالكتروني</label>
                    <input type="email" required name="email" id="email" value="{{ old('email') }}" class="form-control" placeholder="البريد الالكتروني">
                    @error('email')
                        <p class="m-0 text-danger">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group">
                    <label for="phone">الهاتف</label>
                    <input type="text" name="phone" id="phone" value="{{ old('phone') }}" class="form-control" placeholder="الهاتف">
                    @error('phone')
                        <p class="m-0 text-danger">{{ $message }}</p>
                    @enderror
                </div>
            </div>
            
            <div class="col-md-6">
                <div class="form-group">
                    <label for="status">الحالة</label>
                    <select required name="status" id="status" class="form-control">
                        <option value="">اختار الحالة</option>
                        <option {{ old('status') == 'active' ? 'selected': '' }} value="active">نشط</option>
                        <option {{ old('status') == 'inactive' ? 'selected': '' }} value="inactive">غير نشط</option>
                    </select>
                    @error('status')
                        <p class="m-0 text-danger">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group">
                    <label for="role">الدور</label>
                    <select required name="role" id="role" class="form-control">
                        <option value="">اختار الدور</option>
                        <option {{ old('role') == 'admin' ? 'selected': '' }} value="admin">مدير</option>
                        <option {{ old('role') == 'supervisor' ? 'selected': '' }} value="supervisor">مشرف</option>
                        <option {{ old('role') == 'professor' ? 'selected': '' }} value="professor">دكتور</option>
                    </select>
                    @error('role')
                        <p class="m-0 text-danger">{{ $message }}</p>
                    @enderror
                </div>
            </div>


            <div class="col-md-6">
                <div class="form-group">
                    <label for="password">كلمة المرور</label>
                    <input type="password" required name="password" id="password" value="{{ old('password') }}" class="form-control" placeholder="كلمة المرور">
                    @error('password')
                        <p class="m-0 text-danger">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group">
                    <label for="password_confirmation">تاكيد كلمة المرور</label>
                    <input type="password" required name="password_confirmation" id="password_confirmation" value="{{ old('password_confirmation') }}" class="form-control" placeholder="تاكيد كلمة المرور">
                    @error('password_confirmation')
                        <p class="m-0 text-danger">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group">
                    <label for="address">العنوان التفصيلي</label>
                    <textarea rows="6" name="address" id="address" class="form-control" placeholder="العنوان التفصيلي">{{ old('address') }}</textarea>
                    @error('address')
                        <p class="m-0 text-danger">{{ $message }}</p>
                    @enderror
                </div>
            </div>
           
            <div class="col-md-6">

                <div class="form-group">
                    <label for="bio">السيرة الذاتية</label>
                    <textarea rows="6" name="bio" id="bio" class="form-control" placeholder="السيرة الذاتية">{{ old('bio') }}</textarea>
                    @error('bio')
                        <p class="m-0 text-danger">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group text-center">
                    <label for="image">
                        <img src="" class="preview" alt="">
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
