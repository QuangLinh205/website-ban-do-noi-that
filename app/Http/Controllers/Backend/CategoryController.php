<?php
namespace App\Http\Controllers\Backend;
use App\Http\Controllers\Controller;
use App\Models\Category;//1
use App\Models\Product;//1
use Illuminate\Http\Request;//2
use DB;
/**
 * 
 */

class CategoryController extends Controller
{
	
	// public function __construct(){
	// 	$this->middleware('auth');
	// }
	public function getList(){
		$category= Category::All();//1

		/*Category::all(); la lay tat*/
		return view('admin.category.list_category',[
			'categories1'=> $category // 'categories1' là biến được gán giá trị bằng $category để gửi sang list_category.blade.php
		]);
	}
	public function add(){
		
		return view('admin.category.add_category');
		// $data= Category::create($req->all());
		// if ($data) {
		// 	return redirect()->back();
		// }
	}
	public function setadd(Request $req){
		$this->validate($req,[
			'name'=>'required | unique:categories',//categories ten trong co so du lieu
			'status'=>'required',
			'description'=>'required | max:255'
		],[
			'name.required'=>'Vui lòng nhập tên danh mục',
			'name.unique'=>'Tên đã tồn tại',
			'status.required'=>'Trạng thái không được để trống',
			'description.required'=>'Mô tả không được để trống',
			'description.max'=>'Mô tả không quá 255 ký tự'
		]);
		$data= Category::create($req->all());
		if ($data) {
			return redirect()->route('page_list_category');
		}
	}
	public function del($id){
		$pro= DB::table('products')->select('id_category')->where('id_category', $id)->first();
		if(is_null($pro)){
			$del=Category::find($id)->delete();

			if ($del) {
				return redirect()->back()->with('del','Xóa thành công!');
			}
		}
		else{
			return redirect()->back()->with('khongxoaduoc','danh mục này không xóa được!');
			
		}

	}
	public function edit($id){
		$update= Category::find($id);
		return view('admin.category.update_category',[
			'categories'=>$update
		]);
	}
	public function update(Request $req,$id){
		$this->validate($req,[
			'name'=>'required',// categories ten trong co so du lieu
			'status'=>'required',
			'description'=>'required | max:255'
		],[
			'name.required'=>'Vui lòng nhập tên danh mục',
			'status.required'=>'Trạng thái không được để trống',
			'description.required'=>'Mô tả không được để trống',
			'description.max'=>'Mô tả không quá 255 ký tự'
		]);
		$data= Category::find($id);
		$data->update($req->all()); 
		if ($data) {
			return redirect()->route('page_list_category')->with('update','Cập nhật thành công!');
		}

	}
	public function search(Request $req){
		$cate= Category::where('name','like','%'.$req->key.'%')->get();
		return view('admin.category.list_search',compact('cate'));
	}
}
	?>