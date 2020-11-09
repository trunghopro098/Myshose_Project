@extends('client.layouts.master')
@section('title')
	Trang chủ
@endsection

@section('slide')
	@include('client.layouts.slide')
@endsection

@section('content')
<br>
<div class="nameproduct font-italic" style="background-color:rgb(44, 89, 137);">
    <!-- <h2 style="text-align: center;color: white" >@if(isset($nike)) {{ $nike[0]->categories->name }} @endif</h2> -->
        <h3 style="text-align: center;color: white; margin: auto;" >SẢN PHẨM NỖI BẬT</h3>
 </div>
<!--  <h2 class="heading-tittle text-center font-italic nameproduct">@if(isset($nike)) {{ $nike[0]->categories->name }} @endif</h2> -->

  <div class="row border">
    @foreach($hotproduct as $hot)
  <div class="col-sm-6 col-md-4 ">
    <div class="thumbnail">
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


    <!-- product right -->
<br>
 <div class="nameproduct font-italic" style="background-color: rgb(44, 89, 137);">
    <!-- <h2 style="text-align: center;color: white" >@if(isset($nike)) {{ $nike[0]->categories->name }} @endif</h2> -->
        <h3 style="text-align: center;color: white;margin: auto;" >SẢN PHẨM ĐANG KHUYẾN MÃI</h3>
 </div>
<!--  <h2 class="heading-tittle text-center font-italic nameproduct">@if(isset($nike)) {{ $nike[0]->categories->name }} @endif</h2> -->

	<div class="row border">
    @foreach($nike as $nik)
  <div class="col-sm-6 col-md-4 ">
    <div class="thumbnail">
      <img src="img/upload/product/{{ $nik ->image }}"  class="border1" width="99%">
      <div class="caption ">
        <h6 style="text-align: center">{{$nik ->name }}</h6>
        <div style=" text-align: center;" with='100%'>
         @if($nik->promotional>0)
        <span class="item_price" style="text-align: center">
          {{ number_format($nik->promotional) }} đ
        </span>
        <del style="text-align: center;color: red">{{ number_format($nik->price) }} đ</del>
      @else
        <span class="item_price" style="text-align: center">
          {{ number_format($nik->price) }} đ
        </span>
      @endif
      </div>
        <p style="text-align:center "><a href="{{$nik->slug}}.html" class="btn btn-primary" role="button">Chi tiết</a> 
        <a href="{{route('addCart',['id'=>$nik->id]) }}" class="btn btn-success" role="button">Thêm giỏ hàng</a>
      </div>
    </div>
  </div>

  @endforeach

</div >
<div class="row fl" >
  <div class="col-md-12 col-sm-12"> {{ $nike->links() }}</div>
</div>

<!-- sanpham2 -->

 <div class="nameproduct font-italic" style="background-color: rgb(44, 89, 137);">
    <!-- <h2 style="text-align: center;color: white" >@if(isset($nike)) {{ $nike[0]->categories->name }} @endif</h2> -->
        <h3 style="text-align: center;color: white;margin: auto;" >TẤT CẢ SẢN PHẨM</h3>
 </div>
<!--  <h2 class="heading-tittle text-center font-italic nameproduct">@if(isset($nike)) {{ $nike[0]->categories->name }} @endif</h2> -->

  <div class="row border">
    @foreach($allproduct as $all)
  <div class="col-sm-6 col-md-4 ">
    <div class="thumbnail">
      <img src="img/upload/product/{{ $all ->image }}"  class="border1" width="99%">
      <div class="caption ">
        <h6 style="text-align: center">{{$all ->name }}</h6>
        <div style=" text-align: center;" with='100%'>
         @if($all->promotional>0)
        <span class="item_price" style="text-align: center">
          {{ number_format($all->promotional) }} đ
        </span>
        <del style="text-align: center;color: red">{{ number_format($all->price) }} đ</del>
      @else
        <span class="item_price" style="text-align: center">
          {{ number_format($all->price) }} đ
        </span>
      @endif
      </div>
        <p style="text-align:center "><a href="{{$all->slug}}.html" class="btn btn-primary" role="button">Chi tiết</a>
        <a href="{{route('addCart',['id'=>$all->id]) }}" class="btn btn-success" role="button">Thêm giỏ hàng</a>
       </p>
      </div>
    </div>
  </div>

  @endforeach

</div >
<div class="row fl" >
  <div class="col-md-12 col-sm-12"> {{ $nike->links() }}</div>
</div>

<!-- sanpham2 -->
<br>
 

@endsection