  
<div class="modal" id="modal1">
  <div class="modal-content">
  
  
    <div class="row">
      <ul id="projects-collection" class="collection">
      
      
        <div class="card-image waves-block" style="height: 65px; padding-top: 9px">
            <h4 class="titelgeneral">Datos a editar</h4>
        </div>
    {!! Form::open(['method'=>'POST', 'files'=>true,'class'=>'form-horizontal','id'=>'formEdit']) !!}
        <!--nombre-->
    
        <div class="row">
          <label for="nombre">Nombre</label>
          
          <div class="input-field col s12 ">
            
  
              {!! Form::text('name','',['class'=>'form-control', 'onkeypress' => 'return controltagLet(event)', 'pattern' => '[A-Za-zñÑáéíóúÁÉÍÓÚ\s]+','id'=>'nombreC']) !!}
              <div id="mensajeNombre"></div>
          </div>
        </div>
        

        <!--apellido-->
          <div class="row">
        <label for="apellido">Apellidos</label>
        <div class="input-field col s12 ">
          

            {!! Form::text('last_name','',['class'=>'form-control', 'onkeypress' => 'return controltagLet(event)', 'pattern' => '[A-Za-zñÑáéíóúÁÉÍÓÚ\s]+','id'=>'apellidoC']) !!}
            <div id="mensajeNombre"></div>
        </div>
          </div>
        
        <!--email-->
        <div class="row">
          <label  for="email">Correo</label>
        <div class="input-field col s12">
        

            {!! Form::text('email','',['class'=>'form-control','readonly','id'=>'emailC']) !!}
        </div>
      </div>
      
        <div class="input-field col s12">
            {!! Form::submit('Actualizar', ['class' => 'btn btn-primary blue-grey curvaBoton active','id'=>'Editar']) !!}
        </div>
      
  {!! Form::close() !!}
      </ul>
    </div>
  </div>
</div>
  
  
<div class="modal" id="modal2">
    <div class="modal-content">
      
      <br>
      <div style="margin-top: 15%; margin-bottom: 15%">
        <form method="POST" id="formStatus">
          {{ csrf_field() }}
        <h4>¿Estás seguro de eliminar este usuario? </h4>
          <div class="col s12">
            <button class="btn btn-primary curvaBoton" type="submit">
              Eliminar
            </button>
          <a href="#" class="btn btn-primary green curvaBoton active modal-close">Volver</a>
            <br><br><br>
          </div>
          
        </form>
      </div>
    </div>
  </div>
  
  
  
  

  