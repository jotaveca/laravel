<?php 

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Auth;
use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\Storage;

use App\Events\DeleteAccount;

use DB;
use Illuminate\Support\Facades\Crypt;
use Hash;

use File;
use QrCode;
use Carbon\Carbon;
use App\Events\BookTraceEvent; //Agrega el Evento
use App\Events\MegazineTraceEvent; //Agrega el Evento
use App\Events\MovieTraceEvent; //Agrega el Evento
use App\Events\SongTraceEvent; //Agrega el Evento
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;

use App\User;
use App\State;
use App\City;


class UserController extends Controller
{
  
  public function index()
  {
      return view('users.edit');
  }
  public function create()
  {
      return view('users.edit');
  }
  
  public function edit()
  {

      $user = User::find(Auth::user()->id);
      
      $state = State::all(); 
      $city = City::all();
      return view('users.edit')->with('user', $user)->with('state' , $state)->with('city',$city);
  }
  
  public function update(Request $request, $id)
  {
    $user = User::find($id);
    $user->name = $request->name;
    $user->last_name = $request->last_name;
    $user->fech_nac = $request->fech_nac;
    $user->num_doc = $request->ci;
    
    if ($request->hasFile('img_doc') )
    {

     $nombre = $this->sinAcento($request->name);

     $store_path = public_path().'/user/'.$user->id.'/profile/';

     $name = 'document'.$nombre.time().'.'.$request->file('img_doc')->getClientOriginalExtension();

     $request->file('img_doc')->move($store_path,$name);

     $user->img_doc = '/user/'.$user->id.'/profile/'.$name;
    
    }
    
    if($user->img_doc != null && $user->verify != "Verificado")
      $user->verify = 'En proceso';
    
    $user->phone_work = $request->phone_work;
    $user->phone_local = $request->phone_local;
    $user->codigo_postal = $request->codigo_postal;
    
    
    if($request->state_id != 0)
    $user->state = $request->state_id;
    if($request->city_id != 0)
    $user->city = $request->city_id;
    
    $user->save();
    Flash('Se han modificado sus datos con exito!')->success();
    return redirect()->action('UserController@edit');

  }
  
  public function sinAcento($cadena) {
      $originales =  'ÀÁÂÃÄÅÆàáâãäåæÈÉÊËèéêëÌÍÎÏìíîïÒÓÔÕÖØòóôõöðøÙÚÛÜùúûÇçÐýýÝßÞþÿŔŕÑñ';
      $modificadas = 'AAAAAAAaaaaaaaEEEEeeeeIIIIiiiiOOOOOOoooooooUUUUuuuCcDyyYBbbyRrÑñ';
      $cadena = utf8_decode($cadena);
      $cadena = strtr($cadena, utf8_decode($originales), $modificadas);
      return $cadena;
  }
  
  
  public function changepassword(Request $request, $id)
   {
       $user = User::find($id);

       $user->password = $request->password;
       $oldpass = $request->oldpass;
       $newpass = $request->newpass;
       $confnewpass = $request->confnewpass;
       $pass_encrypt = ($request->password);

       if (password_verify($oldpass, $user->password))
         {

       if ($newpass == $confnewpass) {

             $user->password = bcrypt($newpass);

             $user->save();

           Flash('Se ha modificado su contraseña con exito!')->success();
           return redirect()->action('UserController@edit');

       }

       else

         Flash('Su nueva contraseña ingresada no coincide con la verificación, Por favor intentelo de nuevo.')->success();
           return redirect()->action('UserController@edit');

         }

       else

         Flash('Ha ingresado su contraseña antigua incorrectamente, por favor intentelo de nuevo.')->success();
         return redirect()->action('UserController@edit');
   }
   
   public function closed(Request $request, $id)
   {
       $user = User::find($id);
       $user->account_status = "closed";
       $user->save();

       Auth::logout();
       
       $user->delete();
       //$users = DB::select('');
      // $add = DB::select('INSERT INTO users_closed  SELECT * FROM users WHERE id=1 ');

       Flash('Se ha cerrado su cuenta exitosamente, Esperamos volverlo a ver pronto!')->success();

       return redirect()->action('WelcomeController@welcome');

   }
   
   
   public function findUser($id){
     
     $user = User::find($id);
     
     return response()->json($user); 
     
   }
   
   
   
   
   
  
  }


 ?>