<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\State;
use App\City;
use Auth;
class HomeController extends Controller
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
    public function index()
    {
      
      $user= User::find(Auth::user()->id);
        return view('home');
    }
    
    
    public function findCity($id){
      
      $ciudades = State::find($id)->ciudades;
    
        return response()->json($ciudades); 

    }
}
