@extends('client.layouts.master1')
@section('title')
	Tìm kiếm sản phẩm
@endsection

@section('content')

<style type="text/css">
.menudoc ul {

 width: 240px;
 padding: 0px;
 list-style-type: none;
 text-align: left;
}
.menudoc li {
 width: auto;
 height: 30px;
 line-height: 30px;
 background-color: #CAE8EF;
 border: 1px solid #CDCDCD;
 border-radius: 5%;
 margin: 3px 1px;
 padding: 0px 10px;
}
.menudoc li a {
 text-decoration: none;
 color: #333;
 font-weight: bold;
 display: block;
 font-size: 13px;
}
.menudoc li:hover {
 background-color: #8AD385;
}

</style>
  <div class="services-breadcrumb">
    <div class="agile_inner_breadcrumb">
      <div class="container">
        <ul class="w3_short">
          <li>
            <a href="{{asset('home')}}">Trang Chủ</a>
            <i>|</i>
          </li>
          <li>Tìm kiếm sản phẩm</li>
        </ul>
      </div>
    </div>
  </div>
<br>

<div class="row">
  <div class="col-md-9">
    <!-- search -->
@if(count($search) >0 )
<div class="nameproduct font-italic" style="background-color:rgb(44, 89, 137);">
    <!-- <h2 style="text-align: center;color: white" >@if(isset($nike)) {{ $nike[0]->categories->name }} @endif</h2> -->
        <h3 style="text-align: center;color: white; margin: auto;" >Tìm thấy  {{ count($search) }} sản phẩm</h3>
 </div>
<!--  <h2 class="heading-tittle text-center font-italic nameproduct">@if(isset($nike)) {{ $nike[0]->categories->name }} @endif</h2> -->

  <div class="row border">
    @foreach($search as $hot)
  <div class="col-sm-6 col-md-6 ">
    <div class="thumbnail ">
      <img src="img/upload/product/{{ $hot ->image }}"  class="border1" width="99%">
      <div class="caption ">
        <h6 style="text-align: center">{{$hot ->name }}</h6>
        <div style=" text-align: center;" with='100%'>
         @if($hot->promotional>0)
        <span class="item_price" style="text-align: center">
          {{ number_format($hot->promotional) }} đ
        </span>
        <del style="text-align: center;color: red">{{ number_format($hot->price) }} đ</del>
      @else
        <span class="item_price" style="text-align: center">
          {{ number_format($hot->price) }} đ
        </span>
      @endif
      </div>
        <p style="text-align:center "><a href="{{$hot->slug}}.html" class="btn btn-primary" role="button">Chi tiết</a> 
         <a href="{{route('addCart',['id'=>$hot->id]) }}" class="btn btn-success" role="button">Thêm giỏ hàng</a></p>
      </div>
    </div>
  </div>

  @endforeach
  </div >
  <div class="row fl" >
  <div class="col-md-12 col-sm-12"> {{ $search->links() }}</div>
</div>
  @else
  <div class="row">
    <div class="col-md-12">
  <div style="color: #FC040A ;text-align: center;" >
    Sản phẩm bạn cần tìm đã hết! Vui lòng chọn sản phẩm khác.
 </div>
 </div>
  </div>

@endif

<!--endsearch -->
  </div>
  <div class="col-md-3">
        <div id="right2">
            <div class="menudoc">
                <ul><h4>Danh Mục Sản Phẩm</h4>
                  @foreach($dmsp as $dm)
                   <li><a href="cate/{{$dm->id}}">{{$dm ->name }}</a></li>
                  @endforeach

                </ul>
            </div>
  </div>

</div>
</div>

@endsection