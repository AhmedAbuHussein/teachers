@extends('layouts.admin')

@section('title')
تواصل معنا
@endsection
@section('breadcrumb')
<li class="breadcrumb-item">تواصل معنا</li>
@endsection

@section('content')
<div class="container-fluid">

    <div class="card">
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>الاسم الاول</th>
                        <th>الاسم الاخير</th>
                        <th>البريد الالكتروني</th>
                        <th>العنوان</th>
                        <th>التحكم</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($items as $item)
                        <tr>
                            <td>{{ $item->id }}</td>
                            <td>{{ $item->fname }}</td>
                            <td>{{ $item->lname }}</td>
                            <td>{{ $item->email }}</td>
                            <td>{{ $item->title }}</td>
                            <td>
                                <a class="btn btn-success" href="{{ route('dashboard.contacts.show', $item->id) }}"><i class="fa fa-eye"></i></a>
                                <a class="btn btn-danger confirm" href="{{ route('dashboard.contacts.destroy', $item->id) }}"><i class="fa fa-trash"></i></a>
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