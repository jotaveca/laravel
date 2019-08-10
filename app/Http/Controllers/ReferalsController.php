<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;


class ReferalsController extends Controller
{
    
    public function email(Request $request){
        $email=User::where('email','=',$request->email)->first();
        

        if($email){
            return response()->json($email->email); 
        }else{
            return response()->json(1); 
        }
    }
    
    
    public function emailConfirmation(Request $request){
      $email=User::where('email','=',$request->email)->first();

        if($email){
          
          return response()->json($email); 

        }
        else{
          $email=User::where('username','=',$request->email)->first();
          if($email){
            return response()->json($email); 

          }
          return response()->json(1); 

        }
        
        
      
      
      
    }
}
