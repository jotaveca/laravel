<?php

namespace App\Http\Controllers;

use Datatables;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Events\TvTraceEvent; //Agrega el Evento 
use App\Events\RadioTraceEvent; //Agrega el Evento 
use Auth;//Agrega el facade de Auth para acceder al id

use App\User;
use App\State;
use App\City;


use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;



class ContentController extends Controller
{

//------------------------------------------Wallets------------------------------------------------------//
public function ShowWallets() {
    return view('contents.wallet');
    
    

}

//------------------------------------------Transferir(Contactos)------------------------------------------------------//

public function ShowContactsTransfer() {
  return view('contents.contactoTransferir');
}


//------------------------------------------Comercio------------------------------------------------------//

public function ShowComercio() {
  return view('contents.pagar');
}



//------------------------------------------Comercio------------------------------------------------------//

public function ShowRecibir() {
  
  $user = User::find(Auth::user()->id);
      
  $state = State::all(); 
  $city = City::all();
  return view('contents.recibir')->with('user', $user)->with('state' , $state)->with('city',$city);

  //return view('contents.recibir');
}


//------------------------------------------Enviar(Nube)------------------------------------------------------//

public function ShowEnviar() {
  return view('contents.enviar');
}

//------------------------------------------Solicitar(Nube)------------------------------------------------------//

public function ShowSolicitar() {
  return view('contents.solicitar');
}

//------------------------------------------Solicitar(Nube)------------------------------------------------------//

public function showContacts() {
  return view('contents.contactos');
}

//------------------------------------------Solicitar(Nube)------------------------------------------------------//

public function showActividadReciente() {
  return view('contents.actividad');
}






    
}