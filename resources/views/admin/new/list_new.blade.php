@extends('admin.master')
@section('title')
<title>Danh sách tin tức</title>
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
							<form class="form-search" action="{{route('search_new')}}">
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
	@if(session('xoathanhcong'))
	<div class="alert alert-success">
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
		<strong>{{session('xoathanhcong')}}</strong> 
	</div>
	@endif
	@if(session('themthanhcong'))
	<div class="alert alert-success">
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
		<strong>{{session('themthanhcong')}}</strong> 
	</div>
	@endif
	@if(session('capnhatthanhcoong'))
	<div class="alert alert-success">
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
		<strong>{{session('capnhatthanhcoong')}}</strong> 
	</div>
	@endif
										

										<div class="clearfix">
											<div class="pull-right tableTools-container"></div>
										</div>
										<div class="table-header">
											Bảng danh sách tin tức
											<button class="pull-right btn-light"> <a href="{{route('page_add_new')}}"> Thêm mới</a></button>
										</div>

										<!-- div.table-responsive -->

										<!-- div.dataTables_borderWrap -->
										<div>
											<table id="dynamic-table" class="table table-striped table-bordered table-hover">
												<thead>
													<tr>
														
														<th class="center">Stt</th>
														<th class="center">Tiêu đề</th>
														<th class="center">Ảnh</th>
														<th class="center">Trạng thái</th>
														<th class="center">Nội dung</th>

														<th></th>
													</tr>
												</thead>

												<tbody>
													<?php $i=1 ?>
													@foreach($new as $newss)
													<tr>
														

														<td class="center">
															{{$i++}}
														</td>
														<td>{{$newss->title}}</td>
														<td><img src="{{url('/')}}/uploads/{{$newss->image}}" alt="" width="75px"></td>
														@if($newss->status==0)
														<td class="center">Ẩn</td>
														@else
														<td class="center">Hiện</td>
														@endif
														<td>{{$newss->main_content}}</td>

														<td>
															<div class=" action-buttons">
																
																<a class="blue" href="{{route('page_update_new',[$newss->id])}}" title="cập nhật">
																	<i class="ace-icon fa fa-pencil bigger-130"></i>
																</a>
																<a class="red" href="{{route('page_del_new',[$newss->id])}}" title="xóa" onclick="return confirm('bạn có muốn xóa danh mục {{$newss->title}} không?')">
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