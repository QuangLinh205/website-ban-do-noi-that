<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title></title>
	<link rel="stylesheet" href="">
</head>
<body>
	<h1>THƯ THÔNG BÁO</h1>
	<p>Bạn đã đặt hàng thành công</p>
	<table>
		
		<tr>
			<td>STT</td>
			<td>Tên sản phẩm</td>
			<td>Giá sản phẩm</td>
			<td>Số lượng</td>
			<td>Thành tiền</td>
		</tr>
		<?php $i=1 ?>
		@foreach($cart->items as $cc)
		<tr>
			<td>{{$i++}}</td>
			<td>{{$cc['name']}}</td>
			<td>{{number_format($cc['price'])}} VND</td>
			<td>{{$cc['quantity']}}</td>
			<td>{{number_format($cc['quantity'] * $cc['price'])}} VND</td>
		</tr>
		@endforeach
	</table>
	<p>vui lòng xác nhận đơn hàng lại cho chúng thôi</p>
	

	
</body>
</html>