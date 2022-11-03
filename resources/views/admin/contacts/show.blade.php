@extends('layouts.admin')

@section('title')
عرض
@endsection
@section('breadcrumb')
<li class="breadcrumb-item"> 
    <a href="{{ route('dashboard.contacts.index') }}">تواصل معنا</a> 
</li>
<li class="breadcrumb-item">عرض</li>
@endsection

@section('content')
<div class="container-fluid">

        <div class="row">
            <div class="col-md-6 mr-auto ml-auto">
                <ul class="list-group">
                    <li class="list-group-item d-flex justify-content-between">
                        <b>الاسم الاول</b>
                        <span>{{ $contact->fname }}</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between">
                        <b>الاسم الاخير</b>
                        <span>{{ $contact->lname }}</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between">
                        <b>البريد الالكتروني</b>
                        <span>{{ $contact->email }}</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between">
                        <b>العنوان</b>
                        <span>{{ $contact->title }}</span>
                    </li>
                    <li class="list-group-item">
                        <b class="d-block">الرسالة</b>
                        <p>{{ $contact->text }}</p>
                    </li>
                    

                </ul>
            </div>
        </div>

</div>
@endsection