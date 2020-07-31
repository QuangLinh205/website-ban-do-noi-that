@extends('admin.master')
@section('title')
<title>Cập nhật sản phẩm</title>
@stop
@section('main')
<div class="col-xs-12">
	<!-- PAGE CONTENT BEGINS -->
	<form action="" method="POST" class="form-horizontal" role="form" enctype="multipart/form-data">
		@csrf
		<div class="form-group">
			<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Tên sản phẩm </label>

			<div class="col-sm-9">
				<input type="text" id="form-field-1"  class="col-xs-10 col-sm-5" name="name" value="{{$product->name}}" />
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
				<input type="text" id="form-field-1"  class="col-xs-10 col-sm-5" name="quantity" value="{{$product->quantity}}" />
				@if($errors->has('quantity'))
				<div class="help-block">
					{{$errors->first('quantity')}}
				</div>
				@endif
			</div>
		</div>

		<div class="form-group">
			<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Giá sản phẩm </label>

			<div class="col-sm-9">
				<input type="text" id="form-field-1"  class="col-xs-10 col-sm-5" name="price" value="{{$product->price}}"/>
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
				<input type="text" id="form-field-1"  class="col-xs-10 col-sm-5" name="sale_price" value="{{$product->sale_price}}"/>
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
				<input type="text" id="form-field-1"  class="col-xs-10 col-sm-5" name="description" value="{{$product->description}}"/>
				@if($errors->has('description'))
				<div class="help-block">
					{{$errors->first('description')}}
				</div>
				@endif
			</div>
		</div>

		


		<div class="form-group">
			<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Ảnh </label>
			<div class="col-sm-9">
				<input type="file" id="id-input-file-2"  name="image" />

			</div>
			<img src="{{url('/')}}/uploads/{{$product->image}}" alt="" width="200px">
		</div>



		<div class="form-group">
			<label class="col-sm-3 control-label no-padding-right" for="form-field-1" for="">Trạng thái</label>
			<div class="col-sm-9">
				@if($product->status==0)
				<input type="radio"  id="" placeholder="Input field" value="0" name="status" checked> ẩn
				<input type="radio"  id="" placeholder="Input field" value="1" name="status"> hiện
				@else
				<input type="radio"  id="" placeholder="Input field" value="0" name="status" > ẩn
				<input type="radio"  id="" placeholder="Input field" value="1" name="status" checked> hiện
				@endif
				@if($errors->has('status'))
				<div class="help-block">
					{{$errors->first('status')}}
				</div>
				@endif
			</div>

		</div>


		<div class="form-group">
			<label class="col-sm-3 control-label no-padding-right" for="form-field-1-1">Tên danh mục </label>
			<div class="col-sm-9">
				<select name="id_category1">
					@foreach($category as $catego)
					
					<option value="{{$catego->id}}" 
						@if($catego->id==$product->id_category)
						selected="selected"
						@endif>
						{{$catego->name}}
					</option>
					
					@endforeach
				</select>
			</div>
		</div>

		<div class="clearfix form-actions">
			<div class="col-md-offset-3 col-md-9">
				<button class="btn btn-info" type="submit">
					<i class="ace-icon fa fa-check bigger-110"></i>
					Cập nhật
				</button>

				&nbsp; &nbsp; &nbsp;
				
			</div>
		</div>
	</form>
</div>
@stop