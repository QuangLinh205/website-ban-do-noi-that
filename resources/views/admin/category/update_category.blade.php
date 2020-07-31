@extends('admin.master')
@section('title')
<title>Cập nhật danh mục</title>
@stop
@section('main')
<div class="col-xs-12">
	<!-- PAGE CONTENT BEGINS -->
	<form action="" method="POST" class="form-horizontal" role="form">
		@csrf
		<div class="form-group">
			<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Tên danh mục </label>

			<div class="col-sm-9">
				<input type="text" id="form-field-1" value="{{$categories->name}}" class="col-xs-10 col-sm-5" name="name" />
				@if($errors->has('name'))
				<div class="help-block">
					{{$errors->first('name')}}
				</div>
				@endif
			</div>
		</div>
		<div class="form-group">
			<label class="col-sm-3 control-label no-padding-right" for="">Trạng thái</label>
			<div class="col-sm-9">
				@if($categories->status==0)

				<input type="radio"  id="" placeholder="Input field" value="0" name="status" checked> ẩn
				<input type="radio"  id="" placeholder="Input field" value="1" name="status"> hiện
				@else
				<input type="radio"  id="" placeholder="Input field" value="0" name="status"> ẩn
				<input type="radio"  id="" placeholder="Input field" value="1" name="status" checked> hiện
				@endif
			</div>
		</div>


		<div class="form-group">
			<label class="col-sm-3 control-label no-padding-right" for="form-field-1-1"> Mô tả </label>

			<div class="col-sm-9">
				<input type="text" id="form-field-1-1" value="{{$categories->description}}" placeholder="mô tả danh mục" class="col-xs-10 col-sm-5" name="description" />
				@if($errors->has('description'))
				<div class="help-block">
					{{$errors->first('description')}}
				</div>
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