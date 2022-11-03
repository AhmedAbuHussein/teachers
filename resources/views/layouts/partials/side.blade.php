<aside class="left-sidebar" data-sidebarbg="skin5">
    <div class="scroll-sidebar">
        <nav class="sidebar-nav">
            <ul id="sidebarnav">

                <li class="sidebar-item">
                    <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{ route('dashboard.index') }}" aria-expanded="false">
                        <i class="mdi mdi-av-timer"></i>
                        <span class="hide-menu">لوحة التحكم</span>
                    </a>
                </li>
                
                 <li class="sidebar-item">
                    <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{ route('dashboard.categories.index') }}" aria-expanded="false">
                        <i class="mdi mdi-arrange-bring-forward"></i>
                        <span class="hide-menu">الفئات</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{ route('dashboard.products.index') }}" aria-expanded="false">
                        <i class="ti ti-shopping-cart"></i>
                        <span class="hide-menu">المنتجات</span>
                    </a>
                </li>

                <li class="sidebar-item">
                    <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{ route('dashboard.posts.index') }}" aria-expanded="false">
                        <i class="ti ti-power-off"></i>
                        <span class="hide-menu">المنشورات</span>
                    </a>
                </li>

                <li class="sidebar-item">
                    <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{ route('dashboard.comments.index') }}" aria-expanded="false">
                        <i class="ti ti-comments"></i>
                        <span class="hide-menu">التعليقات</span>
                    </a>
                </li>

                <li class="sidebar-item">
                    <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{ route('dashboard.users.index') }}" aria-expanded="false">
                        <i class="ti ti-user"></i>
                        <span class="hide-menu">المستخدمون</span>
                    </a>
                </li>

                <li class="sidebar-item">
                    <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{ route('dashboard.levels.index') }}" aria-expanded="false">
                        <i class="ti ti-list"></i>
                        <span class="hide-menu">المستوي</span>
                    </a>
                </li>

                <li class="sidebar-item">
                    <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{ route('dashboard.courses.index') }}" aria-expanded="false">
                        <i class="ti ti-book"></i>
                        <span class="hide-menu">المواد</span>
                    </a>
                </li>

                <li class="sidebar-item">
                    <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{ route('dashboard.materials.index') }}" aria-expanded="false">
                        <i class="ti ti-list-ol"></i>
                        <span class="hide-menu">الدروس</span>
                    </a>
                </li>

                <li class="sidebar-item">
                    <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{ route('dashboard.contacts.index') }}" aria-expanded="false">
                        <i class="ti ti-control-play"></i>
                        <span class="hide-menu">تواصل معنا</span>
                    </a>
                </li>

                <li class="sidebar-item">
                    <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{ route('dashboard.payments.index') }}" aria-expanded="false">
                        <i class="ti ti-money"></i>
                        <span class="hide-menu">عمليات الشراء</span>
                    </a>
                </li>

                <li class="sidebar-item">
                    <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{ route('dashboard.privacy.index') }}" aria-expanded="false">
                        <i class="ti ti-lock"></i>
                        <span class="hide-menu">سياسة الاستخدام</span>
                    </a>
                </li>

                <li class="sidebar-item">
                    <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{ route('dashboard.settings.index') }}" aria-expanded="false">
                        <i class="ti ti-settings"></i>
                        <span class="hide-menu">الاعدادات</span>
                    </a>
                </li>

                <li class="sidebar-item">
                    <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{ route('logout') }}"
                    onclick="event.preventDefault();
                                  document.getElementById('logout-form').submit();" aria-expanded="false">
                        <i class="fa fa-sign-out"></i>
                        <span class="hide-menu">تسجيل الخروج</span>
                    </a>
                </li>

            </ul>
        </nav>
    </div>
</aside>