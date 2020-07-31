@extends('admin.master')
@section('title')
<title>Thêm mới sản phẩm</title>
@stop
@section('main')
<div class="col-xs-12">
	<!-- PAGE CONTENT BEGINS -->
	<form action="" method="POST" class="form-horizontal" role="form" enctype="multipart/form-data">
		@csrf
		<div class="form-group">
			<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Tên sản phẩm </label>
			<div class="col-sm-9">
				<input type="text" id="form-field-1" placeholder="Nhập tên sản phẩm" class="col-xs-10 col-sm-5" name="name" />
				@if($errors->has('name'))
				<div class="help-block">
					{{$errors->first('name')}}
				</div>
				@endif
			</div>
		</div>

		<div class="form-group">
			<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Số lượng sản phẩm </label>
			<div class="col-sm-9">
				<input type="text" id="form-field-1" placeholder="Nhập số lượng sản phẩm" class="col-xs-10 col-sm-5" name="quantity" />
				@if($errors->has('quantity'))
				<div class="help-block">
					{{$errors->first('quantity')}}
				</div>
				@endif
			</div>
		</div>

		<div class="form-group">
			<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Giá </label>
			<div class="col-sm-9">
				<input type="text" id="form-field-1" placeholder="Nhập giá sản phẩm" class="col-xs-10 col-sm-5" name="price" />
				@if($errors->has('price'))
				<div class="help-block">
					{{$errors->first('price')}}
				</div>
				@endif
			</div>
		</div>

		<div class="form-group">
			<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Phần trăm giảm giá </label>
			<div class="col-sm-9">
				<input type="text" id="form-field-1" placeholder="Nhập phần trăm giảm giá" class="col-xs-10 col-sm-5" name="sale_price" />
				@if($errors->has('sale_price'))
				<div class="help-block">
					{{$errors->first('sale_price')}}
				</div>
				@endif
			</div>
		</div>

		<div class="form-group">
			<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Mô tả </label>
			<div class="col-sm-9">
				<input type="text" id="form-field-1" placeholder="Nhập mô tả" class="col-xs-10 col-sm-5" name="description" />
				@if($errors->has('description'))
				<div class="help-block">
					{{$errors->first('description')}}
				</div>
				@endif
			</div>
		</div>

		<div class="form-group">
			<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Hình ảnh </label>
			<div class="col-sm-9">
				<div class="form-group">
					<div class="col-xs-12">
						<input multiple="" type="file" id="id-input-file-3" name="image" />
						@if($errors->has('image'))
				<div class="help-block">
					{{$errors->first('image')}}
				</div>
				@endif
					</div>
				</div>
			</div>
		</div>

		<div class="form-group">
			<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Trạnh thái </label>
			<div class="col-sm-9">
				<input type="radio"  id="" placeholder="Input field" value="0" name="status"> ẩn
				<input type="radio"  id="" placeholder="Input field" value="1" name="status"> hiện
				@if($errors->has('status'))
				<div class="help-block">
					{{$errors->first('status')}}
				</div>
				@endif
			</div>
		</div>

		<div class="form-group">
			<label class="col-sm-3 control-label no-padding-right" for="form-field-1-1"> Tên danh mục </label>
			<div class="col-sm-9">
				<select name="id_category">
					@foreach($category as $catego)
					<option value="{{$catego->id}}">{{$catego->name}}</option>
					@endforeach
				</select>
			</div>
		</div>



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
</div>
@stop