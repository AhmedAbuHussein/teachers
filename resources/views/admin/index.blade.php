@extends('layouts.admin')

@section('title')
    لوحة التحكم
@endsection

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-3">
            <div class="card">
                <div class="card-body">
                    <a href="/" class="cart">
                        <i class="fa fa-users"></i>
                        <span class="home-cart">{{ $users }}</span>
                        <p class="home-cart-p">المستخدمون</p>
                    </a>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card">
                <div class="card-body">
                    <a href="/" class="cart">
                        <i class="ti ti-shopping-cart"></i>
                        <span class="home-cart">{{ $products }}</span>
                        <p class="home-cart-p">المنتجات</p>
                    </a>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card">
                <div class="card-body">
                    <a href="/" class="cart">
                        <i class="ti ti-comments"></i>
                        <span class="home-cart">{{ $comments }}</span>
                        <p class="home-cart-p">التعليقات</p>
                    </a>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card">
                <div class="card-body">
                    <a href="/" class="cart">
                        <i class="ti ti-list-ol"></i>
                        <span class="home-cart">{{ $courses }}</span>
                        <p class="home-cart-p">الدروس</p>
                    </a>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection
@section('style')
    <style>
        a.cart:hover{
            color: #242424;
        }

        .cart{
            display: block;
            width: 100%;
            height: 100%;
            color: #636363;
            transition: ease-in-out 0.2s;
        }

        .cart i{
            font-size: 100px;
        }
        .home-cart{
            position: absolute;
            top: 10px;
            font-size: 75px;
            left: 61px;
        }
        .home-cart-p{
            text-align: center;
            font-size: 27px;
            margin: 0;
            padding: 6px;
        }
    </style>
@endsection