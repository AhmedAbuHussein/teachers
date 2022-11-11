<aside class="left-sidebar" data-sidebarbg="skin5">
    <div class="scroll-sidebar">
        <nav class="sidebar-nav">
            <ul id="sidebarnav">

                <li class="sidebar-item">
                    <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{ route('supervisor.index') }}" aria-expanded="false">
                        <i class="mdi mdi-av-timer"></i>
                        <span class="hide-menu">لوحة التحكم</span>
                    </a>
                </li>
            

                <li class="sidebar-item">
                    <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{ route('supervisor.posts.index') }}" aria-expanded="false">
                        <i class="ti ti-power-off"></i>
                        <span class="hide-menu">المنشورات</span>
                    </a>
                </li>

                <li class="sidebar-item">
                    <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{ route('supervisor.comments.index') }}" aria-expanded="false">
                        <i class="ti ti-comments"></i>
                        <span class="hide-menu">التعليقات</span>
                    </a>
                </li>

                <li class="sidebar-item">
                    <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{ route('supervisor.users.index') }}" aria-expanded="false">
                        <i class="ti ti-user"></i>
                        <span class="hide-menu">المستخدمون</span>
                    </a>
                </li>


                <li class="sidebar-item">
                    <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{ route('supervisor.courses.index') }}" aria-expanded="false">
                        <i class="ti ti-book"></i>
                        <span class="hide-menu">المواد</span>
                    </a>
                </li>

                <li class="sidebar-item">
                    <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{ route('supervisor.materials.index') }}" aria-expanded="false">
                        <i class="ti ti-list-ol"></i>
                        <span class="hide-menu">الدروس</span>
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