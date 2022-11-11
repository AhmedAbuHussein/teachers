<header class="sticky">

    <!-- Start Header-bottom -->
    <div class="header-bottom">
        <div class="container">
            <div class="row">
                <!-- Col -->
                <div class="col-md-12">
                    <div class="head-top">
                        <div class="logo">
                            <a href="{{ route('index') }}">
                                <img src="{{ asset('images/logo.png') }}" />
                            </a>
                        </div>
                        <div class="nav-head nav-med">

                            <ul>
                                <li class="{{ active('index') }}">
                                    <a href="{{ route('index') }}">
                                        الرئيسية
                                    </a>
                                </li>
                               @auth
                                <li class="{{ active('news.index') }}">
                                    <a href="{{ route('news.index') }}">
                                        الاخبار
                                    </a>
                                </li>
                                <li class="{{ active('library.index') }}">
                                    <a href="{{ route('library.index') }}">
                                        المكتبة
                                    </a>
                                </li>
                                <li class="{{ active('posts.index') }}">
                                    <a href="{{ route('posts.index') }}">
                                        المناقشة
                                    </a>
                                </li>
                                @endauth
                                <li class="{{ active('about') }}">
                                    <a href="{{ route('about') }}">
                                        من نحن
                                    </a>
                                </li>
                                <li class="{{ active('privacy') }}">
                                    <a href="{{ route('privacy') }}">
                                        سياسة الاستخدام
                                    </a>
                                </li>
                                <li class="{{ active('contact') }}">
                                    <a href="{{ route('contact') }}">
                                        اتصل بنا
                                    </a>
                                </li>
                            </ul>
                        </div>

                        <div class="nav-head">
                            <div class="menu-right">
                                <div class="user-h">
                                    @guest
                                    <ul>
                                        <li>
                                            <a href="{{ route('login') }}">
                                                تسجيل الدخول
                                            </a>
                                        </li>
                                    </ul>
                                    @endguest
                                    @auth
                                        <a class="user-btn">
                                            <i class="fas fa-user"></i>
                                            <span>حسابي</span>
                                        </a>
                                        <ul class="sub-menu">
                                            
                                            <li>
                                                <a href="{{ route('profile.index') }}">الصفحة الشخصية</a>
                                            </li>
                                            <li>
                                                <a href="{{ route('logout') }}"
                                                onclick="event.preventDefault();
                                                                document.getElementById('logout-form').submit();">
                                                تسجيل الخروج
                                                </a>
            
                                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                                    @csrf
                                                </form>
                                            </li>
                                        </ul>
                                    @endauth
                                </div>

                                <div class="item res-menu">
                                    <div class="mobile-nav-toggler">
                                        <span class="icon flaticon-menu">
                                        <i class="fal fa-bars"></i>
                                    </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /Col -->
            </div>
        </div>
    </div>
    <!-- End Header-bottom -->
</header>
<!-- End Header-->