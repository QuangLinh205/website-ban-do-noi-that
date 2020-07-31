@extends('admin.master')
@section('title')
<title>Danh sách chi tiết đơn hàng</title>
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
<div class="col-xs-12">
	<div class="clearfix">
		<div class="pull-right tableTools-container"></div>
	</div>
	<div class="table-header">
		Bảng danh sách đơn hàng
		
	</div>
	

	<!-- div.table-responsive -->

	<!-- div.dataTables_borderWrap -->
	<div>
		<table id="dynamic-table" class="table table-striped table-bordered table-hover">
			<thead>
				<tr>
					
					<th class="center">stt</th>
					<th class="center">tên khách</th>
					<th class="center">số điện thoại</th>
					<th class="center">địa chỉ</th>
					<th class="center">id_order</th>
					<th class="center">Tên sản phẩm</th>
					<th class="center">giá</th>
					<th class="center">số lượng</th>
					<th class="center">trạng thái đơn hàng</th>
					<!-- <th></th> -->

					
					
					<!-- <th></th> -->
				</tr>
			</thead>

			<tbody>
				<?php $i=1 ?>
				@foreach($chi_tiet as $od)
				<tr>
					

					<td class="center">{{$i++}}</td>
					@if($od->receiver == '')
					<td class="center">{{$od->order->customer->name}}</td>
					@else
					<td class="center">{{$od->receiver}}</td>
					@endif

					@if($od->phone_receiver == 0)
					<td class="center">{{$od->order->customer->phone_number}}</td>
					@else
					<td class="center">{{$od->phone_receiver}}</td>
					@endif
					<td class="center">{{$od->order->customer->address}}</td>
					<td class="center">{{$od->id_order}}</td>
					<td class="center">{{$od->product->name}}</td>
					<td class="center">{{number_format($od->price)}}</td>
					<td class="center">{{$od->quantity}}</td>
					
					@if($od->order->status == 0)
					<td class="center">đặt hàng</td>
					@elseif($od->order->status == 1)
					<td class="center">đang giao hàng</td>
					@elseif($od->order->status == 2)
					<td class="center">hủy đơn hàng</td>
					@elseif($od->order->status == 3)
					<td class="center">đã thanh toán</td>

					@endif
					<!-- <td>
					<div class=" action-buttons">
						<a class="blue" href="{{route('page_update_order_detail',[$od->id_order])}}" title="Cập nhật">
						<i class="ace-icon fa fa-pencil bigger-130"></i>
						</a>
					</div>
					</td>
 -->
				</tr>
				@endforeach
			</tbody>
		</table>
		<a target="_blank" href="{{route('page_in_don_hang',[$lay_id_order->id_order])}}">xuất</a>
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