<?php 
namespace App\Models;
/**
 * 
 */
use Illuminate\Database\Eloquent\Model;
class Product extends Model
{
	
	protected $table='products';
	protected $fillable=['name','quantity', 'price', 'sale_price', 'description', 'image','status','id_category','created_at','updated_at'];
	public function categories()
    {
        return $this->belongsTo('App\Models\Category','id_category','id');
    }
    public function order()
    {
        return $this->hasMany('App\Models\Order','id_product','id');
    }
    public function order_detail(){
    	return $this->hasMany('App\Models\Order_detail','id_product');
    }
    
    public function product_detail()
    {
        return $this->hasMany('App\Models\Product_detail','id_product','id');
    }
    public function comment()
    {
        return $this->hasMany('App\Models\Comment','id_product','id');
    }
    public function rating_star()
    {
        return $this->hasMany('App\Models\Rating_star','id_product','id');
    }
}

 ?>