<?php 
namespace App\Models;
/**
 * 
 */
use Illuminate\Database\Eloquent\Model;
class Order_detail extends Model
{
	
	protected $table='order_detail1';
	protected $fillable=['receiver','phone_receiver','id_order', 'id_product', 'price', 'quantity','status','created_at','updated_at'];
	public function product(){
		return $this->belongsTo('App\Models\Product','id_product');
	}
	public function order(){
		return $this->belongsTo('App\Models\Order','id_order');
	}
}

 ?>