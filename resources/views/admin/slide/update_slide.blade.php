@extends('admin.master')
@section('title')
<title>Cập nhật banner</title>
@stop
@section('main')
<div class="col-xs-12">
	<!-- PAGE CONTENT BEGINS -->
	<form action="" method="POST" class="form-horizontal" role="form" enctype="multipart/form-data">
		@csrf
		<div class="form-group">
			<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Tên banner </label>
			<div class="col-sm-9">
				<input type="text" id="form-field-1"  class="col-xs-10 col-sm-5" name="name" value="{{$slide->name}}" />
			</div>
		</div>

		<div class="form-group">
			<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Ảnh </label>
			<div class="col-sm-9">
				<input type="file" id="id-input-file-2"  name="image" />
				<img src="{{url('/')}}/uploads/{{$slide->image}}" alt="" width="200px">
			</div>
		</div>

		<div class="form-group">
			<label class="col-sm-3 control-label no-padding-right" for="form-field-1" for="">Trạng thái</label>
			<div class="col-sm-9">
				@if($slide->status==0)
				<input type="radio"  id="" placeholder="Input field" value="0" name="status" checked> ẩn
				<input type="radio"  id="" placeholder="Input field" value="1" name="status"> hiện
				@else
				<input type="radio"  id="" placeholder="Input field" value="0" name="status" > ẩn
				<input type="radio"  id="" placeholder="Input field" value="1" name="status" checked> hiện
				@endif
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