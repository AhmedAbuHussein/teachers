@extends('layouts.admin')

@section('title')
اضافة
@endsection
@section('breadcrumb')
<li class="breadcrumb-item"> 
    <a href="{{ route('dashboard.comments.index') }}">التعليقات</a> 
</li>
<li class="breadcrumb-item">اضافة</li>
@endsection

@section('content')
<div class="container-fluid">

        <div class="row">
            <div class="col-md-6 mr-auto ml-auto">
                <form action="{{ route('dashboard.comments.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                  
                    <div class="form-group">
                        <label for="user_id">المستخدم</label>
                        <select required name="user_id" id="user_id" class="form-control">
                            <option value="">اختار</option>
                            @foreach ($users as $user)
                                <option {{ old('user_id') ==  $user->id ? 'selected': '' }} value="{{ $user->id }}">[{{ $user->role }}] {{ $user->fname . ' ' . $user->lname }} - {{ $user->email }}</option>
                            @endforeach
                        </select>
                        @error('user_id')
                            <p class="m-0 text-danger">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="post_id">المنشور</label>
                        <select required name="post_id" id="post_id" class="form-control">
                            <option value="">اختار</option>
                            @foreach ($posts as $item)
                                <option {{ old('post_id') ==  $item->id ? 'selected': '' }} value="{{ $item->id }}">{{ $item->title }}</option>
                            @endforeach
                        </select>
                        @error('post_id')
                            <p class="m-0 text-danger">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="text">التعليق</label>
                        <textarea required rows="6" name="text" id="text" class="form-control" placeholder="التعليق">{{ old('text') }}</textarea>
                        @error('text')
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