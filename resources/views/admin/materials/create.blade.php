@extends('layouts.admin')

@section('title')
اضافة
@endsection
@section('breadcrumb')
<li class="breadcrumb-item"> 
    <a href="{{ route('dashboard.materials.index') }}">المواد</a> 
</li>
<li class="breadcrumb-item">اضافة</li>
@endsection

@section('content')
<div class="container-fluid">

        <div class="row">
            <div class="col-md-6 mr-auto ml-auto">
                <form action="{{ route('dashboard.materials.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="title">العنوان</label>
                        <input type="text" autofocus required name="title" id="title" value="{{ old('title') }}" class="form-control" placeholder="العنوان">
                        @error('title')
                            <p class="m-0 text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="type">النوع</label>
                        <select required name="type" id="type" class="form-control">
                            <option {{ old('type') == 'text' ? 'selected': '' }} value="text">نص</option>
                            <option {{ old('type') == 'url' ? 'selected': '' }} value="url">لينك</option>
                            <option {{ old('type') == 'file' ? 'selected': '' }} value="file">ملف</option>
                        </select>
                        @error('type')
                            <p class="m-0 text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    
                    <div class="form-group">
                        <label for="course_id">المادة</label>
                        <select required name="course_id" id="course_id" class="form-control">
                            <option value="">اختار</option>
                            @foreach ($courses as $course)
                                <option {{ old('course_id') ==  $course->id ? 'selected': '' }} value="{{ $course->id }}">{{ $course->title }} - {{ $course->level->title }}</option>
                            @endforeach
                        </select>
                        @error('course_id')
                            <p class="m-0 text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-group" id="text">
                        <label for="src">المحتوي</label>
                        <textarea name="text" id="src" rows="6" class="form-control">{{ old('text') }}</textarea>
                        @error('text')
                            <p class="m-0 text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-group d-none" id="url">
                        <label for="src_url">لينك</label>
                        <input type="url" id="src_url" name="url" value="{{ old('url') }}" class="form-control">
                        @error('url')
                            <p class="m-0 text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-group d-none" id="media">
                        <label for="src_file">الملف</label>
                        <input type="file" id="src_file" name="src" class="form-control">
                        @error('src')
                            <p class="m-0 text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    

                    <div class="form-group d-flex justify-content-end">
                        <button type="submit" class="btn btn-primary"><i class="fa fa-send"></i> حفظ</button>
                    </div>
                </form>
            </div>
        </div>

</div>
@endsection
@section('style')
    <style>
        .preview{
            width: 220px;
            height: 180px;
            border: 1px solid #b7b7b7;
            border-radius: 3px;
        }
    </style>
@endsection
@section('script')
    <script>
        function handleInputs(val){
            if(val == "text"){
                $("#text").removeClass('d-none');
                $("#media").addClass('d-none');
                $("#url").addClass('d-none');
            }else if(val == 'url'){
                $("#url").removeClass('d-none');
                $("#media").addClass('d-none');
                $("#text").addClass('d-none');
            }else{
                $("#media").removeClass('d-none');
                $("#text").addClass('d-none');
                $("#url").addClass('d-none');
            }
        }
        $(()=> {
            handleInputs($('#type').val());
            $('#type').on('change', function(){
                let val = $(this).val();
                handleInputs(val);
            }) 
        });  
    </script>    
@endsection