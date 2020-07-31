<?php
namespace App\Http\Controllers\Backend;
use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Category;
use App\Models\Product_detail;
use App\Models\Order_detail;
use App\Models\Comment;
use App\Models\Rating_star;
use Illuminate\Http\Request;
use DB;
/**
 * 
 */

class ProductController extends Controller
{
	
	public function listpro(){
		$list= Product::paginate(15);
		$catego= Category::all();
		return view('admin.product.list_product',[
			'product'=>$list,
			'category'=>$catego
		]);
	}
	public function add(){
		$cate= Category::all();
		return view('admin.product.add_product',[
			'category'=>$cate
		]);
	}
	public function setadd(Request $req){
		$this->validate($req,[
			'name'=> 'required | unique:products',
			'quantity'=>'required | integer',
			'price'=>'required | integer',
			'sale_price'=> 'required | integer | max:100',
			'description'=>'max:255',
			'image'=> 'required | image',
			'status'=>'required'
		],[
			'name.required'=>'Tên sản phẩm không được để trống',
			'name.unique'=> 'Tên sản phẩm đã tồn tại',
			'quantity.required'=>'Số lượng sản phẩm không được để trống',
			'quantity.integer'=>'Số lượng sản phẩm phải là kiểu số',
			'price.required'=>'Giá sản phẩm không được để trống',
			'price.integer'=>'Giá sản phẩm phải là kiểu số',
			'sale_price.required'=> 'Phần trăm giảm giá không được để trống',
			'sale_price.integer'=> 'Phần trăm giảm giá phải là kiểu số',
			'sale_price.max'=> 'Phần trăm giảm không quá 100%',
			'image.image'=> 'Ảnh sản phẩm phải là kiểu ảnh',
			'image.required'=> 'Ảnh sản phẩm không được để trống',
			'status.required'=> 'Trạng thái không được để trống'
		]);
		if ($req->hasFile('image')) {
			$file= $req->image;
			$file_name=$file->getClientOriginalName();
			$file->move(base_path('uploads'),$file_name);
		}
		$prod= Product::create([
			'name'=>$req->name,
			'quantity'=>$req->quantity,
			'price'=>$req->price,
			'sale_price'=>$req->sale_price,
			'description'=>$req->description,
			'image'=>$file_name,
			'status'=>$req->status,
			'id_category'=>$req->id_category

		]);
		if ($prod) {
			return redirect()->route('page_list_product')->with('se','thêm mới thành công');
		}
		else{
			return redirect()->back()->with('er','thêm mới thất bại');
		}
	}



	public function del($id){
		$order_detail= DB::table('order_detail1')->select('id_product')->where('id_product', $id)->first();
		if (is_null($order_detail)) {

					$del=Product::find($id)->delete();
					if ($del) {
						return redirect()->back()->with('xoathanhcong','xóa thành công sản phẩm');
					}
			
		}
		else{
			return redirect()->back()->with('khongxoaduoc','sản phẩm này không thể xóa!');
		}
		
	}
	public function edit($id){
		$cate=Category::all();
		$edit=Product::find($id);
		return view('admin.product.update_product',[
			'product'=>$edit,
			'category'=>$cate
		]);
	}
	public function update(Request $req,$id){
		$this->validate($req,[
			'name'=> 'required',
			'quantity'=>'required | integer',
			'price'=>'required | integer',
			'sale_price'=> 'required | integer | max:100',
			'description'=>'max:255',
			'status'=>'required'
		],[
			'name.required'=>'Tên sản phẩm không được để trống',
			'quantity.required'=>'Số lượng sản phẩm không được để trống',
			'quantity.integer'=>'Số lượng sản phẩm phải là kiểu số',
			'price.required'=>'Giá sản phẩm không được để trống',
			'price.integer'=>'Giá sản phẩm phải là kiểu số',
			'sale_price.required'=> 'Phần trăm giảm giá không được để trống',
			'sale_price.integer'=> 'Phần trăm giảm giá phải là kiểu số',
			'sale_price.max'=> 'Phần trăm giảm không quá 100%',
			'description.max'=> 'Mô tả không quá 255 ký tự',
			'status.required'=> 'Trạng thái không được để trống'
		]);
		$moi= Product::find($id);
		if ($req->hasFile('image')) {
			$file= $req->image;
			$file_name=$file->getClientOriginalName();
			$file->move(base_path('uploads'),$file_name);
		}
		else{
			$file_name=$moi->image;
		}
		$niu= Product::find($id)->update([
			'name'=>$req->name,
			'quantity'=>$req->quantity,
			'price'=>$req->price,
			'sale_price'=>$req->sale_price,
			'description'=>$req->description,
			'image'=>$file_name,
			'status'=>$req->status,
			'id_category'=>$req->id_category1
		]);
		if ($niu) {
			return redirect()->route('page_list_product')->with('se','cập nhật thành công');
		}
		else{
			return redirect()->back()->with('er','thêm mới thất bại');
		}
	}

	public function search(Request $req){
		$product= Product::where('name','like','%'.$req->key.'%')->get();
		return view('admin.product.list_search', compact('product'));
	}

	public function add_image($id){
		$product= Product::find($id);
		$hihi= Product_detail::all();
		return view('admin.product.add_image', compact('product','hihi'));
	}

	public function them_anh(Request $req){
		$this->validate($req,[
			'image_1'=>'required|max:255',
			'image_2'=>'required',
			'image_3'=>'required'

		],[
			'image_1.required'=>'ảnh 1 không được để trống',
			'image_2.required'=>'ảnh 2 không được để trống',
			'image_3.required'=>'ảnh 3 không được để trống'
			
		]);
		$hihi= Product_detail::all();
		if ($req->hasFile('image_1')) {
			$file_1= $req->image_1;
			$file_name_1=$file_1->getClientOriginalName();
			$file_1->move(base_path('uploads'),$file_name_1);
		}
		if ($req->hasFile('image_2')) {
			$file_2= $req->image_2;
			$file_name_2=$file_2->getClientOriginalName();
			$file_2->move(base_path('uploads'),$file_name_2);
		}
		if ($req->hasFile('image_3')) {
			$file_3= $req->image_3;
			$file_name_3=$file_3->getClientOriginalName();
			$file_3->move(base_path('uploads'),$file_name_3);
		}
		$prod= Product_detail::create([
			'id_product'=>$req->id_product,
			'image_1'=>$file_name_1,
			'image_2'=>$file_name_2,
			'image_3'=>$file_name_3	
		]);
		if ($prod) {
			return redirect()->back()->with('se','cập nhật thành công');
		}
		else{
			return redirect()->back()->with('er','thêm mới thất bại');
		}
	}

	public function del_img($id){
		$del_img= Product_detail::find($id)->delete();
		if ($del_img) {
			return redirect()->back()->with('del','xóa thành công');
		}
		else{
			return redirect()->back()->with('er','xóa thất bại');
		}
	}

	public function edit_detail($id){
		$edit= Product_detail::find($id);
		return view('admin.product.update_product_detail', compact('edit'));
	}

	public function update_detail(Request $req, $id){
		$moi= Product_detail::find($id);
		if ($req->hasFile('image_1')) {
			$file_1= $req->image_1;
			$file_name_1=$file_1->getClientOriginalName();
			$file_1->move(base_path('uploads'),$file_name_1);
		}
		else{
			$file_name_1=$moi->image_1;
		}
		if ($req->hasFile('image_2')) {
			$file_2= $req->image_2;
			$file_name_2=$file_2->getClientOriginalName();
			$file_2->move(base_path('uploads'),$file_name_2);
		}
		else{
			$file_name_2=$moi->image_2;
		}
		if ($req->hasFile('image_3')) {
			$file_3= $req->image_3;
			$file_name_3=$file_3->getClientOriginalName();
			$file_3->move(base_path('uploads'),$file_name_3);
		}
		else{
			$file_name_3=$moi->image_3;
		}
		$prod= Product_detail::find($id)->update([
			'image_1'=>$file_name_1,
			'image_2'=>$file_name_2,
			'image_3'=>$file_name_3	
		]);
		if ($prod) {
			return redirect()->back()->with('se','cập nhật thành công');
		}
		else{
			return redirect()->back()->with('er','thêm mới thất bại');
		}
	}

	
	
}
?>