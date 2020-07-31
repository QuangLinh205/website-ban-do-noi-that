<?php
namespace App\Http\Controllers\Backend;
use App\Http\Controllers\Controller;
use App\Models\Slide;
use Illuminate\Http\Request;
/**
 * 
 */

class SlideController extends Controller
{
	
	public function listSlide(){
		$list= Slide::all();
		return view('admin.slide.list_slide',[
			'slide'=>$list
		]);
	}
	public function addSlide(){
		
		return view('admin.slide.add_slide');
	}
	public function setadd(Request $req){
		$this->validate($req,[
			'name'=>'required | unique:slides',
			'image'=>'required',
			'status'=>'required'
		],[
			'name.required'=>'Tên slide không được để trống',
			'name.unique'=>'Tên sile đã tồn tại',
			'image.required'=>'Ảnh không được để trống',
			'status.required'=>'Trạng thái không được để trống'
		]);
		if ($req->hasFile('image')) {
			$file= $req->image;
			$file_name=$file->getClientOriginalName();
			$file->move(base_path('uploads'),$file_name);
		}
		$slide= Slide::create([
			'name'=>$req->name,
			'image'=>$file_name,
			'status'=>$req->status,
		]);
		if ($slide) {
			return redirect()->route('page_list_slide')->with('themthanhcong','thêm mới thành công');
		}
		else{
			return redirect()->back()->with('er','thêm mới thất bại');
		}
	}

	public function del($id){
		$del=Slide::find($id)->delete();
		if ($del) {
			return redirect()->back()->with('xoathanhcong','xóa thành công banner!');
		}
	}
	public function edit($id){
		$slid= Slide::find($id);
		return view('admin.slide.update_slide',[
			'slide'=>$slid
		]);
	}
	public function update(Request $req,$id){
		
		$moi= Slide::find($id);
		if ($req->hasFile('image')) {
			$file= $req->image;
			$file_name=$file->getClientOriginalName();
			$file->move(base_path('uploads'),$file_name);
		}
		else{
			$file_name=$moi->image;
		}
		$niu= Slide::find($id)->update([
			'name'=>$req->name,
			'image'=>$file_name,
			'status'=>$req->status,
		]);
		if ($niu) {
			return redirect()->route('page_list_slide')->with('capnhatthanhcong','cập nhật thành công');
		}
		else{
			return redirect()->back()->with('er','thêm mới thất bại');
		}
	}
	public function search(Request $req){
		$slide= Slide::where('name','like','%'.$req->key.'%')->get();
		return view('admin.slide.list_search', compact('slide'));
	}
	
}
	?>