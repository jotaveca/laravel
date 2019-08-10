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

use App\Catalog;

//-----------------------------------------------------

class CatalogController extends Controller
{
  public function closed(Request $request, $id)
  {
      $catalog = Catalog::find($id);
      
      
      $catalog->delete();
      
      return redirect()->action('AdminController@AllCatalogData');

  }
  
  
  public function findCatalog($id){
    
    $catalog = Catalog::find($id);
    
    return response()->json($catalog); 
    
  }
  
  
  public function update(Request $request)
  {
    
    
    
    $catalog = Catalog::find($request->id);
    $catalog->equipo_futbol = $request->name_equipo;
    $catalog->num_serial = $request->num_serial;
    $catalog->modelo = $request->modelo;
    $catalog->status = $request->status;
    $catalog->save();
  
      return response()->json($catalog); 

  }
  
  
  public function add(Request $request){
    $catalog = new Catalog;

    $catalog->equipo_futbol = $request->name_equipo;
    $catalog->num_serial = $request->num_serial;
    $catalog->modelo = $request->modelo;
    $catalog->status = $request->status;
  

  
    $catalog->save();
  
     return response()->json($catalog); 
  }
  

}
