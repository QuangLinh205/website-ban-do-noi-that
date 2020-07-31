<?php 
namespace App\Models;
/**
 * 
 */
use Illuminate\Database\Eloquent\Model;
class Product_detail extends Model
{
	
	protected $table='product_detail';
	protected $fillable=['id','id_product', 'image_1', 'image_2', 'image_3', 'created_at', 'updated_at'];
	public function product()
    {
        return $this->belongsTo('App\Models\Product','id_product','id');
    }
}

 ?>