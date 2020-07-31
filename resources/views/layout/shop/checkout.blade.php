@extends('layout.layouts.index')

@section('title')
<title>Check out</title>
@stop

@section('content')

				<div class="col-sm-10 col-lg-7 col-xl-5 m-lr-auto m-b-50">
				<div class="bor10 p-lr-40 p-t-30 p-b-40 m-l-63 m-r-40 m-lr-0-xl p-lr-15-sm">
					<h4 class="mtext-109 cl2 p-b-30">
						Cart Totals
					</h4>

					
					<div>
						<form method="POST" action="">
							@csrf
							
							<div class="form-group">
								<label for="usr">Tên khách hàng:</label>
								<input type="text" class="form-control" id="usr" name="name" value="{{Auth::guard('custo')->user()->name}}">
							</div>
							<div class="form-group">
								<label for="em">Email:</label>
								<input type="text" class="form-control" id="em" name="email" value="{{Auth::guard('custo')->user()->email}}">
							</div>
							<div class="form-group">
								<label for="number">Số điện thoại:</label>
								<input type="text" class="form-control" id="number" name="phone" value="{{Auth::guard('custo')->user()->phone_number}}">
							</div>
							<div class="form-group">
								<label for="ad">Địa chỉ:</label>
								<input type="text" class="form-control" id="" name="address" value="{{Auth::guard('custo')->user()->address}}">
							</div>
							
							<div class="form-group">
								<label for="usr">Tên người nhận:</label>
								<input type="text" class="form-control" id="usr" name="receiver" value="">
							</div>
							<div class="form-group">
								<label for="usr">Số điện thoại người nhận:</label>
								<input type="text" class="form-control" id="usr" name="phone_receiver" value="">
							</div>

							<button type="submit" class="btn btn-primary btn-lg pull-right" style="margin-left: 10px;width: 100%; padding: 15px">Đặt hàng</button>
						</form>
					</div>

					<div class="flex-c-m stext-101 p-lr-15 trans-04 pointer">
						
					</div>
				</div>
			</div>

@stop