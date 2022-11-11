@extends('layouts.supervisor')

@section('title')
تعديل
@endsection
@section('breadcrumb')
<li class="breadcrumb-item"> 
    <a href="{{ route('supervisor.materials.index') }}">االمواد</a> 
</li>
<li class="breadcrumb-item">تعديل</li>
@endsection

@section('content')
<div class="container-fluid">

        <div class="row">
            <div class="col-md-6 mr-auto ml-auto">
                <form action="{{ route('supervisor.materials.update', $material->id) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="title">العنوان</label>
                        <input type="text" autofocus required name="title" id="title" value="{{ old('title', $material->title) }}" class="form-control" placeholder="العنوان">
                        @error('title')
                            <p class="m-0 text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="type">النوع</label>
                        <select required name="type" id="type" class="form-control">
                            <option {{ old('type', $material->type) == 'text' ? 'selected': '' }} value="text">نص</option>
                            <option {{ old('type', $material->type) == 'url' ? 'selected': '' }} value="url">لينك</option>
                            <option {{ old('type', $material->type) == 'file' ? 'selected': '' }} value="file">ملف</option>
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
                                <option {{ old('course_id', $material->course_id) ==  $course->id ? 'selected': '' }} value="{{ $course->id }}">{{ $course->title }}</option>
                            @endforeach
                        </select>
                        @error('course_id')
                            <p class="m-0 text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-group" id="text">
                        <label for="src">المحتوي</label>
                        <textarea name="text" id="src" rows="6" class="form-control">{{ old('text', $material->src) }}</textarea>
                        @error('text')
                            <p class="m-0 text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-group d-none" id="url">
                        <label for="src_url">لينك</label>
                        <input type="url" id="src_url" value="{{ old('url', $material->src) }}" name="url" class="form-control">
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

                        @if ($material->type == 'file')
                            <iframe src="{{ Storage::url($material->src) }}" frameborder="0" style="width:100%;min-height:300px ;max-height:350px;margin-top: 15px;"></iframe>
                        @endif

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