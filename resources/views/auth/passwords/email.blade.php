@extends('layouts.app')
@section("title")
    نسيت كلمة المرور
@endsection
@section('breadcrumb')
    <li>
        <span>نسيت كلمة المرور</span>
    </li>
@endsection

@section('content')

<main class="main-content">
    <!-- Start Login-page -->
    <section class="req-page login-page body-inner">
        <div class="container">
            <div class="row">
                <!-- Col -->
                <div class="col-md-12">
                    <div class="form-req">
                        <div class="form-inner">
                            <h3>نسيت كلمة المرور</h3>

                            <form action="{{ route('password.email') }}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <input type="email" name="email" value="{{ old('email') }}"  placeholder="بريدك الالكتروني" class="form-control" required />
                                    <i class="fa fa-envelope"></i>
                                </div>
                                <div class="form-group">
                                    <button class="btn btn-form" type="submit">
                                        <span>إرسال</span>
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
    <!-- End Login-page -->
</main>

@endsection
