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
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <base href="{{ asset('') }}">
	<link rel="stylesheet" type="text/css" href="{{asset('assets')}}/client/bootstrap/css/bootstrap.css">
  <link rel="stylesheet" type="text/css" href="{{asset('assets')}}/client/CSS/main.css">
  <link rel="stylesheet" type="text/css" href="{{asset('assets')}}/admin/css/toastr.css">
  <link rel="stylesheet" type="text/css" href="">
  <!--  -->

  <!-- Bootstrap css -->
  <link href="{{asset('assets')}}/client1/css/style1.css" rel="stylesheet" type="text/css" media="all" />
  <!-- Main css -->
  <link href="{{asset('assets')}}/client1/css/popuo-box.css" rel="stylesheet" type="text/css" media="all" />
  <!-- pop-up-box -->
  <link href="{{asset('assets')}}/client1/css/menu.css" rel="stylesheet" type="text/css" media="all" />
  <!-- menu style -->
  <!-- //Custom-Files -->

  <!-- web fonts -->
  <link href="{{asset('assets')}}/client1/css/lato.css" rel="stylesheet">
  <link href="{{asset('assets')}}/client1/css/opensan.css" rel="stylesheet">
  <!-- //web fonts -->
  <link rel="stylesheet" type="text/css" href="{{asset('assets')}}/client1/css/easy-responsive-tabs.css">

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

</body>
</html>