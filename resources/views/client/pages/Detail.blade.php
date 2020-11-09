@extends('client.layouts.master1')

@section('title')
    Chi tiết sản phẩm - {{ $product->name }}
@endsection
@section('css')

.tablink {
  background-color: #555;
  color: white;
  float: left;
  border: none;
  outline: none;
  cursor: pointer;
  padding: 14px 16px;
  font-size: 17px;
  width: 25%;
}

.tablink:hover {
  background-color: #777;
}

/* Style the tab content (and add height:100% for full page content) */
.tabcontent {
  color: white;
  display: none;
  padding: 100px 20px;
  height: 100%;

}



@endsection

@section('content')

    <!-- banner-2 -->
    <div class="page-head_agile_info_w3l"></div>
    <!-- //banner-2 -->
    <!-- page -->
    <div class="services-breadcrumb">
        <div class="agile_inner_breadcrumb">
            <div class="container">
                <ul class="w3_short">
                    <li>
                        <a href="home" >Trang Chủ</a>
                        <i>|</i>
                    </li>
                    <li>{{ $product->name }}</li>
                </ul>
            </div>
        </div>
    </div>
    <!-- //page -->

    <!-- Single Page -->
    <div class="banner-bootom-w3-agileits py-5">
        <div class="container py-xl-4 py-lg-2">
            <!-- tittle heading -->
            <h3 class="tittle-w3l text-center mb-lg-5 mb-sm-4 mb-3">
                <span>S</span>ản
                <span>P</span>hẩm {{ $product->name }}</h3>
    
            <!-- //tittle heading -->
            <div class="row">
                <div class="col-lg-5 col-md-8 single-right-left ">
                    <div class="grid images_3_of_2">
                        <div class="flexslider">


                                    <div class="thumb-image khoi">
                                        <img src="img/upload/product/{{ $product->image }}" style="width: 80%;height: 80%" data-imagezoom="true" class="img-fluid " alt="">
                                    </div>
                               
<!--                                 <li data-thumb="img/upload/product/{{ $product->image }}">
                                    <div class="thumb-image">
                                        <img src="img/upload/product/{{ $product->image }}" data-imagezoom="true" class="img-fluid" alt="">
                                    </div>
                                </li>
                                <li data-thumb="img/upload/product/{{ $product->image }}">
                                    <div class="thumb-image">
                                        <img src="img/upload/product/{{ $product->image }}" data-imagezoom="true" class="img-fluid" alt="">
                                    </div>
                                </li> -->

                            <div class="clearfix"></div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-7 single-right-left simpleCart_shelfItem">
                    <h3 class="mb-3">{{ $product->name }}</h3>
                    <p class="mb-3">
                        @if($product->promotional > 0)
                            <span class="item_price">
                                {{ number_format($product->promotional) }} VNĐ
                            </span>
                            <del class="mx-2 font-weight-light">
                                {{ number_format($product->price) }} VNĐ
                            </del>
                        @else
                            <span class="item_price">
                                {{ number_format($product->price) }} VNĐ
                            </span>
                        @endif
                        <label>Giao hàng miễn phí</label>
                    </p>
                    <div class="single-infoagile">
                        <ul>
                            <li class="mb-3">
                                Thanh toán sau khi giao hàng
                            </li>
                            <li class="mb-3">
                                Giao hàng sớm nhất có thể
                            </li>
                            <li class="mb-3">
                                Khuyến mãi từ 500.000 VNĐ/tháng
                            </li>
                            <li class="mb-3">
                                Ưu đãi giảm 5% khi thanh toán bằng thẻ ngân hàng
                            </li>
                        </ul>
                    </div>
                    <div class="product-single-w3l">

                        <p class="my-sm-4 my-3">
                            <i class="fas fa-retweet mr-3"></i>Net banking & Credit/ Debit/ ATM card
                        </p>
                    </div>
                    <div class="row">
                        <div class="col-md-4 col-sm-12">   <a href="{{ route('addCart',['id' => $product->id]) }}" class="btn btn-info" role="button">Thêm vào giỏ hàng</a></div>
                        <div class="col-md-4 col-sm-12"> <button data-toggle="modal" data-target="#size" class="btn btn-danger" role="button">Hướng dẩn chọn size</button> 
                        <div class="col-md-4"></div>
                         

                    </div>
                        
                    </div>

                </div>
            </div>
        </div>
 
<div class="row container">
<button class="tablink" style="color:#000303" onclick="openPage('Home', this, '#C47DD6')" id="defaultOpen"><b>CHI TIẾT SẢN PHẨM</b></button>
<button class="tablink" style="color:#000303" onclick="openPage('News', this, '#C47DD6')" ><b>ĐÁNH GIÁ SẢN PHẨM(0)</b></button>
<button class="tablink" style="color:#000303" onclick="openPage('Contact', this, '#C47DD6')"><b>HƯỚNG DẪN MUA HÀNG</b></button>
<button class="tablink" style="color:#000303" onclick="openPage('About', this, '#C47DD6')"><b>GIỚI THIỆU MYSHOSE.VN</b></button>
</div>

<div id="Home" class="tabcontent">
  <h4> <br>CHI TIẾT {{$product->name}}</h4>
  <p class="hinhanh" style="color: black;">{!!$product->description!!}</p>
</div>

<div id="News" class="tabcontent">
    <br>
    <div class="row">
        <div class="col-md-12 col-sm-12" style="background-color:rgb(44, 89, 137);color: white">Viết đánh giá cho sản phẩm này</div>
      <b> Tên bạn:</b> 
        <input type="text" name="name" style="width: 100%">
        <b>Đánh giá của bạn:</b>
        <textarea name="text" cols="40" rows="8" style="width: 100%"></textarea> 
  </div> 
<div class="row">
            <br>
        <div class="col-md-4"></div>
        <div class="col-md-4"><button type="submit" name="review" class="btn btn-danger" style="width: 100%;margin-top: 10px"> <b>gủi</b></button></div>

        <div class="col-md-4"></div>
</div>
<!--     <div class="row" style="margin-top: 10px">
        <div class="col-md-12 col-sm-12" style="background-color:rgb(44, 89, 137);color: white">Sản Phẩm liên quan</div>
      <b> Tên bạn:</b> 
        <input type="text" name="name" style="width: 100%">
        <b>Đánh giá của bạn:</b>
        <textarea name="text" cols="40" rows="8" style="width: 100%"></textarea> 


  </div> --> 
</div>

<div id="Contact" class="tabcontent">
<br>
 <iframe width="786" height="442" src="https://www.youtube.com/embed/iqYEpsiYEYM" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
</div>

<div id="About" class="tabcontent">
    <br>
<img src="https://myshoes.vn/image/data/myshoes/gioi-thieu.jpg" style="width: 100%">
<h4 style="text-align: center;">Myshoes.vn - Sải bước đam mê!</h4>
<br>
<p>
Myshoes.vn ra đời với tất cả niềm đam mê thương mại điện tử và giày dép của những người sáng lập. Chúng tôi mong muốn mang đến cho khách hàng những đôi giày tốt nhất, giúp khách hàng luôn cảm thấy tự tin vững bước theo đuổi niềm đam mê của bản thân để thành công vượt trội.

Myshoes.vn là website bán giày chính hãng từ các thương hiệu hàng đầu thế giới như: Nike, adidas, Converse, New balance, Ascis,... Tất cả các sản phẩm đều có nguồn gốc xuất sứ rõ ràng chính hãng. Myshoes.vn nói không với hàng fake, hàng gia công chất lượng kém. Khi mua hàng tại Myshoes.vn khách hàng sẽ luôn có được sản phẩm tốt nhất với mức giá cực kỳ hấp dẫn mà khó có thể tìm được ở nơi khác. Ngoài ra, Myshoes.vn mong muốn mang đến cho khách hàng những trải nghiệm mua sắm tuyệt vời với sự tư vấn nhiệt tình và chân thành nhất từ đội ngũ bán hàng chuyên nghiệp, những phần quà bất ngờ và tình cảm sâu sắc của Myshoes.vn gửi gắm trên từng sản phẩm. Myshoes sẽ nỗ lực hết sức để mỗi sản phẩm đến tay khách hàng là mang đến một niềm vui thú vị.

Hiện tại, Myshoes.vn chủ yếu tập trung vào các sản phẩm giày thể thao và giày sneaker dành cho nam và nữ của các thương hiệu uy tín trên thế giới. Myshoes.vn luôn tâm niềm rằng chất lượng sản phẩm là yếu tố quan trọng nhất quyết định sự thành công của một thương hiệu và đó là giá trị cốt lõi mà Myshoes.vn sẽ mang tới cho khách hàng của mình.

Hãy cùng đồng hành với Myshoes.vn "Sải bước đam mê" nhé!

Trân trọng,

</p>
Myshoes.vn - Giày chính hãng

Showroom: TP ĐÀ NÃNG

Điện thoại: 0332755831

Email: trung ho098@gmail.com
</div>
<!--  -->
<!-- modal update pass -->
<div class="modal fade " id="size" tabindex="-1" role="dialog" aria-hidden="true"  >
        <div class="modal-dialog " role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-center">Hướng dẩn chọn size</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                <img src="assets/client/hinhanh/size.png" style="width: 100%">
                </div>
            </div>
        </div>
    </div>
</div>
<!--  -->
@endsection