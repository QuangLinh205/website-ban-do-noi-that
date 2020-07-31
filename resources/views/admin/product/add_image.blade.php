@extends('admin.master')
@section('title')
<title>Thêm mới ảnh chi tiết sản phẩm</title>
@stop
@section('main')
<div class="col-xs-5">
	<!-- PAGE CONTENT BEGINS -->
	<form action="{{route('page_add_img1')}}" method="POST" class="form-horizontal" role="form" enctype="multipart/form-data">
		@csrf
		<div class="form-group">
			<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Tên sản phẩm </label>
			<div class="col-sm-9">
				<input type="text" id="form-field-1" placeholder="Nhập tên sản phẩm" class="col-xs-10 col-sm-5" name="name" value="{{$product->name}}" />
				
			</div>
		</div>
		<input type="hidden" name="id_product" value="{{$product->id}}">

		<div class="form-group">
			<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Hình ảnh 1 </label>
			<div class="col-sm-9">
				<div class="form-group">
					<div class="col-xs-12">
						<input multiple="" type="file" id="id-input-file-3" name="image_1" />
						@if($errors->has('image_1'))
				<div class="help-block">
					{{$errors->first('image_1')}}
				</div>
				@endif
					</div>
				</div>
			</div>
		</div>
		<div class="form-group">
			<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Hình ảnh 2 </label>
			<div class="col-sm-9">
				<div class="form-group">
					<div class="col-xs-12">
						<input multiple="" type="file" id="id-input-file-3" name="image_2" />
						@if($errors->has('image_2'))
				<div class="help-block">
					{{$errors->first('image_2')}}
				</div>
				@endif
					</div>
				</div>
			</div>
		</div>

		<div class="form-group">
			<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Hình ảnh 3 </label>
			<div class="col-sm-9">
				<div class="form-group">
					<div class="col-xs-12">
						<input multiple="" type="file" id="id-input-file-3" name="image_3" />
						@if($errors->has('image_3'))
				<div class="help-block">
					{{$errors->first('image_3')}}
				</div>
				@endif
					</div>
				</div>
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
<div class="col-xs-7">
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
														<th>ảnh 1</th>
														<th>ảnh 2</th>
														<th>ảnh 3</th>

														<th></th>
													</tr>
												</thead>

												<tbody>
													<?php $i=1 ?>
													@foreach($hihi as $ac)
													<tr>
														

														<td>
															{{$i++}}
														</td>
														<td>{{$ac->product->name}}</td>
														<td class="hidden-480">
															<img src="{{url('/')}}/uploads/{{$ac->image_1}}" alt="" width="100px">
														</td>
														<td class="hidden-480">
															<img src="{{url('/')}}/uploads/{{$ac->image_2}}" alt="" width="100px">
														</td>
														<td class="hidden-480">
															<img src="{{url('/')}}/uploads/{{$ac->image_3}}" alt="" width="100px">
														</td>
													
														<td>
															<div class=" action-buttons">
												
																<a class="red" href="{{route('page_del_img',[$ac->id])}}" onclick="return confirm('bạn có muốn xóa chi tiết ảnh?');" title="xóa">
																	<i class="ace-icon fa fa-trash-o bigger-130"></i>
																</a>

																<a class="red" href="{{route('page_update_product_detail',[$ac->id])}}" title="cập nhật">
																	<i class="ace-icon fa fa-pencil bigger-130"></i>
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
</div>
@stop