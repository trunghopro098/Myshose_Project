@extends('client.layouts.master')
@section('title')
	category
@endsection

@section('slide')
	@include('client.layouts.slide')
@endsection
@section('content')
<br>
<div class="nameproduct font-italic" style="background-color:#FB0309">
    <!-- <h2 style="text-align: center;color: white" >@if(isset($nike)) {{ $nike[0]->categories->name }} @endif</h2> -->
  @foreach($ca as $tyy)
        <h3 style="text-align: center;color: white; margin: auto;" > Sản phẩm {{$tyy->name}}</h3>
        @endforeach
 </div>
<!--  <h2 class="heading-tittle text-center font-italic nameproduct">@if(isset($nike)) {{ $nike[0]->categories->name }} @endif</h2> -->

  <div class="row border">
    @foreach($cate as $ty)
  <div class="col-sm-6 col-md-4 ">
    <div class="thumbnail">
      <img src="img/upload/product/{{ $ty ->image }}"  class="border1" width="99%">
      <div class="caption ">
        <h6 style="text-align: center">{{$ty ->name }}</h6>
        <div style=" text-align: center;" with='100%'>
         @if($ty->promotional>0)
        <span class="item_price" style="text-align: center">
          {{ number_format($ty->promotional) }} đ
        </span>
        <del style="text-align: center;color: red">{{ number_format($ty->price) }} đ</del>
      @else
        <span class="item_price" style="text-align: center">
          {{ number_format($ty->price) }} đ
        </span>
      @endif
      </div>
        <p style="text-align:center "><a href="{{$ty->slug}}.html" class="btn btn-primary" role="button">Chi tiết</a> 
         <a href="{{route('addCart',['id'=>$ty->id]) }}" class="btn btn-success" role="button">Thêm giỏ hàng</a></p>
      </div>
    </div>
  </div>

  @endforeach

</div >
@endsection