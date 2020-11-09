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
          <li>Lịch Sử Mua Hàng</li>

        </ul>
      </div>
    </div>
  </div>
<br>

           <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">BẠN ĐÃ MUA {{count($bought)}} ĐƠN HÀNG TỪ MYSHOES.VN</h6>
                </div>
                <div class="card-body">
                  <div class="chart-area">
                  <!--  gggggggggggggggggggggggg -->
                        <div class="card shadow mb-4">
                                 <div class="card-body">
                                  <div class="table-responsive">
                                      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0" style="font-size: 13px;color: black;">
                                          <thead>
                                              <tr>
                                                  <th>STT</th>
                                                  <th>Code_Order</th>
                                                  <th>Ngày Đặt Hàng</th>
                                                  <th>Tổng Tiền</th>
                                                  <th>Chi Tiết Đơn Hàng</th>

                                                  
                                              </tr>
                                          </thead>

                                          <tbody>
                                                      <?php $i = 1 ?>
                                                     @foreach($bought as $orr)
                                                     <tr>
                                                         <td>
                                                             {{$i}}
                                                         </td>
                                                         <td>
                                                             {{$orr->code_order}}
                                                         </td>
                                                         <td>
                                                            {{$orr->created_at}}
                                                         </td>
                                                         <td>
                                                            {{number_format( $orr->monney)}} VNĐ
                                                         </td>                                                      

                                                           <td>
                                                            <a href="VieworderDetail/{{$orr->id}}"  class="btn btn-primary" title="Chi tiết đơn hàng" style="margin-left: 9px; margin-top: 14px"> Xem Chi tiết đơn hàng</a>
                                                         </td>

                                                     </tr>
                                                    <?php $i++; ?>
                                                    @endforeach


                                           </tbody>
                                           </table>

                               </div>
                           </div>
                  <!--  -->
                  </div>
                  <hr>
                </div>
              </div>
            </div>
<!-- modal -->
              
@endsection