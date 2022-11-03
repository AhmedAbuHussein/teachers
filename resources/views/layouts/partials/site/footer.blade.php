<footer>
    <!-- Start Footer-top -->
    <div class="footer-top">
        <div class="container">
            <div class="row">
                <!-- Col -->
                <div class="col-md-3 col-sm-12">
                    <div class="footer-col">
                        <a href="/" class="logo">
                            <img src="{{ asset('images/logo.png') }}" />
                        </a>
                        <div class="social-f">
                            <span>تابعنا</span>
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

                <!-- Col -->
                <div class="col-md-3 col-sm-12">
                    <div class="footer-col">
                        <ul class="info-f">
                            <li>
                                <a href="tel:056-7891-011">
                                    <div class="icon">
                                        <i class="la la-phone"></i>
                                    </div>
                                    <div class="details">
                                        <span>اتصل بنا</span>
                                        <h3>056-7891-011</h3>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="mailto:info@domain.com">
                                    <div class="icon">
                                        <i class="la la-at"></i>
                                    </div>
                                    <div class="details">
                                        <span>Contact us</span>
                                        <h3>info@domain.com</h3>
                                    </div>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <!-- /Col -->

                <!-- Col -->
                <div class="col-md-3 col-sm-12">
                    <div class="footer-col">
                        <h3>حسابي</h3>
                        <ul>
                            <li>
                                <a href="#">
                                    دخول / تسجيل
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    عربة التسوق
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    إعدادت الحساب
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <!-- /Col -->

                <!-- Col -->
                <div class="col-md-3 col-sm-12">
                    <div class="footer-col">
                        <h3>صفحات</h3>
                        <ul>
                            <li>
                                <a href="{{ route('about') }}">
                                    من نحن 
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('contact') }}">
                                    اتصل بنا
                                </a>
                            </li>
                            @auth
                            <li>
                                <a href="{{ route('products.index') }}">
                                    منتجات
                                </a>
                            </li>
                            @endauth
                        </ul>
                    </div>
                </div>
                <!-- /Col -->
            </div>
        </div>
    </div>
    <!-- End Footer-top -->

    <!-- Start Footer-bottom -->
    <div class="footer-bottom">
        <div class="container">
            <div class="row">
                <!-- Col -->
                <div class="col-md-12">
                    <div class="copy-right">
                        <p>
                            &copy; جميع الحقوق محفوظة لـ <a href="/">Teacher</a>
                        </p>
                    </div>
                </div>
                <!-- /Col -->
            </div>
        </div>
    </div>
    <!-- End Footer-bottom -->
</footer>