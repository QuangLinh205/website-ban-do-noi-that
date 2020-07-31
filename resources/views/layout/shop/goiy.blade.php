@extends('layout.layouts.index')

@section('title')
<title>Home</title>
@stop

@section('content')
<!-- Slider -->

<!-- Banner -->

<section class="bg0 p-t-23 p-b-140">
	<div class="container">
		<h2>Bạn đã đặt hàng thành công </h2>
		<p>Vui lòng kiểm tra và xác nhận thông tin đơn hàng tại địa chỉ mail <b>{{$linh}}</b></p>
		<a href="{{route('home')}}" class="fa fa-long-arrow-left">quay lại trang chủ</a>
		
		

		
	
		</div>

		
	</section>
	@stop