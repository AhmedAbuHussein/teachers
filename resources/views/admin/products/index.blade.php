@extends('layouts.admin')

@section('title')
المنتجات
@endsection
@section('breadcrumb')
<li class="breadcrumb-item">المنتجات</li>
@endsection

@section('content')
<div class="container-fluid">

    <div class="card">
        <div class="card-header">
            <a href="{{ route('dashboard.products.create') }}" class="btn btn-primary"><i class="fa fa-plus-circle"></i> اضافة</a>
        </div>
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>الاسم</th>
                        <th>الكود</th>
                        <th>السعر</th>
                        <th>الصورة</th>
                        <th>التحكم</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($items as $item)
                        <tr>
                            <td>{{ $item->id }}</td>
                            <td>{{ $item->title }}</td>
                            <td>{{ $item->code }}</td>
                            <td>{{ $item->discount_price ?? $item->price }}</td>
                            <td><img class="table-custom-image" src="{{ $item->avatar }}" alt=""></td>
                            <td>
                                <a class="btn btn-success" href="{{ route('dashboard.products.edit', $item->id) }}"><i class="fa fa-edit"></i></a>
                                <a class="btn btn-danger confirm" href="{{ route('dashboard.products.destroy', $item->id) }}"><i class="fa fa-trash"></i></a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    

</div>
@endsection
@section('style')
    <style>
        .table-custom-image{
            width: 50px;
            padding: 5px;
            border: 1px solid #b7b7b7;
            border-radius: 3px;
            background: #ddd
        }
    </style>
@endsection

@section('script')
<script>


    $(function() {
        $('.table').dataTable({
            "lengthMenu": [[15, 25, 50, -1], ["۱٥", "۲٥", "٥۰", "الكل"]],
            "language": {
                url: '{{ asset("ar.json") }}'
            }
        });
    });
</script>

@endsection