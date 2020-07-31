<?php
namespace App\Http\Controllers\Backend;
use App\Http\Controllers\Controller;
use App\Models\Account;//1
use Illuminate\Http\Request;//2
/**
 * 
 */

class UserController extends Controller
{
	public function index(){
		$account= Account::all();
		return view('admin.user.list',[
			'account'=> $account
		]);
	}
	public function create(Request $req){
		$this->validate($req,[
			'name'=>'required',
			'email'=>'required|email',
			'password'=>'required|min:6',
			'confirm_password'=>'required|same:password'

		],[
			'name.required'=>'Tên không được để trống',
			'email.required'=>'Email không được để trống',
			'email.email'=>'Email sai định dạng',
			'password.min'=>'Mật khẩu tối thiểu 6 ký tự',
			'password.required'=>'mật khẩu không được để trống',
			'confirm_password.required'=>'xác nhận mật khẩu không được để trống',
			'confirm_password.same'=>'Mật khẩu không khớp'
		]);
		$pass= bcrypt($req->password);
		$req->merge(['password'=>$pass]);
		$acc= Account::create([
			'name'=>$req->name,
			'email'=>$req->email,
			'password'=>$req->password,
			'confirm_password'=>$req->confirm_password
			
		]);
		if($acc){
			return redirect()->back()->with('themmoithanhcong','thêm mới thành công');
		}
	}
	public function del($id){
		$del=Account::find($id)->delete();
		if ($del) {
			return redirect()->back()->with('del','xóa thành công');
		}
		else{
			return redirect()->back()->with('nodel','xóa thất bại');
		}
	}
	
}
	?>