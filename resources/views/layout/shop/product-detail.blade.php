@extends('layout.layouts.index')

@section('title')
<title>Product Details</title>
@stop
@section('content')
<!-- Product Detail -->
<section class="sec-product-detail bg0 p-t-65 p-b-60">
	<div class="container">
		<div class="row">
			<div class="col-md-6 col-lg-7 p-b-30">
				<div class="p-l-25 p-r-30 p-lr-0-lg">
					<div class="wrap-slick3 flex-sb flex-w">
						<!-- <div class="wrap-slick3-dots"></div> -->
						<div class="wrap-slick3-arrows flex-sb-m flex-w"></div>

						<div class="slick3 gallery-lb">
							<div class="item-slick3" data-thumb="">
								<div class="wrap-pic-w pos-relative">
									<img src="{{url('/')}}/uploads/{{$product->image}}" alt="IMG-PRODUCT">

									<!-- <a class="flex-c-m size-108 how-pos1 bor0 fs-16 cl10 bg0 hov-btn3 trans-04" href="">111111111111111111111
										<i class="fa fa-expand"></i>
									</a> -->

									<div class="prod-thumbnail row owl-dots" id="carousel-custom-dots">
										@if(isset($product_detail->image_1))
										<div class="col-3 owl-dots">
											<img src="{{url('/')}}/uploads/{{$product_detail->image_1}}" alt="IMG-PRODUCT">
										</div>
										@endif
										@if(isset($product_detail->image_2))
										<div class="col-3 owl-dots">
											<img src="{{url('/')}}/uploads/{{$product_detail->image_2}}" alt="IMG-PRODUCT">
										</div>
										@endif
										@if(isset($product_detail->image_3))
										<div class="col-3 owl-dots">
											<img src="{{url('/')}}/uploads/{{$product_detail->image_3}}" alt="IMG-PRODUCT">
										</div>
										@endif
									</div>
								</div>
							</div>

						</div>
					</div>
				</div>
			</div>

			<div class="col-md-6 col-lg-5 p-b-30">
				<div class="p-r-50 p-t-5 p-lr-0-lg">
					<h4 class="mtext-105 cl2 js-name-detail p-b-14">
						{{$product->name}}
					</h4>
					@if($product->sale_price > 0)
					<span class="mtext-106 cl2">
						<strike>{{number_format($product->price)}} </strike>VND
					</span>
					<br>
					<span class="mtext-106 cl2">
						{{number_format($product->price-(($product->price * $product->sale_price)/100))}} VND
					</span>
					@else
					<span class="mtext-106 cl2">
						{{number_format($product->price)}} VND
					</span>
					@endif

					<p class="stext-106 cl2">
						{{$product->description}}
					</p>

					<div class="flex-w flex-r-m p-b-10">
						<div class="size-204 flex-w flex-m respon6-next">
							<a href="{{route('add',['id'=>$product->id])}}" class="flex-c-m stext-101 cl0 size-101 bg1 bor1 hov-btn1 p-lr-15 trans-04 ">
								THÊM SẢN PHẨM VÀO GIỎ HÀNG
							</a >
						</div>
					</div>	

					<!--  --------------------------đánh giá sản phẩm -----------------------------------       -->
					@if(session('thanhcong'))
					{{session('thanhcong')}}
					@endif
					<div class="component_rating" >
						<div class="bg6 flex-c-m flex-w size-302 m-t-73 p-tb-15">
							<h3 class="center">Đáng giá sản phẩm</h3>
						</div>
						<form action="{{route('rating_star',$product->id)}}" method="post" >
							@csrf
							<div class="">
								<span class="fa fa-star" style="color: #fd9727"><b style="color: #fd9727">{{number_format($star,1)}}</b></span>
							</div>
							
							<div >
								<div class="list_rating">
									<div class="item-rating">
										<div class="form-group inline">
											<div class="col-sm-9 inline" style="">
												
												<input type="radio"  id="" placeholder="Input field" value="1" name="rating_star" >1 
												<span class="fa fa-star" style="color: #fd9727"></span>
												@foreach($demsao as $dem)
												@if($dem->rating_star == 1)
												{{$dem-> number}} lượt bình chọn
												@endif
												@endforeach

												<input type="radio"  id="" placeholder="Input field" value="2" name="rating_star" >2 
												<span class="fa fa-star" style="color: #fd9727"></span><span class="fa fa-star" style="color: #fd9727"></span>
												@foreach($demsao as $dem)
												@if($dem->rating_star == 2)
												{{$dem-> number}} lượt bình chọn
												@endif
												@endforeach

												<input type="radio"  id="" placeholder="Input field" value="3" name="rating_star" >3 
												<span class="fa fa-star" style="color: #fd9727"></span><span class="fa fa-star" style="color: #fd9727"></span>
												<span class="fa fa-star" style="color: #fd9727"></span>
												@foreach($demsao as $dem)
												@if($dem->rating_star == 3)
												{{$dem-> number}} lượt bình chọn
												@endif
												@endforeach

												<input type="radio"  id="" placeholder="Input field" value="4" name="rating_star" >4 
												<span class="fa fa-star" style="color: #fd9727"></span><span class="fa fa-star" style="color: #fd9727"></span>
												<span class="fa fa-star" style="color: #fd9727"></span><span class="fa fa-star" style="color: #fd9727"></span>
												@foreach($demsao as $dem)
												@if($dem->rating_star == 4)
												{{$dem-> number}} lượt bình chọn
												@endif
												@endforeach

												<input type="radio"  id="" placeholder="Input field" value="5" name="rating_star" >5 
												<span class="fa fa-star" style="color: #fd9727"></span><span class="fa fa-star" style="color: #fd9727"></span>
												<span class="fa fa-star" style="color: #fd9727"></span><span class="fa fa-star" style="color: #fd9727"></span>
												<span class="fa fa-star" style="color: #fd9727"></span>
												@foreach($demsao as $dem)
												@if($dem->rating_star == 5)
												{{$dem-> number}} lượt bình chọn
												@endif
												@endforeach
												
											</div>
											@if($errors->has('rating_star'))
											<div class="help-block">
												{{$errors->first('rating_star')}}
											</div>
											@endif
										</div>
										@if(Auth::guard('custo')->check())
										<div class="form-group">
											<textarea name="content_rating" class="form-control" rows="3"></textarea>
											@if($errors->has('content_rating'))
											<div class="help-block">
												{{$errors->first('content_rating')}}
											</div>
											@endif
										</div>

									</div>
								</div>
							</div>
							<div>
								<button type="submit" class=" flex-c-m stext-101 cl0 size-101 bg1 bor1 hov-btn1 p-lr-15 trans-04 ">đáng giá sản phẩm</button>
							</div>

							@endif
							@foreach($product->rating_star as $cm)

							<div class="media">
								<!-- <img src="{{url('')}}/public/ssa/images/icons/icon-heart-02.png" alt=""> -->
								@foreach($cus as $value)
								@if($value->id == $cm->id_customer)
								<p><b>{{$value->name}}: </b></p>
								@endif
								@endforeach
								@if($cm->rating_star==5)
								<span class="fa fa-star" style="color: #fd9727"><span class="fa fa-star" style="color: #fd9727">
									<span class="fa fa-star" style="color: #fd9727"><span class="fa fa-star" style="color: #fd9727">
										<span class="fa fa-star" style="color: #fd9727">
											@endif
											@if($cm->rating_star==4)
											<span class="fa fa-star" style="color: #fd9727"><span class="fa fa-star" style="color: #fd9727">
												<span class="fa fa-star" style="color: #fd9727"><span class="fa fa-star" style="color: #fd9727">
													@endif
													@if($cm->rating_star==3)
													<span class="fa fa-star" style="color: #fd9727"><span class="fa fa-star" style="color: #fd9727">
														<span class="fa fa-star" style="color: #fd9727">
															@endif
															@if($cm->rating_star==2)
															<span class="fa fa-star" style="color: #fd9727"><span class="fa fa-star" style="color: #fd9727">
																@endif
																@if($cm->rating_star==1)
																<span class="fa fa-star" style="color: #fd9727">
																	@endif
																</div>	
																{{$cm->content_rating}}

																@endforeach

															</form>
														</div>
													</div>

												</div>
											</div>
										</div>

									</div>

									<div class="bg6 flex-c-m flex-w size-302 m-t-73 p-tb-15">
										<span class="stext-107 cl6 p-lr-25">
											<h4>Sản phẩm trên thuộc danh mục: {{$product->categories->name}}</h4>
										</span>
									</div>
								</section>


								<!-- ----------------------------sản phẩm cùng danh mục----------------------------- -->
								<section class="sec-relate-product bg0 p-t-45 p-b-105">
									<div class="container">
										<!-- <div class="p-b-45">
											<h3 class="cl5 bor3 m-r-32">
												Sản phẩm cùng danh mục
											</h3>
										</div> -->

										<!-- Slide2 -->
										<div class="wrap-slick2">
											<div class="slick2">
												@foreach($prod as $value)
												<div class="item-slick2 p-l-15 p-r-15 p-t-15 p-b-15">
													<!-- Block2 -->
													<!-- <p>jhkjhj</p> -->

													<div class="block2">
														<div class="block2-pic hov-img0">
															<img src="{{url('/')}}/uploads/{{$value->image}}" alt="IMG-PRODUCT">
														</div>

														<div class="block2-txt flex-w flex-t p-t-14">
															<div class="block2-txt-child1 flex-col-l ">
																<a href="{{route('product_detail',[$value->id])}}" class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
																	{{$value->name}}
																</a>

																<span class="stext-105 cl3">
																	{{$value->price}} VND
																</span>

																<span class="stext-105 cl3">
																	Giảm {{$value->sale_price}} %
																</span>
															</div>

															
														</div>
													</div>
												</div>
												@endforeach
											</div>
											<!--  ---------------------bình luận của khách hàng -----------------------------------           -->
											<div class="bg6   m-t-73 p-tb-15">
												@if(Auth::guard('custo')->check())
												@if(session('thongbao'))
												{{session('thongbao')}}
												@endif
												<div class="well">
													<h4>viết bình luận ... <span class="glyphicon glyphicon-pencil"></span></h4>
													<form action="{{route('post_comment',$product->id)}}" role="form" method="post">
														@csrf

														<div class="form-group">
															<textarea name="NoiDung" class="form-control" rows="3">

															</textarea>
															@if($errors->has('NoiDung'))
															<div class="help-block">
																{{$errors->first('NoiDung')}}
															</div>
															@endif
														</div>
														<button type="submit" class="btn btn-primary">Gửi</button>
													</form>
												</div>
												@endif
											</div>
											<div class="bg6 flex-c-m flex-w size-302 m-t-73 p-tb-15">
												<span class="stext-107 cl6 p-lr-25">
													<h4>Bình luận của khách hàng</h4>
												</span>
											</div>
											@foreach($product->comment as $cm)
											<div class="media">
												<!-- <img src="{{url('')}}/public/ssa/images/icons/icon-heart-02.png" alt=""> -->
												@foreach($cus as $value)
												@if($value->id == $cm->id_customer)
												<h5><b>{{$value->name}}: </b></h5>
												@endif
												@endforeach
												<br>
												<h6>{{$cm->content}}</h6>
											</div>
											@endforeach
										</div>
									</div>
								</section>
								@stop
								@section('script')
								<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
								<script type="text/javascript">
									$(document).ready(function () {
										$("#btn-show").click(function(){
											arlert('djhfkdsf')
											var id = $(this).attr("data-id");
											$.ajax({
												url: "http://localhost/simi/public/getinfor&"+id,
												type: 'GET',
												dataType: 'json',
												success: function(response) {
													$("#name-pr").text(response.name);
													$("#img-pr1").attr("data-thumb","{{url('../')}}/uploads/product/"+response.image);
													$("#img-pr2").attr("src","{{url('../')}}/uploads/product/"+response.image);
													$("#img-pr3").attr("href","{{url('../')}}/uploads/product/"+response.image);
													$("#price-pr").text(response.price+"VND");
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