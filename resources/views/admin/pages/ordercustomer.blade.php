@extends('admin.layout.master')

@section('title')
    Danh sách loại sản phẩm
@endsection
@section('css')
table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;

}

td, th {
  border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;
}

tr:nth-child(even) {
  background-color: #dddddd;
}


@endsection
@section('content')
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Danh Sách Đơn Hàng </h6>
        </div>
                <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0" style="font-size: 13px;color: black;">
                    <thead>
                        <tr></tr>
                            <th>STT</th>
                            <th>Code_Order</th>
                            <th>Tên </th>
                            <th>Địa Chỉ</th>
                            <th>SĐT</th>
                            <th>Tổng Tiền</th>
                             <th>Tin Nhắn</th>
                            <th>Trạng Thái</th>
                            <th>Chi Tiết</th>
                       <!--      <th>Chỉnh Sửa</th> -->
                            
                        </tr>
                    </thead>
<!--                     <tfoot>
                        <tr>
                            <th>STT</th>
                            <th>Mã Đặt Hàng</th>
                            <th>Tên Khách Hàng</th>
                            <th>Địa Chỉ</th>
                            <th>Số Điện Thoại</th>
                            <th>Tổng Tiền</th>
                            <th>Tin Nhắn</th>
                            <th>Trạng Thái</th>
                            <th>Chỉnh Sửa</th>
                            <th>Chi Tiết Đơn Hàng</th>
                        </tr>
                    </tfoot> -->
                    <tbody>
<?php $i = 1 ?>
 @foreach($order1 as $or)
 <tr>
     <td>
         {{$i}}
     </td>
     <td>
         {{$or->code_order}}
     </td>
     <td>
         {{$or->name}}
     </td>
    <td>
         {{$or->address}}
     </td>
    <td>
         {{$or->phone}}
     </td>
     <td>
        {{number_format( $or->monney)}} VNĐ
     </td>
    <td >
         {{$or->message}}
     </td>
    <td>
<select id="{{$or->id}}" onchange="updateStatus(this)">

  <option  @if($or->status === 0) selected="true" @endif value="0"><p style="background-color: cyan;">Chờ xử lí</p></option>  
  <option  @if($or->status === 1) selected="true" @endif value="1"><p style="background-color: gold;">Đã xử lí</p></option>
  <option  @if($or->status === 2) selected="true" @endif value="2"><p style="background-color: crimson;">Đã nhận hàng</p></option>
</select>
<!--   @if( $or->status ==1)
        <a href="" class="btn btn-success">Đã xữ lý</a>
         @elseif($or->status ==2)
        <a href="" class="btn btn-primary">Đã nhận hàng</a>
        @else
         <a href="" class="btn btn-danger">Chờ xữ lý</a>
        @endif -->
     </td>
       <td>
        <a href="admin/vieworder/{{$or->id}}" class=" fas fa-eye" title="Chi tiết đơn hàng" style="margin-left: 9px; margin-top: 14px"></a>
     </td>
<!--         <td>
         <button class="btn btn-danger deleteOder" title="Xóa đơn hàng của {{ $or->name }}"><i class="fas fa-trash-alt"data-toggle="modal" data-target="#delete" type="button" data-id="{{ $or->id }}" > </i></button>
     </td> -->

 </tr>
<?php $i++; ?>
@endforeach
 </tbody>
 </table>
<div class="pull-right">{{ $order1->links() }}</div>
         </div>
     </div>
 </div>
 <!-- modal -->
     <div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Bạn có muốn xóa ?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body" style="margin-left: 183px;">
                    <button type="button" class="btn btn-success del">Có</button>
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Không</button>
                <div>
            </div>
        </div>
    </div>
 <script type="text/javascript">
     function updateStatus(select){
        $.ajax({
            header : {
                "X-CSRF-TOKEN" : "@csrf_token()"
            },
            method: "POST",
            url: "updateoder",
            data: {
                id: select.id,  
                status: select.value
            },
            success: (data) => console.log(data)
        })
     };
         $('.deleteOder').click(function(){
        let id = $(this).data('id');
        $('.del').click(function(){
            $.ajax({
            header : {
                "X-CSRF-TOKEN" : "@csrf_token()"
            },                
                url: "admin/xoa" + id,
                dataType: "json",
                type: "delete",
                success: function($result) {
                    toastr.success($result.success, 'Thông báo', { timeOut: 5000 });
                    location.reload();
                }
            });
        });

    });
 </script>

@endsection
