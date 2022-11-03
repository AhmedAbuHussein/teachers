@extends('layouts.app')

@section('breadcrumb')
    <li>
        <span>تسجيل دخول</span>
    </li>
@endsection

@section('content')
<section class="req-page login-page body-inner">
    <div class="container">
        <div class="row">
            <!-- Col -->
            <div class="col-md-12">
                <div class="form-req">
                    <div class="form-inner">
                        <h3>تسجيل دخول</h3>

                        <form action="{{ route('login') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <input type="email" name="email" value="{{ old('email') }}" placeholder="البريد الالكتروني" class="form-control" required />
                                <i class="fa fa-envelope"></i>
                                @error('email')
                                    <p class="m-0 text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="form-group">
                                <input type="password" name="password" placeholder="كلمة المرور" class="form-control" required />
                                <i class="fa fa-lock"></i>
                                @error('email')
                                <p class="m-0 text-danger">{{ $message }}</p>
                            @enderror
                            </div>
                            <div class="form-group">
                                <div class="agree-login">
                                    <div class="agree-h">
                                        <input type="checkbox" name="remember" value="1" />
                                        <span>تذكرني</span>
                                    </div>
                                    <a href="{{ route('password.request') }}" class="forget-pass">نسيت كلمة السر</a>
                                </div>
                            </div>
                            <div class="form-group">
                                <button class="btn btn-form" type="submit">
                                    <span>تسجيل الدخول</span>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- /Col -->
        </div>
    </div>
</section>
@endsection
