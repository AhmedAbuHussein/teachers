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
                        <form action="#">
                            <div class="form-group">
                                <label>الاسم</label>
                                <input type="text" class="form-control" />
                            </div>
                            <div class="form-group">
                                <label>البريد الإلكتروني</label>
                                <input type="email" class="form-control" />
                            </div>
                            <div class="form-group">
                                <label>الجوال</label>
                                <input type="text" class="form-control" />
                            </div>
                            <div class="form-group">
                                <label>الرسالة</label>
                                <textarea class="form-control"></textarea>
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
                                <span>الجوال : <u>+966 12345678</u></span>
                            </a>
                        </li>
                        <li>
                            <a href="mailto:Info@lifepulse.com">
                                <i class="la la-phone"></i>
                                <span>البريد الإلكتروني : <u>Info@lifepulse.com</u></span>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <i class="la la-map-marker"></i>
                                <span>العنزان : 77 E 4th St, New York, NY 10003, United States</span>
                            </a>
                        </li>
                    </ul>
                    <div class="social-c">
                        <a href="#" target="_balnk">
                            <i class="fab fa-instagram"></i>
                        </a>
                        <a href="#" target="_balnk">
                            <i class="fab fa-twitter"></i>
                        </a>
                        <a href="#" target="_balnk">
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
