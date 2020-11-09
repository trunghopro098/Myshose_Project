<!DOCTYPE html>
<html>
<head>
	<title>@yield('title')</title>
	<meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no ">
	<script type="text/javascript" src="{{asset('assets')}}/client/bootstrap/jquery.min.js" ></script>
	<script type="text/javascript" src="{{asset('assets')}}/client/bootstrap/popper.min.js"></script>
	<script type="text/javascript" src="{{asset('assets')}}/client/bootstrap/js/bootstrap.js"></script>
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
  <base href="{{ asset('') }}">
	<link rel="stylesheet" type="text/css" href="{{asset('assets')}}/client/bootstrap/css/bootstrap.css">
  <link rel="stylesheet" type="text/css" href="{{asset('assets')}}/client/CSS/main.css">
  <link rel="stylesheet" type="text/css" href="{{asset('assets')}}/admin/css/toastr.css">
  <link rel="stylesheet" type="text/css" href="">
  <style> @yield('css')</style>
  <!--  -->
<body>
	<div class="container-fluid">
<!-- header -->
@include('client.layouts.header')
<!-- end header -->
<!-- menu -->
@include('client.layouts.menu')
<!-- end menu -->
<div class="container">
@yield('slide')

	@yield('content')

<br>
</div>	

    <!-- footer -->
    
    @include('client.layouts.footer')
    <!-- endfooter -->
</div>

<script>
      function load() {
      $.get("sim.html", function (data) {
        $('.them').append(data);
      });
      
    }

    function myFunction() {
  if (window.pageYOffset >= sticky) {
    navbar.classList.add("sticky")
  } else {
    navbar.classList.remove("sticky");
  }
}
var slideIndex = 0;
showSlides();
function showSlides() {
  var i;
  var slides = document.getElementsByClassName("mySlides");
  var dots = document.getElementsByClassName("dot");
  for (i = 0; i < slides.length; i++) {
    slides[i].style.display = "none";  
  }
  slideIndex++;
  if (slideIndex > slides.length) {slideIndex = 1}    
  for (i = 0; i < dots.length; i++) {
    dots[i].className = dots[i].className.replace(" active", "");
  }
  slides[slideIndex-1].style.display = "block";  
  setTimeout(showSlides, 3000);
}
</script>
</body>
</html>