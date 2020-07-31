@extends('admin.master')
@section('title')
<title>Thêm mới banner</title>
@stop
@section('main')
<div class="row">
	<div class="col-xs-12">
		<!-- PAGE CONTENT BEGINS -->
		<form action="" method="POST" class="form-horizontal" role="form" enctype="multipart/form-data">
			@csrf
			<div class="form-group">
				<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Tên banner </label>

				<div class="col-sm-9">
					<input type="text" id="form-field-1" placeholder="Nhập tên Banner" class="col-xs-10 col-sm-5" name="name" />
					@if($errors->has('name'))
					<div class="help-block">
						{{$errors->first('name')}}
					</div>
					@endif
				</div>
			</div>

			<div class="form-group">
				<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Ảnh </label>
				<div class="col-sm-9">
					
					<input multiple="" type="file" id="id-input-file-3" name="image" />
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
</div>
@stop