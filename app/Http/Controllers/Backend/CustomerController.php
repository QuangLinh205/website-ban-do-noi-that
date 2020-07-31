<?php
namespace App\Http\Controllers\Backend;
use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Models\Order;
use Illuminate\Http\Request;
use DB;
/**
 * 
 */

class CustomerController extends Controller
{
	public function getList(){
		$data=Customer::all();
		return view('admin.customer.list_customer',[
			'customer'=>$data
		]);
	}

	public function add(){
		return view('admin.customer.add_customer');
	}
	public function setadd(Request $req){
		$cus= Customer::create([
			'name'=>$req->name,
			'email'=>$req->email,
			'phone_number'=>$req->phone_number,
			'address'=>$req->address,
			'gender'=>$req->gender,
			'status'=>$req->status,
		]);
		if ($cus) {
			return redirect()->route('page_list_customer')->with('add','thêm thành công');
		}
		else{
			return redirect()->back()->with('noadd','thêm mới thất bại');
		}
	}
	public function del($id){
		$order= DB::table('orders')->select('id_customer')->where('id_customer',$id)->first();
		if (is_null($order)) {
			$del=Customer::find($id)->delete();
			if ($del) {
				return redirect()->route('page_list_customer')->with('del','xóa thành công');
			}
		}
		else{
			return redirect()->back()->with('nodel','không thể xóa khách hàng này!');
		}
	}
	public function edit($id){
		$editcus= Customer::find($id);
		return view('admin.customer.update_customer',[
			'editcus'=>$editcus
		]);
	}
	public function update(Request $req,$id){
		
		$custo= Customer::find($id)->update($req->all());
		if ($custo) {
			return redirect()->route('page_list_customer')->with('update','cập nhật thành công');
		}
		else{
			return redirect()->back()->with('noupdate','cập nhật thất bại');
		}
	}
	public function search(Request $req){
		$search= Customer::where('name','like','%'.$req->key.'%')->get();
		return view('admin.customer.list_search_customer',compact('search'));
	}



	
	
	
}
?>