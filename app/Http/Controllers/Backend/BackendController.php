<?php 
namespace App\Http\Controllers\Backend;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\Customer;
use App\Models\News;
use App\Models\Slide;
use Auth;
/**
 * 
 */
class BackendController extends Controller
{
	
	public function index(){
		$product= Product::all()->count();
		$category= Category::all()->count();
		// dd($category);
		$customer= Customer::all()->count();
		$new= News::all()->count();
		$banner= Slide::all()->count();
		return view('admin.index', compact('product','category','customer','new','banner'));
	}
	public function login(){
		return view('admin.login');
		return redirect()->route('login');
	}
	public function postlogin( Request $req){
		if(Auth::guard('web')->attempt($req->only('email','password') )){
			return redirect()->route('admin');
		}
		else{
			return redirect()->route('postlogin');
		}

	}
	public function logout(){
		Auth::logout();
		return redirect()->route('postlogin');
	}
}
 ?> 