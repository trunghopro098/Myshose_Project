@extends('client.layouts.master1')
@section('title')
	Lịch sử mua hàng
@endsection

@section('content')
  <div class="services-breadcrumb">
    <div class="agile_inner_breadcrumb">
      <div class="container">
        <ul class="w3_short">
          <li>
            <a href="{{asset('home')}}">Trang Chủ</a>
            <i>|</i>

          </li>
          <li>Chi Tiết Đơn Hàng</li>
        </ul>
      </div>
    </div>
  </div>
<br>

        <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Chi Tiết Đơn Hàng </h6>
        </div>
                <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0" style="font-size: 13px;color: black;">
                    <thead>
                        <tr>
                            <th>STT</th>
                            <th>Hình ảnh </th>
                            <th>Tên sản phẩm </th>
                            <th>Số lượng</th>
                            <th>Đơn giá</th>
                            <th>Tổng Tiền</th>

                            
                        </tr>
                    </thead>
                    <tbody>
<?php $i = 1 ?>
 @foreach($order as $value)
 <tr>
     <td>
         {{$i}}
     </td>
     <td>
         <img src="img/upload/product/{{ $value->Product->image }}" height="150" alt="{{ $value->name }}">
     </td>
     <td>
         {{ $value->Product->name }}
     </td>
    <td>
      {{ $value->quantity }}
     </td>
    <td>
         {{ number_format($value->price) }} VNĐ
     </td>
        <td>
         {{ number_format($value->price * $value->quantity) }} VNĐ
     </td>
 </tr>
<?php $i++; ?>
@endforeach
 </tbody>
 </table>

         </div>
     </div>
 </div>
              
@endsection