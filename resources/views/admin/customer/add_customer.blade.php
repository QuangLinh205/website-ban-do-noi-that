@extends('admin.master')

@section('main')
	<div class="col-xs-12">
		@if(session('noadd'))
	<div class="alert alert-success">
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
		<strong>{{session('noadd')}}</strong> 
	</div>
	@endif
								<!-- PAGE CONTENT BEGINS -->
								<form action="{{route('page_add_customer')}}" method="POST" class="form-horizontal" role="form">
									@csrf
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> tên </label>

										<div class="col-sm-9">
											<input type="text" id="form-field-1" placeholder="tên danh mục" class="col-xs-10 col-sm-5" name="name" />
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> email </label>

										<div class="col-sm-9">
											<input type="text" id="form-field-1" placeholder="email khách hàng" class="col-xs-10 col-sm-5" name="email" />
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> số điện thoại </label>

										<div class="col-sm-9">
											<input type="text" id="form-field-1" placeholder="tên danh mục" class="col-xs-10 col-sm-5" name="phone_number" />
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> địa chỉ </label>

										<div class="col-sm-9">
											<input type="text" id="form-field-1" placeholder="tên danh mục" class="col-xs-10 col-sm-5" name="address" />
										</div>
									</div>
									<div class="form-group">
										<label class="sr-only" for="">giới tính</label>
			
										<input type="radio"  id="" placeholder="Input field" value="0" name="gender"> nam
										<input type="radio"  id="" placeholder="Input field" value="1" name="gender"> nữ
			
									</div>

									<div class="form-group">
										<label class="sr-only" for="">label</label>
			
										<input type="radio"  id="" placeholder="Input field" value="0" name="status"> ẩn
										<input type="radio"  id="" placeholder="Input field" value="1" name="status"> hiện
			
									</div>


									

									

									

									<div class="clearfix form-actions">
										<div class="col-md-offset-3 col-md-9">
											<button class="btn btn-info" type="submit">
												<i class="ace-icon fa fa-check bigger-110"></i>
												Submitdi
											</button>

											&nbsp; &nbsp; &nbsp;
											<button class="btn" type="reset">
												<i class="ace-icon fa fa-undo bigger-110"></i>
												Reset
											</button>
										</div>
									</div>
@stop