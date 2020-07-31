@extends('admin.master')
@section('title')
<title>Cập nhật tin tức</title>
@stop
@section('main')
<div class="col-xs-12">
	@if(session('er'))
	<div class="alert alert-success">
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
		<strong>{{session('er')}}</strong> 
	</div>
	@endif
	<!-- PAGE CONTENT BEGINS -->
	<form action="{{route('page_update_new',[$new1->id])}}" method="POST" class="form-horizontal" role="form" enctype="multipart/form-data">
		@csrf
		<div class="form-group">
			<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Tiêu đề </label>

			<div class="col-sm-9">
				<input type="text" id="form-field-1" value="{{$new1->title}}" class="col-xs-10 col-sm-5" name="title" />
				@if($errors->has('title'))
				<div class="help-block">
					{{$errors->first('title')}}
				</div>
				@endif
			</div>
		</div>

		<div class="form-group">
			<label class="col-sm-3 control-label no-padding-right" for="form-field-1-1"> Ảnh </label>
			<div class="col-sm-9">
				<input type="file" id="id-input-file-2"  name="image" />
				@if($errors->has('image'))
				<div class="help-block">
					{{$errors->first('image')}}
				</div>
				@endif
			</div>
			<div class="col-sm-9">
				<img src="{{url('/')}}/uploads/{{$new1->image}}" alt="" width="100px" >
			</div>
		</div>

		<div class="form-group">
			<label class="col-sm-3 control-label no-padding-right" for="form-field-1-1"> Trạng thái </label>
			<div class="col-sm-9">
				@if($new1->status==0)

				<input type="radio"  id="" placeholder="Input field" value="0" name="status" checked> ẩn
				<input type="radio"  id="" placeholder="Input field" value="1" name="status"> hiện
				@else
				<input type="radio"  id="" placeholder="Input field" value="0" name="status"> ẩn
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
			<label class="col-sm-3 control-label no-padding-right" for="form-field-1-1"> Nội dung chính </label>

			<div class="col-sm-9">
				<input type="text" id="form-field-1-1" value="{{$new1->main_content}}" class="form-control" name="main_content" />
				@if($errors->has('main_content'))
				<div class="help-block">
					{{$errors->first('main_content')}}
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
	</form>
</div>
@stop