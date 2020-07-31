<?php
namespace App\Http\Controllers\Backend;
use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Customer;
use App\Models\Order;
use App\Models\Order_detail;
use Illuminate\Http\Request;
use DB;
use PDF;
/**
 * 
 */

class OrderController extends Controller
{
	public function listOrder(){
		$order= Order::paginate(15);
		$pro= Product::all();
		$cus= Customer::all();
		return view('admin.order.list_order',[
			'order'=>$order,
			'product'=>$pro,
			'customer'=>$cus
		]);
	}

	public function del($id){
		$order_detail= DB::table('orders')->select('status')->where('id', $id)->first();
// dd($order_detail->status);
		if ($order_detail->status == 2 || $order_detail->status == 3) {
			$del_order_detail= Order_detail::where('id_order',$id)->delete();
			if ($del_order_detail) {
				$del= Order::find($id)->delete();
				if ($del) {
					return redirect()->back()->with('xoathanhcong','xóa thành công đơn hàng');
				}
			}	
		}
		else{
			return redirect()->back()->with('khongxoaduoc','đơn hàng này không xóa được vì vẫn đang trong trạng thái kích hoạt');
		}
	}
	public function edit($id){
		$edt= Order::find($id);
		return view('admin.order.update_order',[
			'edit'=> $edt
		]);

	}
	public function update($id, Request $req){
		$data= Order::find($id);
		$data->update($req->all()); 
		if ($data) {
			return redirect()->route('page_list_order')->with('update','Cập nhật thành công!');
		}
	}

	public function search(Request $req){
		$search_order= Order::where('id',$req->key)->get();
		return view('admin.order.list_search_order', compact('search_order'));
	}

	public function xem_chi_tiet($id){
		$chi_tiet= Order_detail::where('id_order', $id)->get();
		$lay_id_order= Order_detail::where('id_order', $id)->first();
		return view('admin.order.list_orderdetail', compact('chi_tiet','lay_id_order'));
	}

	public function edit_order_detail($id_order){
		$order_detail= Order_detail::where('id_order',$id_order)->get();
		dd($order_detail);
		return view('admin.order.update_order_detail',compact('order_detail'));
	}

	public function in_don_hang($id_order){
		$pdf= \App::make('dompdf.wrapper');
		$pdf->loadHTML($this->print_list($id_order));
		return $pdf->stream();
	}
	
	public function print_list($id_order){
		$chi_tiet_in_ra= Order_detail::where('id_order', $id_order)->get();
		$chi_tiet_in_ra_ten= Order_detail::where('id_order', $id_order)->first();
		// dd($chi_tiet_in_ra_ten);
		$output= '';
		$output.= '
		<header>
			<title>xuất chi tiết đơn hàng</title>
		</header>
		<style>
		body{
			font-family: Dejavu Sans;
		}
		.table-striped{
			border: 1px solid #000;
		}
		.head{
			border: 1px solid #000;
		}
		.tero{
			border: 1px solid #000;
			text-align: center;
		}
		.center{
			text-align: center;
		}
		</style>';

		$output.='
		<h1 class="center">CỬA HÀNG NỘI THẤT NQL</h1>
		<p>chi tiết đơn hàng</p>';
		if($chi_tiet_in_ra_ten->receiver == '')
		$output.='
		<p>tên khách hàng: '.$chi_tiet_in_ra_ten->order->customer->name.'</p>';
		else
		$output.='
		<p>tên khách hàng: '.$chi_tiet_in_ra_ten->receiver.'</p>';
		if($chi_tiet_in_ra_ten->phone_receiver == '')
		$output.='
		<p>số điện thoại khách hàng: '.$chi_tiet_in_ra_ten->order->customer->phone_number.'</p>';
		else
		$output.='
		<p>số điện thoại khách hàng: '.$chi_tiet_in_ra_ten->phone_receiver.'</p>';
		$output.='
		<p>địa chỉ người đặt hàng: '.$chi_tiet_in_ra_ten->order->customer->address.' </p>
		<table class="table table-striped table-bodered">
		<thead class="head">
		<tr>
		<th class="tero hidden">tên sản phẩm</th>
		<th class="tero">giá</th>
		<th class="tero">số lượng</th>
		<th class="tero">trạng thái đơn hàng</th>
		</tr>
		</thead>
		<tbody>';
		foreach ($chi_tiet_in_ra as  $value) {
			$output.='
			<tr>';
			$output.='
			<td class="tero">'.$value->product->name.'</td>
			<td class="tero">'.number_format($value->price).' VND</td>
			<td class="tero">'.$value->quantity.'</td>';

			if ($value->order->status == 0)
				$output.='
			<td class="tero">đặt hàng</td>';
			elseif($value->order->status == 1)
				$output.='
			<td class="tero">đang giao hàng</td>';
			elseif($value->order->status == 2)
				$output.='
			<td class="tero">hủy đơn hàng</td>';
			elseif($value->order->status == 3)
				$output.='
			<td class="tero">đã thanh toán</td>';
			$output.='	

			</tr>';
		}

		$output.='
		</tbody>
		</table>';
		return $output;
	}
}
?> 