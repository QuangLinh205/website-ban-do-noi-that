<?php
namespace App\Http\Controllers\Backend;
use App\Http\Controllers\Controller;
use App\Models\Category;//1
use App\Models\Product;//1
use App\Models\Order_detail;//1
use Illuminate\Http\Request;//2
use DB;
use Carbon\Carbon;
use DateTime;
use PDF;
/**
 * 
 */

class ReportController extends Controller
{
	public function getReport( Request $req){
		return view('admin.report.report');
	}

	public function onedayReport( Request $req, Carbon $carbon){
		$this->validate($req,[
			'key'=> 'required',

		],[
			'key.required'=>'bạn chưa chọn ngày!',

		]);
		$product= Product::all();
		$order_detail = DB::table('order_detail1')->select('price', 'id_product','quantity','id_order')
				->where('created_at','>=',Carbon::parse($req->key)->startOfDay()) // đầu ngày
				->where('created_at','<=',Carbon::parse($req->key)->endOfDay()) //cuối ngày
				->get();
		$lay_created_at = DB::table('order_detail1')->select('created_at')
				->where('created_at','>=',Carbon::parse($req->key)->startOfDay()) // đầu ngày
				->where('created_at','<=',Carbon::parse($req->key)->endOfDay()) //cuối ngày
				->first();
				// dd($lay_created_at);
				return view('admin.report.list_onedayreport',compact('order_detail','product','lay_created_at'));

			}

	public function manydayReport( Request $req, Carbon $carbon){
		$this->validate($req,[
            'key_1'=> 'required',
            'key_2'=> 'required'
            
        ],[
            'key_1.required'=>'bạn chưa chọn ngày!',
            'key_2.required'=>'bạn chưa chọn ngày!'
            
        ]);
		$product= Product::all();
		$order_detail = DB::table('order_detail1')->select('price', 'id_product','quantity','id_order')
		->where('created_at','>=',Carbon::parse($req->key_1)->startOfDay())
		->where('created_at','<=',Carbon::parse($req->key_2)->endOfDay())->get();

		$lay_created_at_1 = DB::table('order_detail1')->select('created_at')
		->where('created_at','>=',Carbon::parse($req->key_1)->startOfDay())->first();
		$lay_created_at_2 = DB::table('order_detail1')->select('created_at')
		->where('created_at','<=',Carbon::parse($req->key_2)->endOfDay())->orderBy('created_at','DESC')->first();
		// dd($lay_created_at_2->created_at);


		return view('admin.report.list_manydayreport',compact('order_detail','product','lay_created_at_1','lay_created_at_2'));
	}


	public function xuatReportoneday($created_at){
		$pdf= \App::make('dompdf.wrapper');
		$pdf->loadHTML($this->print_list($created_at));
		return $pdf->stream();
	}
	public function print_list($created_at){
		$in_ra_bao_cao = Order_detail::where('created_at','>=',Carbon::parse($created_at)->startOfDay()) // đầu ngày
				->where('created_at','<=',Carbon::parse($created_at)->endOfDay()) //cuối ngày
				->get();
		$output= '';
		$output.= '
		<header>
			<title>xuất báo cáo 1 ngày</title>
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
		}
		.center{
			text-align: center
		}
		</style>
		<h1 class="center">CỬA HÀNG NỘI THẤT NQL</h1>
		<p>báo cáo số sản phẩm bán trong một ngày</p>
		<table class="table table-striped table-bodered">
			<thead class="head">
				<tr>
					<th class="tero">Tên sản phẩm</th>
					<th class="tero">Số lượng sản phẩm</th>
					<th class="tero">Giá</th>
					<th class="tero">mã đơn hàng</th>
				</tr>
			</thead>
			<tbody>';
			foreach ($in_ra_bao_cao as  $value) {
			$output.='
				<tr>';
			$output.='
				
					<td class="tero">'.$value->product->name.'</td>
					<td class="tero">'.$value->quantity.'</td>
					<td class="tero">'.number_format($value->price).'</td>
					<td class="tero">'.$value->id_order.'</td>
				</tr>';
			}

			$output.='
			</tbody>
		</table>';
		return $output;

	}

	public function xuatReportmanyday($created_at_1, $created_at_2){
		$pdf= \App::make('dompdf.wrapper');
		$pdf->loadHTML($this->print_list_many_day($created_at_1, $created_at_2));
		return $pdf->stream();
	}
	public function print_list_many_day($created_at_1, $created_at_2){
		$in_ra_bao_cao = Order_detail::where('created_at','>=',Carbon::parse($created_at_1)->startOfDay()) // đầu ngày
				->where('created_at','<=',Carbon::parse($created_at_2)->endOfDay()) //cuối ngày
				->get();
		$output= '';
		$output.= '
		<header>
			<title>xuất báo cáo 1 ngày</title>
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
		}
		.center{
			text-align: center
		}
		</style>
		<h1 class="center">CỬA HÀNG NỘI THẤT NQL</h1>
		<p>báo cáo số sản phẩm bán trong một ngày</p>
		<table class="table table-striped table-bodered">
			<thead class="head">
				<tr>
					<th class="tero">Tên sản phẩm</th>
					<th class="tero">Số lượng sản phẩm</th>
					<th class="tero">Giá</th>
					<th class="tero">mã đơn hàng</th>
				</tr>
			</thead>
			<tbody>';
			foreach ($in_ra_bao_cao as  $value) {
			$output.='
				<tr>';
			$output.='
				
					<td class="tero">'.$value->product->name.'</td>
					<td class="tero">'.$value->quantity.'</td>
					<td class="tero">'.number_format($value->price).'</td>
					<td class="tero">'.$value->id_order.'</td>
				</tr>';
			}

			$output.='
			</tbody>
		</table>';
		return $output;

	}

}
?>