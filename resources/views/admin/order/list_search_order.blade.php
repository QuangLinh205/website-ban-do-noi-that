@extends('admin.master')
@section('title')
<title>Danh sách đơn hàng</title>
@stop
@section('search')
<div class="breadcrumbs ace-save-state" id="breadcrumbs">
						

						<div class="nav-search" id="nav-search">
							<form class="form-search" action="{{route('page_search_order')}}">
								<span class="input-icon" >
									<input type="text" placeholder="Search ..." class="nav-search-input" id="nav-search-input" autocomplete="off" name="key">
									<i class="ace-icon fa fa-search nav-search-icon"></i>
									
								</span>
							</form>
						</div><!-- /.nav-search -->
					</div>
@stop
@section('main')
@if(session('update'))
<div class="alert alert-success">
	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
	<strong>{{session('update')}}</strong>
</div>
@endif
@if(session('xoathanhcong'))
<div class="alert alert-success">
	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
	<strong>{{session('xoathanhcong')}}</strong>
</div>
@endif
@if(session('khongxoaduoc'))
<div class="alert alert-success">
	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
	<strong>{{session('khongxoaduoc')}}</strong>
</div>
@endif
<div class="col-xs-12">
										<div class="clearfix">
											<div class="pull-right tableTools-container">
											</div>
										</div>
										<div class="table-header">
											Bảng danh sách đơn hàng

										</div>
										<div>
											<table id="dynamic-table" class="table table-striped table-bordered table-hover">
												<thead>
													<tr>
														
														<th class="center">Stt</th>
														<th class="center">Mã đơn hàng</th>
														<th class="center">Tên khách hàng</th>
														<th class="center">trạng thái đơn hàng</th>
														
														<th></th>
													</tr>
												</thead>

												<tbody>
													<?php $i=1 ?>
													@foreach($search_order as $od)
													<tr>
														

														<td class="center">{{$i++}}</td>
														<td class="center">{{$od->id}}</td>
														<td class="center">{{$od->customer->name}}</td>
														
														@if($od->status == 0)
														<td class="center">đặt hàng</td>
														@elseif($od->status == 1)
														<td class="center">đang giao hàng</td>
														@elseif($od->status == 2)
														<td class="center">hủy đơn hàng</td>
														@elseif($od->status == 3)
														<td class="center">đã thanh toán</td>
														@endif
														

														<td>
															<div class=" action-buttons">
																<a class="blue" href="{{route('page_update_order',[$od->id])}}" title="Cập nhật">
																	<i class="ace-icon fa fa-pencil bigger-130"></i>
																</a>
																<a class="red" href="{{route('page_del_order',[$od->id])}}" title="Xóa" onclick="return confirm('bạn có muốn xóa order {{$od->name}}?');">
																	<i class="ace-icon fa fa-trash-o bigger-130"></i>
																</a>
																<a class="blue" href="{{route('page_xem_chi_tiet_order',[$od->id])}}" title="xem chi tiết">
																	<i class="ace-icon fa fa-ticket bigger-130"></i>
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