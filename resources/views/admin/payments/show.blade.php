@extends('layouts.admin')

@section('title')
عرض
@endsection
@section('breadcrumb')
<li class="breadcrumb-item"> 
    <a href="{{ route('dashboard.payments.index') }}">عمليات الشراء</a> 
</li>
<li class="breadcrumb-item">عرض</li>
@endsection

@section('content')
<div class="container-fluid">

        <div class="row">
            <div class="col-md-6 mr-auto ml-auto">
                <ul class="list-group">
                    <li class="list-group-item d-flex justify-content-between">
                        <b>المستخدم</b>
                        <span>{{ optional($payment->user)->fname . ' ' . optional($payment->user)->lname }}</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between">
                        <b>المنتج</b>
                        <span>{{ optional($payment->product)->title }}</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between">
                        <b>السعر</b>
                        <span>{{ $payment->total }}</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between">
                        <b>الكمية</b>
                        <span>{{ $payment->count }}</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between">
                        <b>طريقة الدفع</b>
                        <span>{{ $payment->type }}</span>
                    </li>
                    
                    
                </ul>
            </div>
        </div>

</div>
@endsection