@extends('layouts.app')

  <!-- CSS  -->
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link href="{{ asset('plugins/materialize_index/css/materialize.css') }}" type="text/css" rel="stylesheet" media="screen,projection"/>
        <link href="{{ asset('plugins/materialize_index/css/style.css') }}" type="text/css" rel="stylesheet" media="screen,projection"/>
       


@section('css')
  <style>
    .curvaBoton{border-radius: 20px;}
  </style>
@endsection
@section('main')
 <span class="card-title grey-text"><h3>Recibir</h3></span>
 <br>

 <div class="row">   
    <div class="col s12 m4 l2"><p>s12 m4</p></div>
    <div class="col s12 m4 l8">{!! QrCode::size(250)->generate($user->wallet_qr); !!}</div>
    <div class="col s12 m4 l2"><p>s12 m4</p></div>
  </div>

 <div class="row">   
    <div class="col s12 m4 l2"><p>s12 m4</p></div>
    <div class="col s12 m4 l8"><p>Tu dirección de Wallet<br>
    {{$user->wallet_qr}}</p></div>
    <div class="col s12 m4 l2"><p>s12 m4</p></div>
  </div>

  <div class="row">   
    <div class="col s12 m4 l4"> 
    <button class="btn waves-effect waves-light" type="submit" name="action">Imprimir
   		 <i class="material-icons right">send</i>
 	  </button>
    </div>
    <div class="col s12 m4 l4">
    <button class="btn waves-effect waves-light" type="submit" name="action">Enviar por correo electrónico
   		 <i class="material-icons right">send</i>
 	  </button>
    </div>
    <div class="col s12 m4 l4">
    <button class="btn waves-effect waves-light" type="submit" name="action">Blockchain
   		 <i class="material-icons right">send</i>
 	  </button>
    </div>
  </div>



@endsection


