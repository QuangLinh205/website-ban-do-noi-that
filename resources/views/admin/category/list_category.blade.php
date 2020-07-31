@extends('admin.master')
@section('title')
<title>Danh sách danh mục</title>
@stop
@section('search')
<div class="breadcrumbs ace-save-state" id="breadcrumbs">
						<ul class="breadcrumb">
							<li>
								<i class="ace-icon fa fa-home home-icon"></i>
								<a href="#">Home</a>
							</li>
							<li class="active">Dashboard</li>
						</ul> <!-- /.breadcrumb -->

						<div class="nav-search" id="nav-search">
							<form class="form-search" action="{{route('search_category')}}">
								<span class="input-icon" >
									<input type="text" placeholder="Search ..." class="nav-search-input" id="nav-search-input" autocomplete="off" name="key">
									<i class="ace-icon fa fa-search nav-search-icon"></i>
									
								</span>
							</form>
						</div><!-- /.nav-search -->
					</div>
@stop
@section('main')
@if(session('del'))
<div class="alert alert-success">
	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
	<strong>{{session('del')}}</strong>
</div>
@endif
@if(session('update'))
<div class="alert alert-success">
	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
	<strong>{{session('update')}}</strong>
</div>
@endif
@if(session('khongxoaduoc'))
<div class="alert alert-danger">
	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
	<strong>{{session('khongxoaduoc')}}</strong>
</div>
@endif
<div class="col-xs-12">
	<div class="clearfix">
			
		</div>
	<div class="table-header">
		Bảng danh sách danh mục

		<button class="pull-right btn-light"> <a href="{{route('page_add_category')}}"> Thêm mới</a></button>
	</div>


	<!-- div.table-responsive -->

	<!-- div.dataTables_borderWrap -->
	<div>
		<table id="dynamic-table" class="table table-striped table-bordered table-hover">
			<thead>
				<tr>

					<th class="center">stt</th>
					<th class="center">Tên danh mục</th>
					<th class="center">Trạng thái</th>
					<th class="center">Mô tả</th>

					<th></th>
				</tr>
			</thead>

			<tbody>
				<?php $i=1 ?>
				@foreach($categories1 as $cate)
				<tr>


					<td class="center">{{$i++}}</td>
					<td class="center">{{$cate->name}}</td>
					<td class="center">{{$cate->status}}</td>
					<td>{{$cate->description}}</td>
					


					<td>
						<div class=" action-buttons">
							<a class="blue" href="{{route('page_update_category',[$cate->id])}}" title="Cập nhật">
								<i class="ace-icon fa fa-pencil bigger-130"></i>
							</a>
							<a class="red" href="{{route('page_del_category',[$cate->id])}}" title="Xóa" onclick="return confirm('bạn có muốn xóa danh mục {{$cate->name}}?');">
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