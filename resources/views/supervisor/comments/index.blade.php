@extends('layouts.supervisor')

@section('title')
التعليقات
@endsection
@section('breadcrumb')
<li class="breadcrumb-item">التعليقات</li>
@endsection

@section('content')
<div class="container-fluid">

    <div class="card">
        <div class="card-header">
            <a href="{{ route('supervisor.comments.create') }}" class="btn btn-primary"><i class="fa fa-plus-circle"></i> اضافة</a>
        </div>
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>التعليق</th>
                        <th>المستخدم</th>
                        <th>المنشور</th>
                        <th>التحكم</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($items as $item)
                        <tr>
                            <td>{{ $item->id }}</td>
                            <td>{{ Str::words($item->text, 5, '...') }}</td>
                            <td>{{ optional($item->user)->fname }}</td>
                            <td>{{ optional($item->post)->title }}</td>
                            <td>
                                <a class="btn btn-success" href="{{ route('supervisor.comments.edit', $item->id) }}"><i class="fa fa-edit"></i></a>
                                <a class="btn btn-danger confirm" href="{{ route('supervisor.comments.destroy', $item->id) }}"><i class="fa fa-trash"></i></a>
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