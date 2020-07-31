<?php 
namespace App\Models;
/**
 * 
 */
use Illuminate\Database\Eloquent\Model;
class Slide extends Model
{
	
	protected $table='slides';
	protected $fillable=['name', 'status', 'image','created_at','updated_at'];
	
}

 ?>