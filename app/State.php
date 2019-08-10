<?php 


namespace App;

use Illuminate\Database\Eloquent\Model;


class State extends Model
{
  protected $table = 'state';


  public function ciudades()
  	{
  		 return $this->hasMany(City::class);
  	}

} 
 ?>
