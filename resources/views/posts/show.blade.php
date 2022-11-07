@extends('layouts.app')
@section("title")
    عرض
@endsection
@section('breadcrumb')
    <li><a href="{{ route('posts.index') }}">المناقشات</a></li>
    <li> 
        <span>عرض</span>
    </li>
@endsection
@section('content')

<main class="container">
    <div class="row">
        <div class="col-8 mx-auto">
            <section class="post">
                <div class="post-header">
                    <div class="post-img">
                        <img src="{{ optional($post->user)->avatar }}" alt="">
                    </div>
                    <div class="post-meta">
                        <h4>{{ optional($post->user)->fname . ' '. optional($post->user)->lname }}</h4>
                        <p class="d-flex justify-content-between">
                            <span style="padding-left: 15px;">{{ $post->title }}</span> 
                            <span>{{ $post->created_at->diffForHumans() }}</span>
                        </p>
                        
                    </div>
                </div>
                <div class="post-body">
                    @if ($post->type == "text")
                        <p>{{ $post->src }}</p>
                    @elseif ($post->type == "image")
                        <img src="{{ Storage::url($post->src) }}" alt="">
                    @elseif($post->type == "url")
                    يمكنك الحصول علي معلومات اكثر من خلال هذا <a target="_blank" href="{{ $post->src }}">اللينك</a>
                    @elseif($post->type == 'video')
                    <iframe src="{{ Storage::url($post->src) }}" frameborder="0"></iframe>
                    @endif
                    
                </div>
            </section>
        </div>
  
        <div class="col-8 mx-auto">
            <form action="{{ route('posts.comments.store', ['post'=> $post->id]) }}" method="POST">
                @csrf

                <div class="form-group">
                    <textarea name="text" id="text" placeholder="يمكنك كتابة تعليق" rows="6" class="form-control">{{ old('text') }}</textarea>
                    @error('text')
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
            @forelse ($comments as $item)
                <section class="post">
                    <div class="post-header bg-green">
                        <div class="post-img">
                            <img src="{{ optional($item->user)->avatar }}" alt="">
                        </div>
                        <div class="post-meta w-100">
                            <h4>{{ optional($item->user)->fname . ' '. optional($item->user)->lname }}</h4>
                            <p class="d-flex justify-content-start">
                                <span>{{ $item->created_at->diffForHumans() }}</span>
                            </p>
                        </div>
                        <div class="post-control">
                            @if ($item->user_id == auth()->id() || auth()->user()->role == "admin")
                            <a onclick="deleteItem('{{ route('posts.comments.destroy', ['post'=> $post->id,'comment'=>$item->id]) }}')" class="destroy-btn"><i class="fa fa-trash"></i></a>
                            @endif
                        </div>
                    </div>
                    <div class="post-body">
                        <p>{{ $item->text }}</p>                        
                    </div>
                </section>
            @empty
                <div class="d-flex justify-content-center align-items-center" style="min-height: 400px;">لا يوجد تعليقات لعرضها في الوقت الحالي</div>
            @endforelse
            
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

        .post .bg-green{
            background: #114f32;
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
            color: #fff;
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
            swal("هل تريد حذف التعليق ؟",{
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
