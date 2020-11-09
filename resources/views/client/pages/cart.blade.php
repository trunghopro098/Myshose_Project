@extends('client.layouts.master1')

@section('title')
	Giỏ hàng
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
					<li>Giỏ hàng</li>
				</ul>
			</div>
		</div>
	</div>
	<div class="privacy py-sm-5 py-4">
		<div class="container py-xl-4 py-lg-2">
			<!-- tittle heading -->
			<h3 class="tittle-w3l text-center mb-lg-5 mb-sm-4 mb-3">
				<span>G</span>iỏ hàng của {{ Auth::user()->name ?? ' ' }}
			</h3>
			<!-- //tittle heading -->
			<div class="checkout-right">
				<h4 class="mb-sm-4 mb-3">Bạn có tổng cộng:
					<span>{{ Cart::count() }} sản phẩm</span>
				</h4>
				<div class="table-responsive">
					<table class="timetable_sub">
						<thead>
							<tr>
								<th>STT</th>
								<th>Hình Ảnh</th>
								<th>Số lượng</th>
								<th>Tên sản phẩm</th>
								<th>Size</th>
								<th>Đơn giá</th>
								<th>Chỉnh sửa</th>
							</tr>
						</thead>
						<tbody>
							<?php $i = 1;?>
							@foreach($cart as $value)
								<tr class="rem1">
									<td class="invert">{{ $i }}</td>
									<td class="invert-image">
										<a href="#">
											<img src="img/upload/product/{{ $value->options->img }}" height="100" alt="{{ $value->name }}" class="img-responsive">
										</a>
									</td>
									<td class="invert">
										<div class="quantity">
											<div class="form-group">
												<input type="number" name="qty" class="form-control qty" value="{{ $value->qty }}" min='1' data-id="{{ $value->rowId }}">
											</div>
										</div>
									</td>
									<td class="invert">{{ $value->name }}</td>
									<td class="invert">
										<input type="number" name="size" class="form-control" value="22" min='22' max="43" data-id="{{ $value->size }}">
									</td>				

									<td class="invert">{{ number_format($value->price) }} VNĐ</td>
									<td class="invert">
										<div class="rem">
											<div class="close1" data-id="{{ $value->rowId }}" title="xóa sản phẩm"></div>
										</div>
									</td>
								</tr>
								<?php $i++; ?>
							@endforeach	
						</tbody>
					</table>
					<h4 class="mb-sm-4 mb-3" style="margin-top: 10px" align="right">Bạn cần thanh toán tổng cộng:
						<span>{{ Cart::total() }} VND</span>
					</h4>
				</div>
			</div>
			<br>
			<div class="row">
				<div class="col-md-4">
	
				</div>
				<div class="col-md-4">
				 <a href="checkout"><button type="button" class="btn  btn-outline-primary btn-sm btn-block">Tiến hành đặt hàng</button></a>

				</div>
				<div class="col-md-4">

				</div>
			</div>

		</div>
	</div>
	{{-- Delete --}}
	<div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Bạn có muốn xóa sản phẩm này khỏi giỏ hàng không ?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body" style="margin-left: 183px;">
                    <button type="button" class="btn btn-success delProduct">Có</button>
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Không</button>
                </div>
            </div>
        </div>
    </div>
@endsection