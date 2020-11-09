
  <nav class=" navbar navbar-expand-lg navbar-light sticky-top">
  <button class="navbar-toggler do" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
  <span class="navbar-toggler-icon"></span>
  </button>

  <div class=" collapse  navbar-collapse" id="navbarTogglerDemo02">
    <ul class=" navbar-nav mr-auto mt-2 mt-lg-0 container menuleft " >
      <li class="nav-item active border-right  home">
        <a class="nav-link" href="{{ asset('home') }}" style="color: #FEFCFC">TRANG CHỦ</a>
      </li>
    @foreach($category as $cate)
     <li class="nav-item border-right dropdown">
      <a class="nav-link dropdown-toggle" href="cate/{{$cate->id}}"  style="color:
      #FEFCFC ">
      {{ $cate -> name}}
      </a>
      <!-- category có function relationship với producttype -->
      @if(count($cate->productType)>0)
      <ul class="dropdown-menu">
        @foreach($cate->productType as $protype)
        <a class="dropdown-item" href="protype/{{$protype->id}}" >{{ $protype -> name }}</a>
        @endforeach 
      </ul>
      @endif
     
    </li>
    @endforeach

      <!-- tài khoản -->
        <li class="nav-item border-right ">
            <a class="nav-link" href="" style="color: #FEFCFC" data-toggle="modal" data-target="#login"> TÀI KHOẢN </a>
      </li>
       @if(Auth::check())
      <li class="nav-item dropdown border-right ">
      <a class="nav-link dropdown-toggle" href="" id="navbardrop" title="Cài đặt tài khoản" data-toggle="dropdown" style="color:
      #FEFCFC ">
          {{ Auth::user()->name }}
      </a>
      <div class="dropdown-menu">
      @if(Auth::user()->password =='')       
        <a class="dropdown-item" href="" data-toggle="modal" data-target="#updatepass">Cập nhật mật khẩu</a>
        @endif
        <a class="dropdown-item" href="#">Cập nhật thông tin cá nhân</a>
        <a class="dropdown-item" href="damua/{{Auth::user()->id}}">xem lịch sử mua hàng</a>
        <a class="dropdown-item" href="logout">Đăng xuất</a>
      </div>
    </li>
          @endif

    </ul>
<!--     <form class="form-inline my-2 my-lg-0">
      <input class="form-control" type="search" placeholder="Tìm kiếm sản phẩm" style="width: auto; " >
         <button type="submit" class="btn btn-dark" style="border-radius: 5px; margin-left: 5px;margin-right:5px;"> Tìm kiếm</button>
    </form> -->
  </div>
</nav>

<!-- modal -->
<!-- modal update pass -->
                   <div class="modal fade updatepass" id="updatepass" tabindex="-1" role="dialog" aria-hidden="true"  >
                            <div class="modal-dialog " role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title text-center">Cập nhật password</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="updatepass" method="post">
                                            @csrf
                                            <div class="form-group">
                                                <label class="col-form-label">Mật Khẩu</label>
                                                <input type="password" class="form-control" placeholder="Nhập password mới" name="password">
                                                @if($errors->has('password'))
                                                    <div class="alert alert-danger">
                                                        {{ $errors->first('password') }}
                                                    </div>
                                                @endif
                                            </div>
                                            <div class="form-group">
                                                <label class="col-form-label">Nhập Lại Mật Khẩu</label>
                                                <input type="password" class="form-control" placeholder="Nhập lại password" name="re_password">
                                                @if($errors->has('re_password'))
                                                    <div class="alert alert-danger">
                                                        {{ $errors->first('re_password') }}
                                                    </div>
                                                @endif
                                            </div>
                                            <div class="right-w3l">
                                                <input type="submit" class="form-control" style="background-color: 
                                                #0A0AEB ; color: white" value="Cập nhật">
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
<!-- ebd -->

  <!-- log in -->
  <div class="modal fade modallogin" id="login" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title text-center">Đăng Nhập</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="{{  route('login') }}" method="post">
            @csrf
            <div class="form-group">
              <label class="col-form-label">Địa Chỉ Email</label>
              <input type="text" class="form-control" placeholder="Email đăng nhập" name="email">
            </div>
            <div class="form-group">
              <label class="col-form-label">Mật Khẩu</label>
              <input type="password" class="form-control" placeholder=" " name="password">
            </div>
            <div class="right-w3l">
              <div class="row">
                <div class="col-md-6">
                <input type="submit" class="form-control" style="background-color: #5607F8 ; color: white" value="Đăng Nhập">  
                </div>
              <!--   <div class="col-md-2 "></div> -->
                <div  class="col-md-6">
              <button type="button" data-toggle="modal" data-target="#register"  style="text-align: center; width: 100%;height: 100% " class="btn btn-outline-danger">Đăng kí ngay</button>
                </div>
              </div>
            </div>
            <div class="right-w3l ">
              <a href="login/facebook" class="btn btn-primary" style="width: 100%;margin-top: 5px">Đăng nhập bằng facebook</a>
            </div>
            <div class="sub-w3l">
              <div class="custom-control custom-checkbox mr-sm-2">
                <input type="checkbox" class="custom-control-input" name='remember' id="customControlAutosizing">
                <label class="custom-control-label" for="customControlAutosizing" >Nhớ Mật Khẩu?</label>
              </div>
            </div>
<!--            <p class="text-center dont-do mt-3">Nếu bạn chưa có tài khoản?
              <a href="#" data-toggle="modal" data-target="#register">
                Đăng Ký Ngay
              </a>
            </p> -->
          </form>
        </div>
      </div>
    </div>
  </div>
  <!-- register -->
  <div class="modal fade" id="register" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Đăng Ký</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="{{  route('register') }}" method="post">
            @csrf
            <div class="form-group">
              <label class="col-form-label">Họ và tên</label>
              <input type="text" class="form-control" placeholder="Nhập họ và tên" name="name">
              @if($errors->has('name'))
                <div class="alert alert-danger">
                  {{ $errors->first('name') }}
                </div>
                        @endif
            </div>
            <div class="form-group">
              <label class="col-form-label">Địa chỉ email</label>
              <input type="email" class="form-control" placeholder="Nhập địa chỉ email" name="email">
              @if($errors->has('email'))
                <div class="alert alert-danger">
                  {{ $errors->first('email') }}
                </div>
                        @endif
            </div>
            <div class="form-group">
              <label class="col-form-label">Mật khẩu</label>
              <input type="password" class="form-control" placeholder="Nhập mật khẩu" name="password" id="password1">
              @if($errors->has('password'))
                <div class="alert alert-danger">
                  {{ $errors->first('password') }}
                </div>
                        @endif
            </div>
            <div class="form-group">
              <label class="col-form-label">Nhập lại mật khẩu</label>
              <input type="password" class="form-control" placeholder="Nhập lại mật khẩu" name="re_password" id="password2">
              @if($errors->has('re_assword'))
                <div class="alert alert-danger">
                  {{ $errors->first('re_password') }}
                </div>
                        @endif
            </div>
            <div class="right-w3l">
              <input type="submit" class="form-control  register" style="background-color: #5607F8 ; color: white" value="Đăng Ký">
            
            </div>
            <div class="sub-w3l">
              <div class="custom-control custom-checkbox mr-sm-2">
                <input type="checkbox" class="custom-control-input dieukhoan" id="customControlAutosizing2">
                <label class="custom-control-label" for="customControlAutosizing2">Đồng ý với <a href="#">điều khoản</a> của chúng tôi</label>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
  <!-- //modal -->
<!-- end modal -->