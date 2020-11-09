<!-- <div class="row">
<div class="col-md-1"></div>
	<div class=" col-sm-2 col-md-3">
		<img src="assets/client/hinhanh/logogiay.PNG" width="100%" height="130px">
	</div>
	 <div class="col-md-1"></div>
	<div class=" col-sm-9 col-md-7 d-none d-md-block">
		<div class="sliderbar">
	    <img src="assets/client/hinhanh/banner0.jpg" class="mySlides" style="width:100%;height: 130px">
	    <img src="assets/client/hinhanh/banner4.jpg" class="mySlides" style="width:100%;height: 130px">
	    <img src="assets/client/hinhanh/bannergiay2.jpg" class="mySlides" style="width:100%;height: 130px">
	   </div>
	</div>
</div>
 -->
 <div class="row">
 	<div class="col-md-3">
 		<img src="assets/client/hinhanh/logogiay.PNG" width="100%" height="130px">
 	</div>
 	<div class="col-sm-9">
 		<div class="row d-none d-md-block">
 			<div class="col-md-12" style="width: 100%;background-color: #DED6D6 color: black;margin:auto; font-family:  sans-serif;">
  				<div class="row">
						<div class="col-md border-right">  opening hours : 9:00am - 10:00pm </div>
						<div class="col-md border-right">  email :trungho098@gmail.com </div>
						<div class="col-md border-right">  hotline : 0332755831 </div>
  				 </div>
        
 			</div>
 				
 		</div>
 		<br>
 		<div class="row ">
 			<div class="col-md-1"></div>
 			<div class="col-md-9 col-sm-8 col-xs-8"style="width: 100%;height: 100%;">   
 			 <form class="form-inline my-2 my-lg-0" method="get" action="{{asset('search')}}">
      <input class="form-control " type="search" name="key" placeholder="Tìm kiếm sản phẩm" style="width: 70%; border:1.5px   solid #FF0303;" >
         <button type="submit" class="btn btn-primary" style="border:3px   solid ; border-radius: 5px; margin-left: 5px;margin-right:5px; width: auto;"> Tìm kiếm</button>
   			 </form>
            </div>
        <div class="col-md-2 col-sm-4 col-xs-4">
        <div class="row">

	<a @if(Auth::check()) href=" {{ route('cart.index') }} " @else data-toggle="modal" data-target="#login" href="#" @endif title="Giỏ hàng bạn có {{ Cart::count() }} mặt hàng" class="btn w3view-cart">
		<i class="fas fa-cart-plus cartz"></i>
	</a>
        	
        </div>
                <div class="row stfont">
        
        </div>
        </div>

 		</div>
 	</div>
 		
 </div>
 	
 