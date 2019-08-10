<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

use Illuminate\Database\Eloquent\Model;

//Notification for Seller
use App\Notifications\PromoterResetPasswordNotification;




class Catalog extends Authenticatable
{
    protected $table = 'catalogo_pos';

   protected $fillable = [
      'id',
      'equipo_futbol', 
      'num_serial',
      'modelo',
    
    ];

    public function license() {
        return $this->belongsToMany('App\module','license','promoter_id','module_id');
    }

    //Send password reset notification
    public function sendPasswordResetNotification($token)
    {
        $this->notify(new PromoterResetPasswordNotification($token));
    }

    public function Sales()
    {
        return $this->hasMany('App\Salesman','promoter_id');
    
    }


    public function Logins()
    {
      return $this->hasMany('App\LoginControl','id_login');
    }
}
