@extends('layout.layouts.index')

@section('title')
<title>Trang chủ</title>
@stop

@section('content')
<!-- Slider -->
@include('layout.layouts.slider')
<!-- Banner -->

<section class="bg0 p-t-23 p-b-140">
	<div class="container">
		<div class="p-b-10 ">
				<h1 class=" ">
					<b>Sản phẩm giảm giá nhiều nhất</b>
				</h1>
			</div>
			<div class="row isotope-grid">
				@foreach($productsale as $pr)
				<div class="col-sm-6 col-md-4 col-lg-3 p-b-35 isotope-item {{$pr->cat_id}}">
					<!-- Block2 -->
					<div class="block2">
						<div class="block2-pic hov-img0">
							<img src="{{url('/')}}/uploads/{{$pr->image}}" alt="IMG-PRODUCT" height="200px">
							<a href="" class="block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04 js-show-modal1 btn-show" data-url="{{route('prinfo',$pr->id)}}" >
								Quick View
							</a>
						</div>

						<div class="block2-txt flex-w flex-t p-t-14">
							<div class="block2-txt-child1 flex-col-l ">
								<a href="{{route('product_detail',[$pr->id])}}" class="cl5 ">
									<h5>{{$pr->name}}</h5>
								</a>

								@if($pr->sale_price > 0)
							<span class="cl5">
								<strike>{{number_format($pr->price)}}</strike> VND
							</span>
							<span class=" cl5">
								{{number_format($pr->price-(($pr->price*$pr->sale_price)/100))}} VND
							</span>
							<span class=" c15" style="color: red">
								<span class="fa fa-arrow-down"></span><b>{{number_format(( $pr->price * $pr->sale_price)/100)}} VND</b>
							</span>
							@else
							<span class="cl5">
								{{number_format($pr->price)}} VND
							</span>
							@endif
								<a href="{{route('add',['id'=>$pr->id])}}" id="addtoCart" class=" flex-c-m stext-101 cl0 size-101 bg1 bor1 hov-btn1 p-lr-15 trans-04 js-addcart-detail">
									Thêm vào giỏ hàng
								</a>
							</div>

							<div class="block2-txt-child2 flex-r p-t-3">

							</div>
						</div>
					</div>
				</div>
				@endforeach
			</div>
		<div class="p-b-10">
			<h1 class="c15 ">
				<b>Sản phẩm bán chạy nhất</b>
			</h1>
		</div><div class="row isotope-grid">
			@foreach($pro as $prod)
			@foreach($test as $value)
			@if($prod->id == $value->id_product)
			
			<div class="col-sm-6 col-md-4 col-lg-3 p-b-35 isotope-item {{$prod->cat_id}}">
				<!-- Block2 -->
				<div class="block2">
					<div class="block2-pic hov-img0">
						<img src="{{url('/')}}/uploads/{{$prod->image}}" alt="IMG-PRODUCT" height="200px">
						<a href="" class="block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04 js-show-modal1 btn-show" data-url="{{route('prinfo',$prod->id)}}">
							Quick View
						</a>
					</div>

					<div class="block2-txt flex-w flex-t p-t-14">
						<div class="block2-txt-child1 flex-col-l ">
							<a href="{{route('product_detail',[$prod->id])}}" class=" cl5 ">
								<h5>{{$prod->name}}</h5>
							</a>
							@if($prod->sale_price > 0)
							<span class=" cl5">
								<strike>{{number_format($prod->price)}}</strike> VND
							</span>
							<span class=" cl5" style="text-align: right">
								{{number_format($prod->price-(($prod->price*$prod->sale_price)/100))}} VND
							</span>
							<span class="cl5" style="color: red">
								<span class="fa fa-arrow-down"></span> <b>{{number_format(($prod->price*$prod->sale_price)/100)}} VND</b>
							</span>
							@else
							<span class=" cl5">
								{{number_format($prod->price)}} VND
							</span>
							@endif
							<a href="{{route('add',['id'=>$prod->id])}}" id="addtoCart" class=" flex-c-m stext-101 cl0 size-101 bg1 bor1 hov-btn1 p-lr-15 trans-04 js-addcart-detail">
								Thêm vào giỏ hàng
							</a>
						</div>

						<div class="block2-txt-child2 flex-r p-t-3">
							<a href="#" class="btn-addwish-b2 dis-block pos-relative js-addwish-b2">
								
							</a>
						</div>
					</div>
				</div>
			</div>
			
			@endif
			@endforeach
		@endforeach</div>
		<div class="p-b-10">
			<h1 class="">
				<b>Sản phẩm mới nhất của cửa hàng</b>
			</h1>
		</div>
		
		<div class="row isotope-grid">
			@foreach($productnew as $pr)
			<div class="col-sm-6 col-md-4 col-lg-3 p-b-35 isotope-item {{$pr->cat_id}}">
				<!-- Block2 -->
				<div class="block2">
					<div class="block2-pic hov-img0">
						<img src="{{url('/')}}/uploads/{{$pr->image}}" alt="IMG-PRODUCT" height="200px">
						<a href="" class="block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04 js-show-modal1 btn-show" data-url="{{route('prinfo',$pr->id)}}">
							Quick View
						</a>
					</div>

					<div class="block2-txt flex-w flex-t p-t-14">
						<div class="block2-txt-child1 flex-col-l ">
							<a href="{{route('product_detail',[$pr->id])}}" class="cl5">
								<h5>{{$pr->name}}</h5>
							</a>
							@if($pr->sale_price > 0)
							<span class="cl5">
								<strike>{{number_format($pr->price)}}</strike> VND
							</span>
							<span class=" cl5">
								{{number_format($pr->price-(($pr->price*$pr->sale_price)/100))}} VND
							</span>
							<span class=" c15" style="color: red">
								<span class="fa fa-arrow-down"></span><b>{{number_format(( $pr->price * $pr->sale_price)/100)}} VND</b>
							</span>
							@else
							<span class="cl5">
								{{number_format($pr->price)}} VND
							</span>
							@endif
							<a href="{{route('add',['id'=>$pr->id])}}" id="addtoCart" class=" flex-c-m stext-101 cl0 size-101 bg1 bor1 hov-btn1 p-lr-15 trans-04 js-addcart-detail">
								Thêm vào giỏ hàng
							</a>
						</div>

						<div class="block2-txt-child2 flex-r p-t-3">
							<a href="#" class="btn-addwish-b2 dis-block pos-relative js-addwish-b2">
								
							</a>
						</div>
					</div>
				</div>
			</div>
			@endforeach
		</div>

		
			

			<!-- Load more -->
			{{-- <div class="flex-c-m flex-w w-full p-t-45">
				<a href="#" class="flex-c-m stext-101 cl5 size-103 bg2 bor1 hov-btn1 p-lr-15 trans-04">
					Load More
				</a>
			</div> --}}


		@include('layout.layouts.modal')
	</section>
	@stop
	@section('script')
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script type="text/javascript">
		$(document).ready(function () {
			$(".btn-show").click(function(){
			// var id = $(this).attr("data-id");
			var url1 = $(this).attr("data-url");
			$.ajax({
				// url: "http://localhost/NQL/BayaShop/getinfor&"+id,
				url: url1,
				type: 'GET',
				dataType: 'json',
				success: function(response) {
					// console.log(response);
					// console.log(response.image);
					$("#name-pr").text(response.name);
					$("#img-pr1").attr("data-thumb","{{url('./')}}/uploads/"+response.image);
					$("#img-pr2").attr("src","{{url('./')}}/uploads/"+response.image);
					$("#img-pr3").attr("href","{{url('./')}}/uploads/"+response.image);
					$("#price-pr").text(response.price+" VND");
					var sale_price= response.price-(response.sale_price*response.price/100);
					$("#price-pr-sale").text(sale_price+" VND");
					$("#des-pr").text(response.description);
					

				},
				error: function () {
				}
			})
			
		})
		})
	</script>
	@stop