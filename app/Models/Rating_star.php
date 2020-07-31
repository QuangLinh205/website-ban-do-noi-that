<?php 
namespace App\Models;
/**
 * 
 */
use Illuminate\Database\Eloquent\Model;
class Rating_star extends Model
{
	
	protected $table='rating_star_product';
	protected $fillable=['id_product', 'id_customer', 'content_rating', 'rating_star', 'created_at', 'updated_at'];
	public function product()
    {
        return $this->belongsTo('App\Models\Product','id_product','id');
    }
    public function customer()
    {
        return $this->belongsTo('App\Models\Customer','id_customer','id');
    }
}

 ?>