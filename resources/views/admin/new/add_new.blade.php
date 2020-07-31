@extends('admin.master')
@section('title')
<title>Thêm mới tin tức</title>
@stop
@section('main')
<div class="col-xs-12">
	<!-- PAGE CONTENT BEGINS -->
	<form action="{{route('page_add_new')}}" method="POST" class="form-horizontal" role="form" enctype="multipart/form-data">
		@csrf
		<div class="form-group">
			<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Tiêu đề </label>

			<div class="col-sm-9">
				<input type="text" id="form-field-1" placeholder="tên tiêu đề" class="col-xs-10 col-sm-5" name="title" />
				@if($errors->has('title'))
				<div class="help-block">
					{{$errors->first('title')}}
				</div>
				@endif
			</div>
		</div>

		
		<div class="form-group">
			<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Ảnh </label>
			<div class="col-sm-9">
				<input type="file" id="id-input-file-2"  name="image" />
				@if($errors->has('image'))
				<div class="help-block">
					{{$errors->first('image')}}
				</div>
				@endif
			</div>
		</div>


		<div class="form-group">
			<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Trạng thái </label>
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
			<label class="col-sm-3 control-label no-padding-right" for="form-field-1-1"> Nội dung chính </label>
			<div class="col-sm-9">
				<input type="text" id="form-field-1-1" placeholder="mô tả danh mục" class="form-control" name="main_content" />
				@if($errors->has('main_content'))
				<div class="help-block">
					{{$errors->first('main_content')}}
				</div>
				@endif
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