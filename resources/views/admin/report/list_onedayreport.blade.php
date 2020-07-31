@extends('admin.master')
@section('title')
<title>báo cáo</title>
@stop
@section('main')

<div>
	<table id="dynamic-table" class="table table-striped table-bordered table-hover">
		<thead>
			<tr>
				<th>stt</th>
				<th>Tên sản phẩm</th>
				<th>Số lượng sản phẩm</th>
				<th>Giá tiền</th>
				<th>mã đơn hàng</th>
			</tr>
		</thead>

		<tbody>
			<?php $i=1 ?>
			@foreach($order_detail as $value)
			<tr>
				<td>{{$i++}}</td>

				@foreach($product as $pro)
				@if($pro->id == $value->id_product)
				<td>{{$pro->name}}</td>
				@endif
				@endforeach
				<td>{{$value->quantity}}</td>

				<td>{{number_format($value->price)}} VND</td>
				<td>{{$value->id_order}}</td>

			</tr>
			
			@endforeach

			
			<tr>
				<td></td>
				<td></td>
				<td></td>
				<?php $sum=0 ;?>
				@foreach($order_detail as $value)
				<span class="hidden"> {{$sum += $value->price}}</span>
				@endforeach
				<td>Tổng tiền: {{number_format($sum)}} VND</td>
			</tr>
		</tbody>
	</table>
				<a target="_blank" href="{{route('xuatReportoneday',[$lay_created_at->created_at])}}"> xuất</a>
		
				
</div>
@stop