@extends('admin.master')
@section('title')
<title>Danh sách khách hàng</title>
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
							<form class="form-search" action="{{route('search_customer')}}">
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
	@if(session('add'))
	<div class="alert alert-success">
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
		<strong>{{session('add')}}</strong> 
	</div>
	@endif
	@if(session('del'))
	<div class="alert alert-success">
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
		<strong>{{session('del')}}</strong> 
	</div>
	@endif
	@if(session('nodel'))
	<div class="alert alert-warning">
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
		<strong>{{session('nodel')}}</strong> 
	</div>
	@endif
	@if(session('update'))
	<div class="alert alert-success">
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
		<strong>{{session('update')}}</strong> 
	</div>
	@endif


	<div class="clearfix">
		<div class="pull-right tableTools-container"></div>
	</div>
	<div class="table-header">
		Bảng danh sách khách hàng
	</div>


	<div>
		<table id="dynamic-table" class="table table-striped table-bordered table-hover">
			<thead>
				<tr>

					<th>stt</th>
					<th>Tên khách hàng</th>
					<th>email</th>
					<th>Số điện thoại</th>
					<th>Địa chỉ</th>
					<th></th>

				</tr>
			</thead>

			<tbody><?php $i=1 ?>
			@foreach($customer as $cus)
			<tr>


				<td>{{$i++}}</td>
				<td>{{$cus->name}}</td>
				<td class="hidden-480">{{$cus->email}}</td>
				<td class="hidden-480">{{$cus->phone_number}}</td>
				<td class="hidden-480">{{$cus->address}}</td>


				
				<td>
					<a class="red" href="{{route('page_del_customer',[$cus->id])}}" title="Xóa" onclick="return confirm('bạn có muốn xóa khách hàng này không?');">
						<i class="ace-icon fa fa-trash-o bigger-130"></i>
					</a>
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