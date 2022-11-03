<div class="page-breadcrumb">
    <div class="row">
        <div class="col-5 align-self-center">
            <h4 class="page-title">@yield('title', 'لوحة التحكم')</h4>
        </div>
        <div class="col-7 align-self-center">
            <div class="d-flex align-items-center justify-content-end">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"> <a href="{{ route('dashboard.index') }}">لوحة التحكم</a> </li>
                        @yield('breadcrumb')
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>
