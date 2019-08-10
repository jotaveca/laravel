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
 <span class="card-title grey-text"><h3>Enviar</h3></span>
 <br>


<!-- Modal Structure -->
<div id="modal_contactos" class="modal">
	<div class="modal-content center">
	<br>
	<div class="row">
                    <div class="col s12">
                       <h4>Contactos</h4>
                    </div>
     </div>
	<div class="row">

	<table class="highlight">
        <thead>
          <tr>
              <th>Nombres y Apellidos</th>
              <th>Correo electrónico</th>            
          </tr>
        </thead>

        <tbody>
          <tr>
            <td>Alvin Alan</td>
            <td>@gmail</td>            
          </tr>
          <tr>
            <td>Alan Perez</td>
             <td>@gmail</td>    
          </tr>
          <tr>
            <td>Jonathan Ruiz</td>
             <td>@gmail</td>         
          </tr>
        </tbody>
      </table>


	</div>

		
		
	
	
	</div>
	<div class="modal-footer">
			<button id="btn_save" class="modal-close waves-effect waves-green btn-flat">Cerrar</button>
		
	</div>
</div>


  
  <div class="row">
    <form class="col s12">
      <div class="row">
        <div class="input-field col s6">
          <input id="wallet_destino" type="text" class="validate">
          <label for="wallet_destino">Wallet Destino</label>
        </div>
        <div class="input-field col s6">           
 	

 	 <a class="waves-effect waves-light btn view modal-trigger" data-target="modal_contactos">Contactos frecuentes <i class="material-icons right">contacts</i></a>

 	
 	   
 	   </a>
 	  

        </div>
      </div>  

       <div class="row">
        <div class="input-field col s6">
          <input  id="ptr_envio" type="text" class="validate">
          <label for="ptr_envio">PTR</label>
        </div>
        <div class="input-field col s6">
          <input id="bs_envio" type="text" class="validate">
          <label for="bs_envio">BSS</label>
        </div>
      </div> 

      <div class="row">
        <div class="input-field col s12">
          <input id="nota" type="text" class="validate">
          <label for="nota">Nota</label>
        </div>
      </div>


    <div class="row">
      <div class="col s12"><span class="flow-text"> 
      <button class="btn waves-effect waves-light" type="submit" name="action">Enviar
   		 <i class="material-icons right">send</i>
 	  </button>
 	  </div>
     
    </div>

      
        
     
    </form>
  </div>
          
  

@endsection


