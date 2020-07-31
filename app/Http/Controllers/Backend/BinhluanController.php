<?php
namespace App\Http\Controllers\Backend;
use App\Http\Controllers\Controller;
use App\Models\Category;//1
use App\Models\Comment;//1
use App\Models\Rating_star;//1
use Illuminate\Http\Request;//2
/**
 * 
 */

class BinhluanController extends Controller
{
	public function list(){
		$comment = Comment::all();
		$danhgia = Rating_star::all();
		return view('admin.danhgia.list_binhluan',compact('danhgia','comment'));
	}
	public function del($id){
		$del = Comment::find($id)->delete();
		if($del){
			return redirect()->route('page_list_binh_luan')->with('del', 'Xóa thành công bình luận');
		}
	}
	public function list_rating(){
		$danhgia = Rating_star::all();
		return view('admin.danhgia.list_danhgia',compact('danhgia'));
	}
	public function del_rating($id){
		$del = Rating_star::find($id)->delete();
		if($del){
			return redirect()->route('page_list_danh_gia')->with('del', 'Xóa thành công bình luận');
		}
	}

}
	?>