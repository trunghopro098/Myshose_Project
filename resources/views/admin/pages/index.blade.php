@extends('admin.layout.master')
@section('title')
Trang Chủ
@endsection
@section('content')



          <!-- Content Row -->
          <div class="row">

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div style="color: #0054FF;font-family: initial;font-size: 13px;">SỐ LƯỢNG KHÁCH HÀNG</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">{{$user_count}}</div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-calendar fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div style="color: red;font-family: initial;font-size: 13px;">TỔNG THU NHẬP</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">{{ number_format($money) }} VNĐ</div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div style="color: blue;font-family: initial;font-size: 13px;">TỔNG SỐ ĐƠN HÀNG</div>
                      <div class="row no-gutters align-items-center">
                        <div class="col-auto">
                          <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">{{$order_count}} Đơn Hàng</div>
                        </div>
                        <div class="col">
                          <div class="progress progress-sm mr-2">
                            <div class="progress-bar bg-info" role="progressbar" style="width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Pending Requests Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div style="color: green;font-family: initial;font-size: 13px;">ĐƠN HÀNG CHƯA XỬ LÍ</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">{{$or}}</div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-comments fa-2x fa-eye fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <hr>
          <br>
           <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">ĐƠN HÀNG MỚI</h6>
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
                                                  <th>Tên </th>
                                                  <th>Địa Chỉ</th>
                                                  <th>SĐT</th>
                                                  <th>Tổng Tiền</th>
                                                  <th>Ngày Đặt</th>
                                                  <th>Chi Tiết</th>

                                                  
                                              </tr>
                                          </thead>

                                          <tbody>
                                                    <?php $i = 1 ?>
                                                     @foreach($ordercus as $orr)
                                                     <tr>
                                                         <td>
                                                             {{$i}}
                                                         </td>
                                                         <td>
                                                             {{$orr->code_order}}
                                                         </td>
                                                         <td>
                                                             {{$orr->name}}
                                                         </td>
                                                        <td>
                                                             {{$orr->address}}
                                                         </td>
                                                        <td>
                                                             {{$orr->phone}}
                                                         </td>
                                                         <td>
                                                            {{number_format( $orr->monney)}} VNĐ
                                                         </td>
                                                         <td>
                                                            {{$orr->created_at}}
                                                         </td>
                                                           <td>
                                                            <a href="admin/vieworder/{{$orr->id}}" class=" fas fa-eye" title="Chi tiết đơn hàng" style="margin-left: 9px; margin-top: 14px"></a>
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

@endsection