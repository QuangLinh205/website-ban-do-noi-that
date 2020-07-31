@extends('admin.master')
@section('title')
<title>Danh sách bình luận</title>
@stop
@section('search')
<!-- <div class="breadcrumbs ace-save-state" id="breadcrumbs">
	

	<div class="nav-search" id="nav-search">
		<form class="form-search" action="{{route('search_category')}}">
			<span class="input-icon" >
				<input type="text" placeholder="Search ..." class="nav-search-input" id="nav-search-input" autocomplete="off" name="key">
				<i class="ace-icon fa fa-search nav-search-icon"></i>
				
			</span>
		</form>
	</div>
</div> -->
@stop
@section('main')
@if(session('del'))
<div class="alert alert-success">
	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
	<strong>{{session('del')}}</strong>
</div>
@endif
<div class="col-xs-12">
	<div class="clearfix">
		
	</div>
	<div class="table-header">
		Bảng danh Bình luận
	</div>


	<!-- div.table-responsive -->

	<!-- div.dataTables_borderWrap -->
	<div>
		<table id="dynamic-table" class="table table-striped table-bordered table-hover">
			<thead>
				<tr>

					<th class="center">stt</th>
					<th class="center">Tên người dùng</th>
					<th class="center">Tên Sản phẩm</th>
					<th class="center">Nội dung</th>

					<th></th>
				</tr>
			</thead>

			<tbody>
				<?php $i=1 ?>
				@foreach($comment as $com )
				<tr>


					<td class="center">{{$i++}}</td>
					<td class="center">{{$com->customer->name}}</td>
					<td class="center">{{$com->product->name}}</td>
					<td>{{$com->content}}</td>


					<td>
						<div class=" action-buttons">
							<a class="red" href="{{route('page_del_binh_luan',[$com->id])}}" title="Xóa" onclick="return confirm('bạn có muốn xóa bình luận của {{$com->customer->name}} về sản phẩm {{$com->product->name}} không?');">
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


@stop