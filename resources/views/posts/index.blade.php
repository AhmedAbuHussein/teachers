@extends('layouts.app')
@section("title")
    المناقشة
@endsection
@section('breadcrumb')
    <li> 
        <span>المناقشة</span>
    </li>
@endsection
@section('content')

<main class="container">
    <div class="row">
        <div class="col-8 mx-auto">
            <form action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <input type="text" id="title" name="title" placeholder="عنوان المناقشة" class="form-control">
                            @error('title')
                                <p class="m-0 text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <select class="form-control" name="type" id="type">
                                <option value="text">نص</option>
                                <option value="image">صورة</option>
                                <option value="video">فيديو</option>
                                <option value="url">لينك</option>
                            </select>
                            @error('type')
                                <p class="m-0 text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                </div>             

                <div class="form-group" id="text">
                    <textarea name="text" id="src" placeholder="المحتوي" rows="6" class="form-control">{{ old('text') }}</textarea>
                    @error('text')
                        <p class="m-0 text-danger">{{ $message }}</p>
                    @enderror
                </div>
                <div class="form-group d-none" id="url">
                    <input type="url" id="src_url" placeholder="المحتوي" name="url" value="{{ old('url') }}" class="form-control">
                    @error('url')
                        <p class="m-0 text-danger">{{ $message }}</p>
                    @enderror
                </div>
                <div class="form-group d-none" id="media">
                    <input type="file" id="src_file" name="src" class="form-control">
                    @error('src')
                        <p class="m-0 text-danger">{{ $message }}</p>
                    @enderror
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-block btn-form"><i class="fa fa-send"></i> ارسال</button>
                </div>

            </form>

            <hr>
        </div>
        <div class="col-8 mx-auto">
            @forelse ($items as $item)
                <section class="post">
                    <div class="post-header">
                        <div class="post-img">
                            <img src="{{ optional($item->user)->avatar }}" alt="">
                        </div>
                        <div class="post-meta w-100">
                            <h4>{{ optional($item->user)->fname . ' '. optional($item->user)->lname }}</h4>
                            <div>
                                <p class="d-flex justify-content-start">
                                    <span style="padding-left: 15px;">{{ $item->title }}</span> 
                                    <span>{{ $item->created_at->diffForHumans() }}</span>
                                </p>
                            </div>
                        </div>
                        <div class="post-control">
                            @if ($item->user_id == auth()->id() || auth()->user()->role == "admin")
                            <a onclick="deleteItem('{{ route('posts.destroy', $item->id) }}')" class="destroy-btn"><i class="fa fa-trash"></i></a>
                            @endif
                        </div>
                    </div>
                    <div class="post-body">
                        @if ($item->type == "text")
                            <p>{{ $item->src }}</p>
                        @elseif ($item->type == "image")
                            <img src="{{ Storage::url($item->src) }}" alt="">
                        @elseif($item->type == "url")
                        يمكنك الحصول علي معلومات اكثر من خلال هذا <a target="_blank" href="{{ $item->src }}">اللينك</a>
                        @elseif($item->type == 'video')
                        <iframe src="{{ Storage::url($item->src) }}" frameborder="0"></iframe>
                        @endif
                        
                    </div>
                    <div class="post-footer">
                        <a class="button" href="{{ route('posts.show', $item->id) }}">التعليقات</a>
                        <div class="post-footer-meta">
                            <i class="fa fa-comments"></i>
                            <span>{{ $item->comments_count }}</span>
                        </div>
                    </div>
                </section>
            @empty
                <div class="d-flex justify-content-center align-items-center" style="min-height: 400px;">لا يوجد بيانات لعرضها في الوقت الحالي</div>
            @endforelse
            
        </div>
        <div class="col-8 mx-auto">
            {!! $items->links() !!}
        </div>
    </div>

</main>
@endsection

@section('styles')
    <style>
        .post{
            border: 1px solid #ffbf37;
            border-radius: 8px;
            margin: 10px 0 18px;
            overflow: hidden;
        }
        .post .post-header{
            display: flex;
            justify-content: start;
            gap: 17px;
            align-items: center;
            border-bottom: 2px solid #ffb03f;
            padding: 10px 15px;
            background: #ffa635;
        }

        .post .post-header .post-img img{
            width: 60px;
            height: 60px;
            background: #f0ffff;
            border-radius: 50%;
            padding: 3px;
            border: 1px solid #333;
        }

        .post .post-header .post-meta h4 {
            font-size: 12pt;
            margin: 0;
            color: #2e2e2e;
        }
        .post .post-header .post-meta span{
            font-size: 9pt;
            margin: 0;
            color: white;
        }

        .post .post-body{
            min-height: 100px;
            border-bottom: 2px solid #ffb03f;
            padding: 10px 15px;
        }

        .post .post-body  iframe{
            width: 100%;
            min-height: 400px;
        }

        .post .post-body  img{
            width: 100%;
            min-height: 400px;
        }

        .post .post-body > p{
            text-align: justify;
        }

        .post .post-footer {
            display: flex;
            justify-content: space-between;
        }

        .post .post-footer .button{
            padding: 15px;
            width: 50%;
            text-align: center;
            background: #b9670d;
            color: white;
            font-weight: bold;
            text-decoration: none;
        }
        .post .post-footer-meta{
            padding: 15px;
            width: 50%;
            text-align: center;
            background: #ffa645;
            color: white;
            font-weight: bold;;
        }
        .destroy-btn{
            display: block;
            width: 40px;
            color: #991616 !important;
            text-align: center;
            cursor: pointer;
        }
    </style>
@endsection


@section('script')
    <script>
        
        function deleteItem(url){
            swal("هل تريد حذف المناقشة ؟",{
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