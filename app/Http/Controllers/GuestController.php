<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class GuestController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
     //verifica que has confirmado tu correo electronico 
     public function verify($code)
   {
     $user = User::where('confirmation_code', $code)->first();
     

     if (! $user)
         return redirect('/');
       

       $user->confirmed = true;
       $user->confirmation_code = null;
       $user->save();

       return redirect('/home');
       

     
   }
}