<?php
namespace App\Http\Controllers\Backend;
use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Customer;
use App\Models\Order;
use App\Models\Order_detail;
use Illuminate\Http\Request;
/**
 * 
 */

class OrderdetailController extends Controller
{
	public function listOrderdetail(){
		$order_detail= Order_detail::all();
		$order= Order::all();
		$pro= Product::all();
		$cus= Customer::all();
		return view('admin.order-detail.list_orderdetail',[
			'orderdetail'=>$order_detail,
			'order'=>$order,
			'product'=>$pro,
			'customer'=>$cus
		]);
	}
	
}
	?>