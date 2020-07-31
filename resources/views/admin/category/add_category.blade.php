@extends('admin.master')
@section('title')
<title>Thêm mới danh mục</title>
@stop
@section('main')

<div class="col-xs-12">
	<!-- PAGE CONTENT BEGINS -->
	<form action="{{route('page_add_category')}}" method="POST" class="form-horizontal" role="form">
		@csrf
		<div class="form-group">
			<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Tên danh mục </label>

			<div class="col-sm-9">
				<input type="text" id="form-field-1" placeholder="tên danh mục" class="col-xs-10 col-sm-5" name="name" />
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
				<input type="radio"  id="" placeholder="Input field" value="0" name="status" > ẩn
				<input type="radio"  id="" placeholder="Input field" value="1" name="status" > hiện
				@if($errors->has('status'))
				<div class="help-block">
					{{$errors->first('status')}}
				</div>
				@endif
			</div>
		</div>


		<div class="form-group">
			<label class="col-sm-3 control-label no-padding-right" for="form-field-1-1"> Mô tả </label>

			<div class="col-sm-9">
				<input type="text" id="form-field-1-1" placeholder="mô tả danh mục" class="col-xs-10 col-sm-5" name="description" />
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
					Thêm mới
				</button>

				&nbsp; &nbsp; &nbsp;
				<button class="btn" type="reset">
					<i class="ace-icon fa fa-undo bigger-110"></i>
					Làm mới
				</button>
			</div>
		</div>
	</form>
		@stop