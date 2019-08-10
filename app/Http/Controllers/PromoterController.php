<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Mail;
use App\Mail\PromoterAssing;
use DB;
use Illuminate\Support\Facades\Crypt;
use Hash;
use Laracasts\Flash\Flash;


//-------------Modelos del sistema-----------------------

use App\User;

use App\Promoters;

//-----------------------------------------------------

class PromoterController extends Controller
{
    public function index() {
      $id = Auth::guard('Promoter')->user()->id;
      $promoter = Promoters::find($id);
    
      return view('promoter.home')
              ->with('id',$id)
              ->with('promoter',$promoter);
            
    }


      public function edit()  
    {
        $id = Auth::guard('Promoter')->user()->id;
        $promoter = Promoters::find($id);
    
        return view('promoter.edit')->with('promoter', $promoter);
    }

     public function update(Request $request)
    {
        $id = Auth::guard('Promoter')->user()->id;
        $promoter = Promoters::find($id);

        $promoter->name_c = $request->name_c;
        $promoter->phone_s = $request->phone_s;

       if ($request->img_perf <> null) {
            $file = $request->file('img_perf');
            $name = 'img_perf_' . time() . '.' . $file->getClientOriginalExtension();
            $path = public_path() . '/images/promoter/img_perf';
            $file->move($path, $name);
            $promoter->img_perf ='/images/promoter/img_perf/'.$name;
        }

        $promoter->save();

        Flash('Se han modificado sus datos con exito!')->success();
        return redirect()->action('PromoterController@edit');
    }
  
      public function changepassword(Request $request, $id)
    {
        //$promoter = Auth::guard('Promoter')->user()->id;
        $promoter = Promoters::find($id);

        $promoter->password = $request->password;
        $oldpass = $request->oldpass;
        $newpass = $request->newpass;
        $confnewpass = $request->confnewpass;
        $pass_encrypt = ($request->password);

        if (password_verify($oldpass, $promoter->password))
          { 
        
        if ($newpass == $confnewpass) {

              $promoter->password = bcrypt($newpass);

              $promoter->save();

            Flash::success('Se ha modificado su contraseña con exito!')->success();
            return redirect()->action('PromoterController@edit'); 
                     
        } 
        
        else 
    
          Flash::success('Su nueva contraseña ingresada no coincide con la verificación, Por favor intentelo de nuevo.')->success();
            return redirect()->action('PromoterController@edit');

          }

        else 

          Flash::success('Ha ingresado su contraseña antigua incorrectamente, por favor intentelo de nuevo.')->success();
          return redirect()->action('PromoterController@edit');
    }


    //---------------------------------------------------------------------------------------------------------

  
//--------------------------------------------------------------------------------------

}
