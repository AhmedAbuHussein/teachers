@extends('layouts.app')
@section("title")
    الدفع
@endsection
@section('breadcrumb')

    <li> <a href="{{ route('products.index') }}">المنتجات</a></li>
    <li> <a href="{{ route('products.show', ['product'=> $item->id]) }}">{{ $item->title }}</a></li>
    <li><span>الدفع</span></li>
@endsection
@section('content')

<main class="main-content">

    <section class="Checkout-inner body-inner">
        <div class="container">
            <form action="{{ route('payments.buy', ['product'=> $item->id]) }}" method="POST">
                @csrf
                <div class="row">
                    <!-- Col -->
                    <div class="col-sm-12">
                        <div class="title-checkout">
                            <h3><i class="fa fa-lock"></i> الدفع</h3>
                        </div>
                    </div>
                    <!-- /Col -->
                    <!-- Col -->
                    <div class="col-md-7 col-sm-12">
                        <div class="form-check">
                            <div class="title-form">
                                <span>1</span>
                                <h3>معلوماتك الشخصية</h3>
                            </div>
                           <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>الاسم الاول *</label>
                                        <input type="text" name="fname" value="{{ $user->fname }}" class="form-control" />
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>الاسم الاخير *</label>
                                        <input type="text" name="lname" value="{{ $user->lname }}" class="form-control" />
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>عنوان البريد الالكترونى *</label>
                                        <input type="email" readonly value="{{ $user->email }}" class="form-control" />
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>رقم الهاتف * </label>
                                        <input type="text" readonly value="{{ $user->phone }}" class="form-control" />
                                    </div>
                                </div>
                            </div>
                            <div class="form-group title-in-f">
                                <div class="title-form">
                                    <span>2</span>
                                    <h3>طريقة الدفع</h3>
                                    <p>الدفع عند استلام المنتج</p>
                                </div>
                            </div>

                            
                                
                            <div class="form-group">
                                <button type="submit" class="btn btn-form">شراء</button>
                            </div>
                        </div>
                    </div>
                    <!-- /Col -->
                    <!-- Col -->
                    <div class="col-md-5 col-sm-12">
                        <div class="ceck-pro-in">
                            <h3>ملخص الطلب</h3>
                            <div class="box-checkOut-in">
                                <table>
                                    <thead>
                                        <tr>
                                            <th>
                                                المنتج
                                            </th>
                                            <th>
                                                كمية
                                            </th>
                                            <th>
                                                سعر القطعة
                                            </th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        <tr>
                                            <td>
                                               {{ $item->title }}
                                            </td>
                                            <td>
                                                <div class="quantity2">
                                                    <input type="number" min="1" readonly max="9" step="1" name="count" value="{{ $count }}">
                                                </div>
                                            </td>
                                            <td>
                                                <span class="price-check">{{ $item->discount_price ?? $item->price }} د.ك</span>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                                
                                <div class="ge-total-check">
                                    <div class="row">
                                        <!-- Col -->
                                        <div class="col-md-6">
                                            <div class="title-sub-t">
                                                <h3><strong>المجموع</strong></h3>
                                            </div>
                                        </div>
                                        <!-- /Col -->
                                        <!-- Col -->
                                        <div class="col-md-6">
                                            <div class="title-sub-t">
                                                <h3><strong>{{ round($count * $item->discount_price ?? $item->price, 1) }} د.ك</strong></h3>
                                            </div>
                                        </div>
                                        <!-- /Col -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /Col -->
                </div>
            </form>
        </div>
    </section>
    <!-- End Checkout-inner -->
    
</main>

@endsection