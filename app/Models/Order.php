<?php 
namespace App\Models;
/**
 * 
 */
use Illuminate\Database\Eloquent\Model;
class Order extends Model
{
	
	protected $table='orders';
	protected $fillable=['id_customer','status','created_at','updated_at'];
	public function customer()
    {
        return $this->belongsTo('App\Models\Customer','id_customer','id');
    }
    public function product()
    {
        return $this->belongsTo('App\Models\Product','id_product','id');
    }
    public function order_detail()
    {
        return $this->belongsTo('App\Models\Order_detail','id_order');
    }
}

 ?>