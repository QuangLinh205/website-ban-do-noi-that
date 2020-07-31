@extends('admin.master')
@section('title')
<title>Quản lý tài khoản Admin</title>
@stop
@section('main')
<div class="col-md-5">
	
	<form action="" method="POST" class="" role="form">
		@csrf
		<div class="form-group">
			<label class="sr-only" for="">Họ Tên</label>
			<input type="text" class="form-control" id="" placeholder="Nhập tên" name="name">
			@if($errors->has('name'))
			{{$errors->first('name')}}
			@endif
		</div>
		<div class="form-group">
			<label class="sr-only" for="">Email</label>
			<input type="text" class="form-control" id="" placeholder="Nhập email" name="email">
			@if($errors->has('email'))
			{{$errors->first('email')}}
			@endif
		</div>
		<div class="form-group">
			<label class="sr-only" for="">Mật Khẩu</label>
			<input type="password" class="form-control" id="" placeholder="Nhập mật khẩu" name="password">
			@if($errors->has('password'))
			{{$errors->first('password')}}
			@endif
		</div>
		<div class="form-group">
			<label class="sr-only" for="">Nhập Lại Mật Khẩu</label>
			<input type="password" class="form-control" id="" placeholder="Xác nhận lại mật khẩu" name="confirm_password">
			@if($errors->has('confirm_password'))
			{{$errors->first('confirm_password')}}
			@endif
		</div>
		

		

		<button type="submit" class="btn btn-primary">Thêm mới</button>
	</form>
</div>
<div class="col-md-7">
	@if(session('del'))
	<div class="alert alert-success">
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
		<strong>{{session('del')}}</strong> 
	</div>
	@endif
	@if(session('themmoithanhcong'))
	<div class="alert alert-success">
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
		<strong>{{session('themmoithanhcong')}}</strong> 
	</div>
	@endif

	<div class="clearfix">
		<div class="pull-right tableTools-container"></div>
	</div>
	<div class="table-header">
		Bảng danh sách Admin
	</div>

	<!-- div.table-responsive -->

	<!-- div.dataTables_borderWrap -->
	<div>
		<table id="dynamic-table" class="table table-striped table-bordered table-hover">
			<thead>
				<tr>

					<th>stt</th>
					<th>Tên quản lý</th>
					<th>email</th>


					<th></th>
				</tr>
			</thead>

			<tbody>
				<?php $i=1 ?>
				@foreach($account as $ac)
				<tr>


					<td>
						{{$i++}}
					</td>
					<td>{{$ac->name}}</td>
					<td class="hidden-480">{{$ac->email}}</td>
					<td>
						<div class=" action-buttons">
							<a class="red" href="{{route('page_del_acc',[$ac->id])}}" onclick="return confirm('bạn có muốn xóa admin  {{$ac->name}}?');" title="xóa">
								<i class="ace-icon fa fa-trash-o bigger-130"></i>
							</a>
						</div>

					</td>
				</tr>
				@endforeach
			</tbody>
		</table>
	</div>
</div>
</div>



<!-- PAGE CONTENT ENDS -->
</div><!-- /.col -->
</div><!-- /.row -->
</div><!-- /.page-content -->
</div>
</div><!-- /.main-content -->

@stop