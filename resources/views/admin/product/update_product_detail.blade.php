@extends('admin.master')
@section('title')
<title>Cập nhật ảnh chi tiết sản phẩm</title>
@stop
@section('main')
<div class="col-xs-12">
	<!-- PAGE CONTENT BEGINS -->
	<form action="" method="POST" class="form-horizontal" role="form" enctype="multipart/form-data">
		@csrf
		<div class="form-group">
			<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Tên sản phẩm </label>

			<div class="col-sm-9">
				<input type="text" id="form-field-1"  class="col-xs-10 col-sm-5" name="name" value="{{$edit->product->name}}" disabled/>
			</div>
		</div>

		<div class="form-group">
			<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Ảnh 1 </label>
			<div class="col-sm-9">
				<input type="file" id="id-input-file-2"  name="image_1" />
			</div>
			<img src="{{url('/')}}/uploads/{{$edit->image_1}}" alt="" width="150px">
		</div>

		<div class="form-group">
			<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Ảnh 2 </label>
			<div class="col-sm-9">
				<input type="file" id="id-input-file-2"  name="image_2" />
			</div>
			<img src="{{url('/')}}/uploads/{{$edit->image_2}}" alt="" width="150px">
		</div>

		<div class="form-group">
			<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Ảnh 3 </label>
			<div class="col-sm-9">
				<input type="file" id="id-input-file-2"  name="image_3" />
			</div>
			<img src="{{url('/')}}/uploads/{{$edit->image_3}}" alt="" width="150px">
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