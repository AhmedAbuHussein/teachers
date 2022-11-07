@extends('layouts.app')

@section('breadcrumb')
    <li>
        <span>انشاء حساب</span>
    </li>
@endsection

@section('content')

<main class="main-content">

    <!-- Start Req-page -->
    <section class="req-page body-inner">
        <div class="container">
            <div class="row">
                <!-- Col -->
                <div class="col-md-12">
                    <div class="form-req">
                        <div class="form-inner">
                            <h3>انشاء حساب</h3>

                            <form action="{{ route('register') }}" method="POST">
                                @csrf
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>الاسم الاول</label>
                                            <input type="text" required value="{{ old('fname') }}" name="fname" placeholder="الاسم الاول" class="form-control" />
                                            @error('fname')
                                                <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>الاسم الاخير</label>
                                            <input type="text" required value="{{ old('lname') }}" name="lname" placeholder="الاسم الاخير" class="form-control" />
                                            @error('lname')
                                                <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="form-group">
                                    <label>البريد الإليكتروني</label>
                                    <input type="email" required value="{{ old('email') }}" name="email" placeholder="البريد الإليكتروني" class="form-control" />
                                    @error('email')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label>رقم الهاتف</label>
                                    <input type="number" required value="{{ old('phone') }}" name="phone" placeholder="رقم الهاتف" class="form-control" />
                                    @error('phone')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label>كلمة السر</label>
                                    <input type="password" required name="password" placeholder="كلمة المرور" class="form-control"  />
                                    @error('password')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>تأكيد كلمة السر</label>
                                    <input type="password" name="password_confirmation" placeholder="تاكيد كلمة المرور" class="form-control"  required />
                                </div>
                                <div class="form-group">
                                    <div class="agree-h">
                                        <input type="checkbox" />
                                        <span>قرأت كل <a target="_blank" href="{{ route('privacy') }}">الشروط والأحكام</a></span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <button class="btn btn-form" type="submit">
                                        <span>إنشاء حساب</span>
                                    </button>
                                    <a href="{{ route('login') }}" class="aready-account">لديك حساب بالفعل ؟</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- /Col -->
            </div>
        </div>
    </section>
    <!-- End Req-page -->
</main>
@endsection
