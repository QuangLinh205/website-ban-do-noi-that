<?php
namespace App\Http\Controllers\Backend;
use App\Http\Controllers\Controller;
use App\Models\News;
use Illuminate\Http\Request;
/**
 * 
 */

class NewController extends Controller
{
	
	public function getList(){
		$list= News::all();
		return view('admin.new.list_new',[
			'new'=>$list
		]);
	}

	public function add(){
		return view('admin.new.add_new');
	}

	public function setadd(Request $req){
		$this->validate($req,[
			'title'=>'required|max:255',
			'image'=>'required',
			'status'=>'required',
			'main_content'=>'required'

		],[
			'title.required'=>'tiêu đề không được để trống',
			'title.max'=>'tiêu đề không quá 255 ký tự',
			'image.required'=>'ảnh không được để trống',
			'status.required'=>'ảnh không được để trống',
			'main_content.required'=>'ảnh không được để trống'
		]);
		if ($req->hasFile('image')) {
			$file= $req->image;
			$file_name=$file->getClientOriginalName();
			$file->move(base_path('uploads'),$file_name);
		}
		$niu= News::create([
			'title'=>$req->title,
			'image'=>$file_name,
			'status'=>$req->status,
			'main_content'=>$req->main_content
		]);
		if ($niu) {
			return redirect()->route('page_list_new')->with('themthanhcong','thêm mới thành công');
		}
		else{
			return redirect()->back()->with('er','thêm mới thất bại');
		}
	}

	public function del($id){
		$del=News::find($id)->delete();
		if ($del) {
			return redirect()->back()->with('xoathanhcong','xóa thành công tin tức!');
		}
	}

	public function edit($id){
		$edit=News::find($id);
		return view('admin.new.update_new',[
			'new1'=>$edit
		]);
	}

	public function update(Request $req,$id){
		$this->validate($req,[
			'title'=>'required|max:255',
			'image'=>'required',
			'status'=>'required',
			'main_content'=>'required'

		],[
			'title.required'=>'tiêu đề không được để trống',
			'title.max'=>'tiêu đề không quá 255 ký tự',
			'image.required'=>'ảnh không được để trống',
			'status.required'=>'ảnh không được để trống',
			'main_content.required'=>'ảnh không được để trống'
		]);
		$moi= News::find($id);
		if ($req->hasFile('image')) {
			$file= $req->image;
			$file_name=$file->getClientOriginalName();
			$file->move(base_path('uploads'),$file_name);
		}
		else{
			$file_name=$moi->image;
		}
		$niu= News::find($id)->update([
			'title'=>$req->title,
			'image'=>$file_name,
			'status'=>$req->status,
			'main_content'=>$req->main_content

		]);
		if ($niu) {
			return redirect()->route('page_list_new')->with('capnhatthanhcoong','cập nhật thành công');
		}
		else{
			return redirect()->back()->with('er','thêm mới thất bại');
		}
	}

	public function search(Request $req){
		$new= News::where('title','like','%'.$req->key.'%')->get();
		return view('admin.new.list_search', compact('new'));
	}

	
	
}
	?>