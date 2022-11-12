@extends('layouts.app')
@section("title")
      المواد
@endsection
@section('breadcrumb')
    <li> 
        <a href="{{ route('profile.index') }}">الصفحة الشخصية</a>
    </li>
    <li> 
        <a href="{{ route('library.courses.materials.all', ['course'=> $course]) }}">المواد</a>
    </li>
    <li> 
        <span> المواد</span>
    </li>
@endsection
@section('content')

<main class="main-content my-4">
    <div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <form action="{{ route('library.courses.materials.update', ['course'=> $course, 'material'=> $material]) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="title">العنوان</label>
                        <input type="text" autofocus required name="title" id="title" value="{{ old('title',$material->title) }}" class="form-control" placeholder="العنوان">
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
                    
                    <div class="form-group" id="text">
                        <label for="src">المحتوي</label>
                        <textarea name="text" id="src" rows="6" class="form-control">{{ old('text', $material->src) }}</textarea>
                        @error('text')
                            <p class="m-0 text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-group d-none" id="url">
                        <label for="src_url">لينك</label>
                        <input type="url" id="src_url" name="url" value="{{ old('url', $material->type == 'url' ?  $material->src : '') }}" class="form-control">
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

                    <div class="form-group d-flex justify-content-start">
                        <button type="submit" class="btn btn-primary bg-primary"><i class="fa fa-send"></i> حفظ</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</main>
@endsection

@section('styles')
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