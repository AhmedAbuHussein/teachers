@extends('layouts.app')
@section("title")
      المواد
@endsection
@section('breadcrumb')
    <li> 
        <a href="{{ route('profile.index') }}">الصفحة الشخصية</a>
    </li>
    <li> 
        <span> المواد</span>
    </li>
@endsection
@section('content')

<main class="main-content my-4">
    <div class="container">
        <div class="card">
            <div class="card-header mb-4">
                <a href="{{ route('library.courses.materials.create', ['course'=> $course]) }}" class="btn btn-primary bg-primary"><i class="fa fa-plus"></i> اضافة</a>
            </div>
            <div class="card-body">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>الاسم</th>
                            <th>النوع</th>
                            <th>الماده</th>
                            <th>المستوي</th>
                            <th>التحكم</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($items as $item)
                            <tr>
                                <td>{{ $item->id }}</td>
                                <td>{{ $item->title }}</td>
                                <td>{{ $item->type }}</td>
                                <td>{{ optional($item->course)->title }}</td>
                                <td>{{ optional(optional($item->course)->level)->title }}</td>
                                <td>
                                    <a class="btn btn-success bg-success" style="min-width: auto" href="{{ route('library.courses.materials.edit', ['course'=> $item->course_id,'material'=>$item->id]) }}"><i class="fa fa-edit"></i></a>
                                    <a class="btn btn-danger bg-danger" style="min-width: auto" onClick="deleteItem('{{ route('library.courses.materials.destroy', ['course'=> $item->course_id,'material'=>$item->id]) }}')"><i class="fa fa-trash"></i></a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        
    </div>
</main>
@endsection
@section('styles')
<link href="{{ url('css/datatables.min.css') }}" rel="stylesheet">

    <style>
        .table-custom-image{
            width: 50px;
            padding: 5px;
            border: 1px solid #b7b7b7;
            border-radius: 3px;
            background: #ddd
        }
        .dataTables_length select{
            display: inline-block;
        }
    </style>
@endsection

@section('script')
<script src="{{ asset('js/datatables.min.js') }}"></script>
<script>
    $(function() {
        $('.table').dataTable({
            "lengthMenu": [[15, 25, 50, -1], ["۱٥", "۲٥", "٥۰", "الكل"]],
            "language": {
                url: '{{ asset("ar.json") }}'
            }
        });
    });

    function deleteItem(url){
        swal("هل تريد حذف العنصر ؟",{
            "icon": "warning",
            closeOnClickOutside: false,
            closeOnEsc: false,
            dangerMode: true,
            buttons: {
                cancel: {
                    text: "لا",
                    value: null,
                    visible: true,
                    className: "",
                    closeModal: true,
                  },
                  confirm: {
                    text: "نعم, احذف",
                    value: true,
                    visible: true,
                    className: "",
                    closeModal: true
                  }
            }
            
        }).then((result) => {
            if (result) {
              $.ajax({
                    type: "POST",
                    url: url,
                    data: {"_token": "{{ csrf_token() }}", "_method": "DELETE"},
                    success: function(data,status,xhr){
                        window.location.reload();
                    }
              });
            }
        })
    }

</script>

@endsection