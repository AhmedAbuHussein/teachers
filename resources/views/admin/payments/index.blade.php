@extends('layouts.admin')

@section('title')
عمليات الشراء
@endsection
@section('breadcrumb')
<li class="breadcrumb-item">عمليات الشراء</li>
@endsection

@section('content')
<div class="container-fluid">

    <div class="card">
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>المستخدم</th>
                        <th>المنتج</th>
                        <th>الكمية</th>
                        <th>السعر</th>
                        <th>التحكم</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($items as $item)
                        <tr>
                            <td>{{ $item->id }}</td>
                            <td>{{ optional($item->user)->fname }}</td>
                            <td>{{ optional($item->product)->title }}</td>
                            <td>{{ $item->count }}</td>
                            <td>{{ $item->total }}</td>
                            <td>
                                <a class="btn btn-success" href="{{ route('dashboard.payments.show', $item->id) }}"><i class="fa fa-eye"></i></a>
                                <a class="btn btn-danger confirm" href="{{ route('dashboard.payments.destroy', $item->id) }}"><i class="fa fa-trash"></i></a>
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