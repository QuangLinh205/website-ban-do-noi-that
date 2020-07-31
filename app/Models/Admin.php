<?php 
namespace App\Models;
/**
 * 
 */
use Illuminate\Database\Eloquent\Model;
class Admin extends Model
{
	
	protected $table='admins';
	protected $fillable=['name', 'password', 'created_at', 'updated_at', 'email','phone_number','status'];
}

 ?>