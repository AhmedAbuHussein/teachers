@extends('layouts.supervisor')

@section('title')
تعديل
@endsection
@section('breadcrumb')
<li class="breadcrumb-item"> 
    <a href="{{ route('supervisor.posts.index') }}">المنشورات</a> 
</li>
<li class="breadcrumb-item">تعديل</li>
@endsection

@section('content')
<div class="container-fluid">

        <div class="row">
            <div class="col-md-6 mr-auto ml-auto">
                <form action="{{ route('supervisor.posts.update', $post->id) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="title">العنوان</label>
                        <input type="text" autofocus required name="title" id="title" value="{{ old('title', $post->title) }}" class="form-control" placeholder="العنوان">
                        @error('title')
                            <p class="m-0 text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="type">النوع</label>
                        <select required name="type" id="type" class="form-control">
                            <option {{ old('type', $post->type) == 'text' ? 'selected': '' }} value="text">نص</option>
                            <option {{ old('type', $post->type) == 'url' ? 'selected': '' }} value="url">لينك</option>
                            <option {{ old('type', $post->type) == 'image' ? 'selected': '' }} value="image">صورة</option>
                            <option {{ old('type', $post->type) == 'video' ? 'selected': '' }} value="video">فيديوا</option>
                        </select>
                        @error('type')
                            <p class="m-0 text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="is_active">الحالة</label>
                        <select required name="is_active" id="is_active" class="form-control">
                            <option value="">اختار</option>
                            <option {{ old('is_active', $post->is_active) == '1' ? 'selected': '' }} value="1">نشط</option>
                            <option {{ old('is_active', $post->is_active) == '0' ? 'selected': '' }} value="0">غير نشط</option>
                        </select>
                        @error('is_active')
                            <p class="m-0 text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="user_id">المستخدم</label>
                        <select required name="user_id" id="user_id" class="form-control">
                            <option value="">اختار</option>
                            @foreach ($users as $user)
                                <option {{ old('user_id', $post->user_id) ==  $user->id ? 'selected': '' }} value="{{ $user->id }}">[{{ $user->role }}] {{ $user->fname . ' ' . $user->lname }} - {{ $user->email }}</option>
                            @endforeach
                        </select>
                        @error('user_id')
                            <p class="m-0 text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-group" id="text">
                        <label for="src">المحتوي</label>
                        <textarea name="text" id="src" rows="6" class="form-control">{{ old('text', $post->src) }}</textarea>
                        @error('text')
                            <p class="m-0 text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-group d-none" id="url">
                        <label for="src_url">لينك</label>
                        <input type="url" id="src_url" value="{{ old('url', $post->src) }}" name="url" class="form-control">
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

                        @if ($post->type == 'image')
                            <img src="{{ Storage::url($post->src) }}" style="width: 200px;margin-top:15px" alt="">
                        @elseif($post->type == 'video')
                            <video src="{{ Storage::url($post->src) }}"></video>
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