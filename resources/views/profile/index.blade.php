@extends('layouts.app')
@section("title")
    الصفحة الشخصية
@endsection
@section('breadcrumb')
    <li> 
        <span>الصفحة الشخصية</span>
    </li>
@endsection
@section('content')

<main class="main-content">
    
    <!-- Start Profile-page -->
    <section class="req-page profile-page body-inner">
        <div class="container">
            <div class="row">
                <!-- Col -->
                <div class="col-md-4">
                    <div class="side-profile">
                        <div class="img-profile">
                            <form action="{{ route('profile.image') }}" id="image-form" enctype="multipart/form-data" method="POST" style="position: relative">
                                @csrf
                                <div class="profile-pic">
                                    <label class="-label" for="file">
                                      <span class="fa fa-edit"></span>
                                    </label>
                                    <input required id="file" type="file" name="image" onchange="loadFile(event)" />
                                    <img src="{{ $user->avatar }}" id="output" width="200" />
                                </div>
                                <button type="submit" class="image-upload"><i class="fa fa-upload"></i></button>
                            </form>
                            
                        </div>
                        <div class="name-profile">
                            <h3>{{ $user->fname . ' ' . $user->lname }}</h3>
                            <span>{{ $user->address }}</span>
                        </div>
                        <div class="tabs-profile">
                            <ul class="nav nav-tabs">
                                <li class="nav-item">
                                    <button class="nav-link active" data-toggle="tab" data-target="#myInfo" type="button">معلوماتي الشخصية</button>
                                </li>
                                @if ($user->role != 'admin')
                                    <li class="nav-item">
                                        <button class="nav-link" data-toggle="tab" data-target="#myServ" type="button">الدروس</button>
                                    </li>
                                    @if ($user->level_id)
                                    <li class="nav-item"> <a class="nav-link" href="{{ route('library.courses.create', ['level'=> $user->level_id]) }}">اضافة درس</a>
                                    @endif
                                </li>
                                @endif
                               
                                <li class="nav-item">
                                    <button class="nav-link" data-toggle="tab" data-target="#changePass" type="button">تغيير كلمة المرور</button>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- /Col -->

                <!-- Col -->
                <div class="col-md-8">
                    <div class="tab-content">
                        <div class="tab-pane fade show active" id="myInfo">
                            <div class="tabs-content-profile">
                                <form method="POST" action="{{ route('profile.update') }}" class="form-profile">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>الاسم الاول</label>
                                                <input type="text" required value="{{ old('fname', $user->fname) }}" name="fname" placeholder="الاسم الاول" class="form-control" />
                                                @error('fname')
                                                    <p class="text-danger">{{ $message }}</p>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>الاسم الاخير</label>
                                                <input type="text" required value="{{ old('lname', $user->lname) }}" name="lname" placeholder="الاسم الاخير" class="form-control" />
                                                @error('lname')
                                                    <p class="text-danger">{{ $message }}</p>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>البريد الإليكتروني</label>
                                                <input type="email" required value="{{ old('email', $user->email) }}" name="email" placeholder="البريد الإليكتروني" class="form-control" />
                                                @error('email')
                                                    <p class="text-danger">{{ $message }}</p>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>رقم الهاتف</label>
                                                <input type="text" value="{{ old('phone', $user->phone) }}" name="phone" placeholder="رقم الهاتف" class="form-control" />
                                                @error('phone')
                                                    <p class="text-danger">{{ $message }}</p>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>                                  
                                    
                                    <div class="form-group">
                                        <label>العنوان مكتوب تفصيلياً</label>
                                        <input type="text" value="{{ old('address', $user->address) }}" name="address" placeholder="العنوان مكتوب تفصيلياً" class="form-control" />
                                        @error('address')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label>السيرة الذاتية</label>
                                        <textarea name="bio" rows="5" placeholder="السيرة الذاتية" class="form-control" >{{ old('bio', $user->bio) }}</textarea>
                                        @error('bio')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <button class="btn btn-form" type="submit">
                                            <span>حفظ المعلومات الشخصية</span>
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="myServ">
                            <div class="tabs-content-profile tabs-content-serv">
                                <div class="all-pro row">
                                    @forelse ($courses as $item)
                                        <!-- Col -->
                                        <div class="col-md-6">
                                            <div class="pro-block">
                                                <div class="img-block">
                                                    <a href="{{ route('library.courses.show', ['level'=> $item->level_id, 'course'=> $item->id]) }}" class="img">
                                                        <img src="{{ $item->avatar }}" />
                                                    </a>
                                                </div>
                                                <div class="details">
                                                   <ul class="list-group">
                                                        <li class="list-group-item d-flex justify-content-center"> {{ $item->title }}</li>
                                                        <li class="list-group-item d-flex justify-content-between">
                                                            <span>كود الكورس</span>
                                                            <span>{{ $item->code }}</span>
                                                        </li>
                                                        <li class="list-group-item d-flex justify-content-between">
                                                            <span>المستوي</span>
                                                            <span>{{ $item->level->title }}</span>
                                                        </li>
                                                        <li class="list-group-item d-flex justify-content-between">
                                                            <span>التقييم</span>
                                                            <div class="rate">
                                                                @for ($i = $item->star; $i < 5; $i++)
                                                                    <i class="fa fa-star-o"></i>
                                                                @endfor
                        
                                                                @for ($i = 0; $i < $item->star; $i++)
                                                                    <i class="fa fa-star"></i>
                                                                @endfor                                       
                                                            </div>
                                                        </li>
                                                        <li class="list-group-item d-flex justify-content-between">
                                                           <a style="width:100%;min-width: auto !important" class="btn btn-danger bg-danger text-white" onclick="deleteItem('{{ route('library.courses.destroy', ['level'=> $item->level_id, 'course'=> $item->id]) }}')"><i class="fa fa-trash"></i></a>
                                                           <a style="width:100%;min-width: auto !important" class="btn btn-primary bg-primary" href="{{ route('library.courses.materials.all', ['course'=> $item->id]) }}"><i class="fa fa-list"></i></a>
                                                           <a style="width:100%;min-width: auto !important" class="btn btn-success bg-success" href="{{ route('library.courses.edit', ['level'=> $item->level_id, 'course'=> $item->id]) }}"><i class="fa fa-edit"></i></a>
                                                        </li>
                                                   </ul>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- /Col -->
                                    @empty
                                        <!-- Col -->
                                        <div class="col-12">
                                            <div class="d-flex justify-content-center align-items-center" style="min-height: 300px">
                                                <p>لا يوجد دروس لعرضها</p>
                                            </div>
                                        </div>
                                        <!-- /Col -->
                                    @endforelse
                                   
                                    {!! $courses->links() !!}
                                    
                                    
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="changePass">
                            <div class="tabs-content-profile">
                                <div class="form-req">
                                    <div class="form-inner">
                                        <h3>تغيير كلمة السر</h3>

                                        <form action="{{ route('profile.password') }}" method="POST" >
                                            @csrf
                                            <div class="form-group">
                                                <input type="password" name="old_password" placeholder="كلمة المرور القديمة" class="form-control" id="password-field" />
                                                <i class="fa fa-lock"></i>
                                                <span toggle="#password-field" class="fa fa-eye-slash toggle-password"></span>
                                                @error('old_password')
                                                <p class="text-danger">{{ $message }}</p>
                                                @enderror
                                            </div>

                                            <div class="form-group">
                                                <input type="password" name="password" placeholder="كلمة المرور الجديدة" class="form-control" id="password-field2" />
                                                <i class="fa fa-lock"></i>
                                                <span toggle="#password-field2" class="fa fa-eye-slash toggle-password"></span>
                                                @error('password')
                                                <p class="text-danger">{{ $message }}</p>
                                                @enderror
                                            </div>

                                            <div class="form-group">
                                                <input type="password" name="password_confirmation" placeholder="تأكيد كلمة المرور الجديدة" class="form-control" id="password-field3" />
                                                <i class="fa fa-lock"></i>
                                                <span toggle="#password-field3" class="fa fa-eye-slash toggle-password"></span>
                                            </div>
                                            <div class="form-group">
                                                <button class="btn btn-form" type="submit">
                                                    <span>حفظ التعديلات</span>
                                                </button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /Col -->
            </div>
        </div>
    </section>
    <!-- End Profile-page -->
</main>

@endsection
@section('styles')
    <style>

        .image-upload{
            position: absolute;
            opacity: 1;
            width: 36px;
            height: 36px;
            bottom: 0;
            right: 56px;
            margin: 10px;
            background: #fff;
            box-shadow: 0px 0px 6px #a4a4a429;
            border: 1px solid #EEEEEE;
            z-index: 2;
            text-align: center;
            line-height: 36px;
            border-radius: 50%;
            color: #000;
            font-size: 16px;
            transition: ease-in-out 0.2s;
            cursor: pointer;
        }

        #image-form:hover .image-upload{
            background: #ffa635;
            color: white
        }

    </style>
@endsection

@section('script')
    <script>
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