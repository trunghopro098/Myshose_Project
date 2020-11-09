
<div class=" row5">
<!-- 	<div class="container"> -->
	<div class="row ">
		<div class="col-md row6">
			<b>LIÊN HỆ</b>
			<hr>
          <a href="#" style=" text-align:left; color: #000002"> Địa chỉ:Nam Kỳ Khởi Nghĩa-Ngủ Hành Sơn-TP Đà Nẵng</a><br>
		  <a href="#" style=" text-align:left; color: #000002"> SĐT:0332755831</a><br>
		   <a href="#" style=" text-align:left;  color: #000002">Email: trungho098@gmail.com</a><br>



		</div>
		<div class="col-md row6">
			<b>THÔNG TIN MYSHOES.VN</b>
			<hr>
		   <a href="#" style=" text-align:left;  color: #000002"> Giới Thiệu Myshoes.vn</a><br>
		    <a href="#" style=" text-align:left; color: #000002"> Chính Sách Giao Hàng Và Thanh Toán</a><br>
		    <a href="#" style=" text-align:left; color: #000002"> Chính Sách Bảo Mật</a><br>
          <a href="#" style=" text-align:left; color: #000002"> Điều Khoản Sử Dụng</a><br>
		</div>
		<div class="col-md row6">
			<b>TÀI KHOẢN</b>
			<hr>
		   <a href="#">
		<!--    	<img src="assets/client/hinhanh/dtlogo.PNG" width="80%" height="60%"> -->
          <a href="#" style=" text-align:left; color: #000002"> Tài Khoản </a><br>
		  <a href="#" style=" text-align:left; color: #000002"> Lịch Sử Mua Hàng</a><br>
		  		  <a href="#" style=" text-align:left; color: #000002"> Chính Sách Trả Hàng</a><br>
		   </a>
		</div>
	
		<div class="col-md row6">
			<b>BẢN QUYÊN NỘI DUNG</b>
			<hr>
			<h6 style=" text-align:left;  color: #000002">Chăm sóc khách hàng(24/7)</h6>
			<a href="#" style=" text-align:left;  color: #F90F20"><b>03 322 755 831</b></a>
			<h6 style=" text-align:left;  color: #000002">Khiếu nại hoặc bảo hành(24/7)</h6>
			<a href="#" style=" text-align:left;  color: #F90F20"><b>1800 1508</b></a>
		</div>

</div>
	<hr>
	<div class="row">
		<div class="col-md-6">
			<b>CÔNG TY CỔ PHẦN ĐẦU TƯ THỜI TRANG VÀ CÔNG NGHỆ<br>
			Địa Chỉ : Đường Nam Kỳ Khởi Nghĩa - Quận Ngũ Hành Sơn-TP Đà Nẵng<br>
			Thành Lập : Ngày 02/09/2017
			<br>
</b>


		</div>
		<div class="col-md-6">
			
		</div>
	</div>

</div>	
<script type="text/javascript" src="assets/client/JS/custom.js"></script>
<script type="text/javascript" src="assets/admin/js/toastr.min.js"></script>
<script type="text/javascript" src="assets/client/JS/ajax.js"></script>
<script type="text/javascript" src="assets/client/JS/tab.js"></script>
@if(session('thongbao'))
	<script type="text/javascript">
		messageSuccess('{{ session('thongbao') }}');
	</script>
@endif

@if(session('error'))
	<script type="text/javascript">
		messageError('{{ session('error') }}');
	</script>
@endif