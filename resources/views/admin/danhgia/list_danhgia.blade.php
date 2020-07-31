@extends('admin.master')
@section('title')
<title>danh sách đánh giá</title>
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
					<th class="center">Số sao</th>

					<th></th>
				</tr>
			</thead>

			<tbody>
				<?php $i=1 ?>
				@foreach($danhgia as $dg )
				<tr>


					<td class="center">{{$i++}}</td>
					<td class="center">{{$dg->customer->name}}</td>
					<td class="center">{{$dg->product->name}}</td>
					<td>{{$dg->content_rating}}</td>
					<td>{{$dg->rating_star}}</td>


					<td>
						<div class=" action-buttons">
							<a class="red" href="{{route('page_del_danh_gia',[$dg->id])}}" title="Xóa" onclick="return confirm('bạn có muốn xóa đánh giá của về sản phẩm {{$dg->product->name}} không?');">
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