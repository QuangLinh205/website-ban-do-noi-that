	<header class="header-v4">
		<!-- Header desktop -->
		<div class="container-menu-desktop">
			<!-- Topbar -->
			<!-- <div class="top-bar">
				<div class="content-topbar flex-sb-m h-full container">
					<div class="left-top-bar">
						Free shipp từ 399.00011111 đ
					</div>

					<div class="right-top-bar flex-w h-full">
						
					</div>
				</div>
			</div> -->
		</div>

		<div class="wrap-menu-desktop how-shadow1">
			<nav class="limiter-menu-desktop container">

				<!-- Logo desktop -->		
				<a href="{{route('home')}}" class="logo">
					<img width="200px" src="{{url('/')}}/uploads/tao_logo.png" alt="IMG-LOGO">
				</a> 

				<!-- Menu desktop -->
				<div class="menu-desktop">
					<ul class="main-menu">
						<li class="" >
							<a style="" href="{{route('home')}}">TRANG CHỦ</a>
						
					</li>

					<li class="">
						<a href="{{route('getProduct')}}">SẢN PHẨM</a>
					</li>
					<li class="">
						<a href="{{route('gioithieu')}}">GIỚI THIỆU</a>
					</li>

					<li class="">
						<a href="{{route('lienhe')}}">LIÊN HỆ</a>
					</li>
					<li class="">
						<a href="{{route('new')}}">TIN TỨC</a>
					</li>
				</ul>
			</div>	

			<!-- Icon header -->
			
				<div class="icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11  flex-c-m stext-101 cl0 size-101  bor1" style="border: 1px solid blue">
						<form class="" method="get" action="{{route('search')}}">
							<input class="plh3" type="text" name="key" placeholder="TÌM KIẾM ....">
						</form>
				</div>

				<div class="icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11 icon-header-noti js-show-cart" data-notify="{{$cart->total_quantity}}">
					<i class="zmdi zmdi-shopping-cart"></i>
				</div>


				<div class="navbar-buttons navbar-header pull-right" style="margin-left: 20px" role="navigation">
					<ul class="nav ace-nav">


						<li class="light-blue dropdown-modal">
							@if(Auth::guard('custo')->check())
							<a data-toggle="dropdown" href="#" class="dropdown-toggle">
								
								<span class="user-info">
									<small>Welcome,</small>
									
									{{Auth::guard('custo')->user()->name}}
									
								</span>
							</a>

							<ul class="user-menu dropdown-menu-right dropdown-menu dropdown-yellow dropdown-caret dropdown-close">
								
								<li>
									<a href="{{route('dang_ky')}}">
										<i class="ace-icon fa fa-power-off"></i>
										Đăng ký
									</a>
								</li>

								<li>
									<a href="{{route('dang_xuat')}}">
										<i class="ace-icon fa fa-power-off"></i>
										Đăng xuất
									</a>
								</li>
							</ul>
							@else
							<a data-toggle="dropdown" href="#" class="dropdown-toggle">
								
								<span class="user-info">
									<small>Đăng nhập</small>
								</span>
							</a>

							<ul class="user-menu dropdown-menu-right dropdown-menu dropdown-yellow dropdown-caret dropdown-close">
								<li>
									<a href="{{route('dang_nhap')}}">
										<i class="ace-icon fa fa-power-off"></i>
										Đăng nhập
									</a>
								</li>
								<li>
									<a href="{{route('dang_ky')}}">
										<i class="ace-icon fa fa-power-off"></i>
										Đăng ký
									</a>
								</li>
								
							</ul>
							@endif
						</li>
					</ul>
				</div>


			
		</nav>
	</div>	
</div>

<!-- Header Mobile -->
<div class="wrap-header-mobile">
	<!-- Logo moblie -->		
	<div class="logo-mobile">
		<a href="index.html"><img src="https://baya.vn/static/version1581436380/frontend/Uma/default/vi_VN/images/logo.svg" alt="IMG-LOGO"></a>
	</div>

	<!-- Icon header -->
	<div class="wrap-icon-header flex-w flex-r-m m-r-15">
		<div class="icon-header-item cl2 hov-cl1 trans-04 p-r-11 js-show-modal-search">
			<i class="zmdi zmdi-search"></i>
		</div>

		<div class="icon-header-item cl2 hov-cl1 trans-04 p-r-11 p-l-10 icon-header-noti js-show-cart" data-notify="{{$cart->total_quantity}}">
			<i class="zmdi zmdi-shopping-cart"></i>
		</div>
	</div>

	<!-- Button show menu -->
	<div class="btn-show-menu-mobile hamburger hamburger--squeeze">
		<span class="hamburger-box">
			<span class="hamburger-inner"></span>
		</span>
	</div>
</div>


<!-- Menu Mobile -->
<div class="menu-mobile">
	

	<ul class="main-menu-m">
		<li>
			<a href="index.html">Home</a>
			<ul class="sub-menu-m">
				<li><a href="index.html">Homepage 1</a></li>
				<li><a href="home-02.html">Homepage 2</a></li>
				<li><a href="home-03.html">Homepage 3</a></li>
			</ul>
			<span class="arrow-main-menu-m">
				<i class="fa fa-angle-right" aria-hidden="true"></i>
			</span>
		</li>

		<li>
			<a href="{{route('home')}}">Trang chủ</a>
		</li>

		<li>
			<a href="{{route('getProduct')}}">Sản phẩm</a>
		</li>

		<li>
			<a href="blog.html">Blog</a>
		</li>

		<li>
			<a href="about.html">About</a>
		</li>

	</ul>
</div>

</header>


<!-- Cart -->
<div class="wrap-header-cart js-panel-cart">
	<div class="s-full js-hide-cart"></div>

	<div class="header-cart flex-col-l p-l-65 p-r-25">
		<div class="header-cart-title flex-w flex-sb-m p-b-8">
			<span class="cl2">
				<h3>Giỏ hàng</h3>
			</span>

			<div class="fs-35 lh-10 cl2 p-lr-5 pointer hov-cl1 trans-04 js-hide-cart">
				<i class="zmdi zmdi-close"></i>
			</div>
		</div>

		<div class="header-cart-content flex-w js-pscroll">
			<ul class="header-cart-wrapitem w-full">
				@foreach($cart->items as $cc)
				<li class="header-cart-item flex-w flex-t m-b-12">						
					<a href="{{route('delete',$cc['id'])}}">
						<div class="header-cart-item-img">
							<img src="{{url('')}}/uploads/{{$cc['image']}}" alt="IMG">
						</div>
					</a>
					<div class="header-cart-item-txt p-t-8">
						<a href="" class="header-cart-item-name m-b-18 hov-cl1 trans-04">
							{{$cc['name']}}
						</a>

						<span class="header-cart-item-info">
							{{$cc['quantity']}} x {{number_format($cc['price'])}} = {{number_format($cc['quantity'] * $cc['price'])}}
						</span>
					</div>
				</li>
				@endforeach
			</ul>

			<div class="w-full">
				<div class="header-cart-total w-full p-tb-40">
					Tổng tiền: {{number_format($cart->total_price)}}
				</div>

				<div class="header-cart-buttons flex-w w-full">
					{{-- <a href="{{route('shoping-cart')}}" class="flex-c-m stext-101 cl0 size-107 bg3 bor2 hov-btn3 p-lr-15 trans-04 m-r-8 m-b-10">
						Xem giỏ hàng
					</a> --}}

					<a href="{{route('shoping-cart')}}" class="flex-c-m stext-101 cl0 size-107 bg3 bor2 hov-btn3 p-lr-15 trans-04 m-b-10">
						Xem giỏ hàng
					</a>
				</div>
			</div>
		</div>
	</div>
</div>
