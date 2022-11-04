@extends('layouts.app')
@section("title")
    اتصل بنا
@endsection
@section('breadcrumb')
    <li> 
        <span>اتصل بنا</span>
    </li>
@endsection

@section('content')

<section class="contact-page body-inner">
    <div class="container">
        <div class="row">
            <!-- Col -->
            <div class="col-md-8">
                <div class="contact-inner">
                    <div class="contact-form">
                        <h3>أرسل رسالة</h3>
                        <form action="{{ route('contact') }}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>الاسم الاول</label>
                                        <input type="text" name="fname" value="{{ old('fname') }}" placeholder="الاسم الاول" class="form-control" />
                                        @error('fname')
                                           <p class="text-danger">{{ $message }}</p> 
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>الاسم الاخير</label>
                                        <input type="text" name="lname" value="{{ old('lname') }}" placeholder="الاسم الاخير" class="form-control" />
                                        @error('lname')
                                           <p class="text-danger">{{ $message }}</p> 
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>البريد الإلكتروني</label>
                                <input type="email" name="email" value="{{ old('email') }}" placeholder="البريد الالكتروني" class="form-control" />
                                @error('email')
                                    <p class="text-danger">{{ $message }}</p> 
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>العنوان</label>
                                <input type="text" name="title" value="{{ old('title') }}" placeholder="عنوان الرسالة" class="form-control" />
                                @error('title')
                                    <p class="text-danger">{{ $message }}</p> 
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>الرسالة</label>
                                <textarea class="form-control" name="text" placeholder="محتوي الرسالة">{{ old('text') }}</textarea>
                                @error('text')
                                <p class="text-danger">{{ $message }}</p> 
                            @enderror
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-form"><span>إرسال</span></button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- /Col -->

            <!-- Col -->
            <div class="col-md-4 col-sm-12">
                <div class="info-contact">
                    <h3>معلومات التواصل</h3>
                    <ul>
                        <li>
                            <a href="tel:96612345678">
                                <i class="la la-phone"></i>
                                <span>الهاتف : <u>{{ $setting->phone }}</u></span>
                            </a>
                        </li>
                        <li>
                            <a href="mailto:{{ $setting->email }}">
                                <i class="la la-envelope"></i>
                                <span>البريد الإلكتروني : <u>{{ $setting->email }}</u></span>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <i class="la la-map-marker"></i>
                                <span>العنوان : {{ $setting->address1 }}</span>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <i class="la la-map-marker"></i>
                                <span>العنوان : {{ $setting->address2 }}</span>
                            </a>
                        </li>
                    </ul>
                    <div class="social-c">
                        <a href="https://www.instagram.com/" target="_balnk">
                            <i class="fab fa-instagram"></i>
                        </a>
                        <a href="https://twitter.com/" target="_balnk">
                            <i class="fab fa-twitter"></i>
                        </a>
                        <a href="https://www.facebook.com/" target="_balnk">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                    </div>
                </div>
            </div>
            <!-- /Col -->
        </div>
    </div>
</section>

@endsection
