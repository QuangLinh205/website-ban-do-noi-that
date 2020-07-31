<?php 
namespace App\Models;
/**
 * 
 */
use Illuminate\Database\Eloquent\Model;
class News extends Model
{
	
	protected $table='news';
	protected $fillable=['title', 'image', 'status', 'main_content', 'updated_at','created_at'];
	public $timestamps = true;
}

 ?>