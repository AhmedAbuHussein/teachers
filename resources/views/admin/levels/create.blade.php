@extends('layouts.admin')

@section('title')
اضافة
@endsection
@section('breadcrumb')
<li class="breadcrumb-item"> 
    <a href="{{ route('dashboard.levels.index') }}">المستوي</a> 
</li>
<li class="breadcrumb-item">اضافة</li>
@endsection

@section('content')
<div class="container-fluid">

        <div class="row">
            <div class="col-md-6 mr-auto ml-auto">
                <form action="{{ route('dashboard.levels.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                  
                    <div class="form-group">
                        <label for="title">الاسم</label>
                        <input type="text" required name="title" id="title" value="{{ old('title') }}" class="form-control" placeholder="الاسم">
                        @error('title')
                            <p class="m-0 text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                   

                    <div class="form-group">
                        <label for="text">وصف</label>
                        <textarea required rows="6" name="text" id="text" class="form-control" placeholder="وصف">{{ old('text') }}</textarea>
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