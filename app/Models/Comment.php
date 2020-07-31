<?php 
namespace App\Models;
/**
 * 
 */
use Illuminate\Database\Eloquent\Model;
class Comment extends Model
{
	
	protected $table='comment';
	protected $fillable=['id_product', 'id_customer', 'created_at', 'updated_at', 'content'];
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