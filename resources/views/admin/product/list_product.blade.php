@extends('admin.master')
@section('title')
<title>Danh sách sản phẩm</title>
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
							<form class="form-search" action="{{route('search_product')}}">
								<span class="input-icon" >
									<input type="text" placeholder="Search ..." class="nav-search-input" id="nav-search-input" autocomplete="off" name="key">
									<i class="ace-icon fa fa-search nav-search-icon"></i>
									
								</span>
							</form>
						</div><!-- /.nav-search -->
					</div>
@stop
@section('main')
<div class="col-xs-12">
	@if(session('se'))
	<div class="alert alert-success">
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
		<strong>{{session('se')}}</strong> 
	</div>
	@endif
	@if(session('khongxoaduoc'))
	<div class="alert alert-danger">
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
		<strong>{{session('khongxoaduoc')}}</strong> 
	</div>
	@endif
	@if(session('xoathanhcong'))
	<div class="alert alert-success">
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
		<strong>{{session('xoathanhcong')}}</strong> 
	</div>
	@endif

	<div class="clearfix">
		<div class="pull-right tableTools-container"></div>
	</div>
	<div class="table-header">
		Bảng danh sách sản phẩm
		<button class="pull-right btn-light"> <a href="{{route('page_add_product')}}"> Thêm mới</a></button>
	</div>

	<!-- div.table-responsive -->

	<!-- div.dataTables_borderWrap -->
	<div>
		<table id="dynamic-table" class="table table-striped table-bordered table-hover">
			<thead>
				<tr>
					<th class="center">stt</th>
					<th class="center">Tên sản phẩm</th>
					<th class="center">Số lượng</th>
					<th class="center">Giá</th>
					<th class="center">Phần trăng giảm giá</th>
					<th class="center">Mô tả</th>
					<th class="center">Ảnh</th>
					<th class="center">Trạng thái</th>
					<th class="center">Tên danh mục</th>

					<th></th>
				</tr>
			</thead>

			<tbody>
				<?php $i=1 ?>
				@foreach($product as $pro)
				<tr>

					<td class="center">{{$i++}}</td>
					<td class="center">{{$pro->name}}</td>
					<td class="center">{{$pro->quantity}}</td>
					<td class="center">{{number_format($pro->price)}}</td>
					<td class="center">{{$pro->sale_price}}%</td>
					<td>{{$pro->description}}</td>
					<td><img src="{{url('/')}}/uploads/{{$pro->image}}" alt="" width="75px"></td>

					@if($pro->status==0)
					<td class="center">Ẩn</td>
					@else
					<td class="center">Hiện</td>
					@endif

					<td class="center">{{$pro->categories->name}}</td>


					<td>
						<div class=" action-buttons">
							<a class="green" href="{{route('page_update_product',[$pro->id])}}"
								title="Cập nhật">
								<i class="ace-icon fa fa-pencil bigger-130"></i>
							</a>

							<a class="red" href="{{route('page_del_product',[$pro->id])}}" onclick="return confirm('bạn có muốn xóa sảm phẩm {{$pro->name}}?');" title="Xóa">
								<i class="ace-icon fa fa-trash-o bigger-130"></i>
							</a>

							<a class="green" href="{{route('page_add_img',[$pro->id])}}"
								title="Cập nhật">
								<i class="ace-icon fa fa-group bigger-130"></i>
							</a>
						</div>

					</td>
				</tr>
				@endforeach

			</tbody>
		</table>
		{{$product->links()}}
	</div>
</div>
</div>



<!-- PAGE CONTENT ENDS -->
</div><!-- /.col -->
</div><!-- /.row -->
</div><!-- /.page-content -->
</div>
</div><!-- /.main-content -->

<div class="footer">
	<div class="footer-inner">
		<div class="footer-content">
			<span class="bigger-120">
				<span class="blue bolder">Ace</span>
				Application &copy; 2013-2014
			</span>

			&nbsp; &nbsp;
			<span class="action-buttons">
				<a href="#">
					<i class="ace-icon fa fa-twitter-square light-blue bigger-150"></i>
				</a>

				<a href="#">
					<i class="ace-icon fa fa-facebook-square text-primary bigger-150"></i>
				</a>

				<a href="#">
					<i class="ace-icon fa fa-rss-square orange bigger-150"></i>
				</a>
			</span>
		</div>
	</div>
</div>

<a href="#" id="btn-scroll-up" class="btn-scroll-up btn btn-sm btn-inverse">
	<i class="ace-icon fa fa-angle-double-up icon-only bigger-110"></i>
</a>
</div>
@stop