@extends('layout.layouts.index')

@section('title')
<title>Shoping Cart</title>
@stop

@section('content')
<!-- breadcrumb -->
<!-- <div class="container">
	<div class="bread-crumb flex-w p-l-25 p-r-15 p-t-30 p-lr-0-lg">
		<a href="index.html" class="stext-109 cl8 hov-cl1 trans-04">
			Home
			<i class="fa fa-angle-right m-l-9 m-r-10" aria-hidden="true"></i>
		</a>

		<a href="product.html" class="stext-109 cl8 hov-cl1 trans-04">
			Shoping Cart
		</a>

	</div>
</div> -->

@if(session('thongbao'))
<div class="alert alert-success">
	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
	<strong>{{session('thongbao')}}</strong> 
</div>
@endif
@if(session('soluongbang0'))
<div class="alert alert-success">
	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
	<strong>{{session('soluongbang0')}}</strong> 
</div>
@endif
@if(session('quasoluong'))
<div class="alert alert-success">
	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
	<strong>{{session('quasoluong')}}</strong> 
</div>
@endif
<div class="bg0 p-t-75 p-b-85">
	<div class="container">
		<div class="row">
			<div class="col-lg-10 col-xl-7 m-lr-auto m-b-50">
				
				<div class="m-l-25 m-r--38 m-lr-0-xl">
					
					<!-- <form action="{{route('update')}}" method="POST"> -->
						<!-- @csrf -->
						<div class="wrap-table-shopping-cart">
							<table class="table-shopping-cart">
								<tr class="table_head">
									<th class="column-1 center">Ảnh</th>
									<th class="column-2 center">Tên sp</th>
									<th class="column-3 center">giá</th>
									<th class="column-4 center">số lượng</th>
									<th class="column-5 center">tổng tiền</th>
								</tr>
								
								@foreach($cart->items as $cc)
								
								<tr class="table_row">
									<form action="{{route('update')}}" method="post">
										<input type="hidden" id="num" name="num" value="{{$cc['num']}}">
										@csrf
										<td class="column-1">
											<a href="">
												<div class="how-itemcart1">
													<img src="{{url('')}}/uploads/{{$cc['image']}}" alt="IMG">
												</div>
											</a>
										</td>
										<td class="column-2">{{$cc['name']}}</td>
										<td class="column-3">{{number_format($cc['price'],0)}} VND</td>
										<td class="column-4">
											<div class="wrap-num-product flex-w m-l-auto m-r-0">
												
												<div class="btn-num-product-down cl8 hov-btn3 trans-04 flex-c-m">
													<i class="fs-16 zmdi zmdi-minus"></i>
												</div>

												<input class="mtext-104 cl3 txt-center num-product" type="number" name="quantity" value="{{$cc['quantity']}}">
												
												<div class="btn-num-product-up cl8 hov-btn3 trans-04 flex-c-m">
													<i class="fs-16 zmdi zmdi-plus"></i>
												</div>
												<input type="hidden" name="id" value="{{$cc['id']}}">
												
											</div>

										</td>
										<td class="column-5">{{number_format($cc['price'] * $cc['quantity'],0)}} VND</td>
										<td>
											<button type="submit" >
												<a href="" title="update" class=""><span>CẬP NHẬT</span></a>
											</button>
											
											<a href="{{route('delete',['id'=>$cc['id']])}}" title="delete" class="" onclick="return confirm('bạn có muốn xóa sản phẩm  {{$cc['name']}} khỏi giỏ hàng không?')"><span>XÓA</span></a>
										</td>
									</form>
								</tr>
								@endforeach
							</table>
						</div>
					<!-- </form> -->
					
					<div class="flex-w flex-sb-m bor15 p-t-18 p-b-15 p-lr-40 p-lr-15-sm">
						<div class="flex-w flex-m m-r-20 m-tb-5">
							

							<div class="flex-c-m stext-101 cl2 size-118 bg8 bor13 hov-btn3 p-lr-15 trans-04 pointer m-tb-5">
								<a href="{{route('deleteAll')}}">
									Xóa toàn bộ giỏ hàng
								</a>
							</div>
						</div>

						<div class="flex-c-m stext-101 cl2 size-119 bg8 bor13 hov-btn3 p-lr-15 trans-04 pointer m-tb-10">
							@if(Auth::guard('custo')->check())

							<!-- <a href="{{route('checkOut')}}"> -->
							<a href=" {{route('checkOut')}} " >
								Đặt hàng
							</a>
							@else
							<a href="{{route('dang_nhap')}}">
								<i class="ace-icon fa fa-power-off"></i>
								Đăng nhập trước khi thanh toán
							</a>
							@endif
							
						</div>
						
					</div>
				</div>
			</div>	
		</div>
	</div>
</div>
@stop
@section('script')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
$(document).ready(function(){
// for (var i = 0; i < $cart.length; i++) {
//    alert( $cart[i]);
// }
	// var id= $(".zmdi-minus").val();
	// $("tr").each(function(){
 //      alert($("#num").val())
 //    });
  // $(".zmdi-minus").click(function(){
  //   alert('-');
  // });
  //  $(".zmdi-plus").click(function(){
  //   alert('+');
  // });
});
</script>
@stop
