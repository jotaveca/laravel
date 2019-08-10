<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Carbon\Carbon;
use Illuminate\Support\Facades\Mail;

use App\Events\ContentAprovalEvent;
use App\Events\ContentDenialEvent;
use App\Events\PayementAprovalEvent;
use App\Events\PaymentDenialEvent;
use App\Events\PasswordPromoter;
use Yajra\Datatables\Datatables;
use Illuminate\Support\Collection;
use App\Events\AssingPointsEvents;
use App\Events\UserValidateEvent;
use File;

//-------------Modelos del sistema-----------------------

use App\User;
use App\Catalog;

//------------------------------------------------------------

class AdminController extends Controller
{

  public function ShowClients() {
    return view('promoter.AdminModules.Clients');
  }
  
  
  public function ShowVerificateClients(){
    
    return view('promoter.AdminModules.ClientsVerificate');
  }
  public function ShowCatalogPos() {
    return view('promoter.AdminModules.CatalogPos');
  }

  public function AllClientsData() {
    $user = User::all();
    return response()->json($user);
      
  }
  
  public function AllCatalogData() {
    $user = Catalog::all();
    return response()->json($user);
      
  }
  
  public function update(Request $request)
  {
    $user = User::find($request->id);
    $user->name = $request->name;
    $user->last_name = $request->last_name;
    
    $user->save();
  
return response()->json($user); 

  }
  
  
  //Clientes verificacion 
  
  
  //Clientes Aprobados 
  public function ClientsVerifiedData() {
    $user = User::where('verify','Verificado')->get();
    return response()->json($user);

  }
  
  //Clientes en proceso 
  public function ClientsData() {
    $user = User::where('verify','En proceso')->get();
    return response()->json($user);

  }
  
  
  //Clientes rechazados 
  
  public function RejectedClientsData() {
   $user = User::where('verify','Rechazado')->get();
   return response()->json($user);

   }
   
   
   
   
   public function ValidateUser(Request $request,$id) {
     $User = User::find($id);
     
     if ($request->status == 'Aprobado') {

       $User->verify = 'Verificado';
       
     }
     else{
       $User->verify = 'Rechazado';
     }
      
     $User->save();
     return response()->json($User);
   }
   
   
   public function infoUsuario($idUser) {
     $user = User::find($idUser);
     return response()->json($user);
   }
   
   

}
 