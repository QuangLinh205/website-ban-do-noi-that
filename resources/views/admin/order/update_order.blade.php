@extends('admin.master')
@section('title')
<title>Cập nhật trạng thái đơn hàng</title>
@stop
@section('main')
<div class="col-xs-12">
	<!-- PAGE CONTENT BEGINS -->
	<form action="" method="POST" class="form-horizontal" role="form">
		@csrf
		<div class="form-group">
			<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Tên khách hàng </label>

			<div class="col-sm-9">
				<input type="text" id="form-field-1" value="{{$edit->customer->name}}" class="col-xs-10 col-sm-5" name="id_customer" disabled/>
			</div>
		</div>
		<div class="form-group">
			<label class="col-sm-3 control-label no-padding-right" for="">Trạng thái</label>
			<div class="col-sm-9">
				@if($edit->status==0)

				<input type="radio"  id="" placeholder="Input field" value="0" name="status" checked> đặt hàng
				<input type="radio"  id="" placeholder="Input field" value="1" name="status"> đang giao hàng
				<input type="radio"  id="" placeholder="Input field" value="2" name="status"> huy đơn hàng
				<input type="radio"  id="" placeholder="Input field" value="3" name="status"> đã thanh toán
				@elseif($edit->status==1)
				<input type="radio"  id="" placeholder="Input field" value="0" name="status" > đặt hàng
				<input type="radio"  id="" placeholder="Input field" value="1" name="status" checked> đang giao hàng
				<input type="radio"  id="" placeholder="Input field" value="2" name="status"> huy đơn hàng
				<input type="radio"  id="" placeholder="Input field" value="3" name="status"> đã thanh toán
				@elseif($edit->status==2)
				<input type="radio"  id="" placeholder="Input field" value="0" name="status" > đặt hàng
				<input type="radio"  id="" placeholder="Input field" value="1" name="status" > đang giao hàng
				<input type="radio"  id="" placeholder="Input field" value="2" name="status" checked> huy đơn hàng
				<input type="radio"  id="" placeholder="Input field" value="3" name="status"> đã thanh toán
				@elseif($edit->status==3)
				<input type="radio"  id="" placeholder="Input field" value="0" name="status" > đặt hàng
				<input type="radio"  id="" placeholder="Input field" value="1" name="status" > đang giao hàng
				<input type="radio"  id="" placeholder="Input field" value="2" name="status" > huy đơn hàng
				<input type="radio"  id="" placeholder="Input field" value="3" name="status" checked> đã thanh toán
				@endif
			</div>
		</div>


		

		<div class="space-4"></div>



		<div class="clearfix form-actions">
			<div class="col-md-offset-3 col-md-9">
				<button class="btn btn-info" type="submit">
					<i class="ace-icon fa fa-check bigger-110"></i>
					Cập nhật
				</button>

				&nbsp; &nbsp; &nbsp;
				
			</div>
		</div>
		@stop