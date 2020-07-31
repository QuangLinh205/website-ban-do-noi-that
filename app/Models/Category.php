<?php 
namespace App\Models;
/**
 * 
 */
use Illuminate\Database\Eloquent\Model;
class Category extends Model
{
	
	protected $table='categories';
	protected $fillable=['name', 'status', 'created_at', 'updated_at', 'description'];
	public function product()
    {
        return $this->hasMany('App\Models\Product','id_category','id');
    }
}

 ?>