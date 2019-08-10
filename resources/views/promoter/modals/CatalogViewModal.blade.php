  
<div class="modal" id="modal1">
  <div class="modal-content">
  
  
    <div class="row">
      <ul id="projects-collection" class="collection">
      
      
        <div class="card-image waves-block" style="height: 65px; padding-top: 9px">
            <h4 class="titelgeneral">Datos a editar</h4>
        </div>
    {!! Form::open(['method'=>'POST', 'files'=>true,'class'=>'form-horizontal','id'=>'formEdit']) !!}
        <!--Nombre equipo futbol-->
    
        <div class="row">
          <label for="nombre">Equipo de futbol</label>
          
          <div class="input-field col s12 ">
            
  
              {!! Form::text('name_equipo','',['class'=>'form-control', 'onkeypress' => 'return controltagLet(event)','id'=>'equipoF']) !!}
              <div id="mensajeNombre"></div>
          </div>
        </div>
        

        <!--Numero de serial -->
          <div class="row">
        <label for="apellido">Numero serial </label>
        <div class="input-field col s12 ">
          

            {!! Form::text('num_serial','',['class'=>'form-control', 'onkeypress' => 'return controltagLet(event)','id'=>'numeroS']) !!}
            <div id="mensajeNombre"></div>
        </div>
          </div>
        
        <!--Modelo-->
        <div class="row">
          <label  for="email">Modelo</label>
        <div class="input-field col s12">
        

            {!! Form::text('modelo','',['class'=>'form-control','readonly','id'=>'modeloF']) !!}
        </div>
      </div>
      
      
      <!-- Status -->
      <div class="input-field col s6">
          <select id="statusE">
              <option value="" disabled selected>Selecciona el status</option>
              <option value="1">Asigado</option>
              <option value="2">No asignado</option>
              
            </select>
              <label>Status</label>
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
        <h4>¿Estás seguro de eliminar este registro? </h4>
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
  
  
  <!-- Añadir un registro nuevo -->
  
  <div class="modal" id="modal3">
    <div class="modal-content">
    
    
      <div class="row">
        <ul id="projects-collection" class="collection">
        
        
          <div class="card-image waves-block" style="height: 65px; padding-top: 9px">
              <h4 class="titelgeneral">Añadir un nuevo POS</h4>
          </div>
      {!! Form::open(['method'=>'POST', 'files'=>true,'class'=>'form-horizontal','id'=>'formAdd']) !!}
          <!--Nombre equipo futbol-->
      
          <div class="row">
            <label for="nombre">Equipo de futbol</label>
            
            <div class="input-field col s12 ">
              
    
                {!! Form::text('name_equipo','',['class'=>'form-control', 'onkeypress' => 'return controltagLet(event)','id'=>'equipoAG']) !!}
                <div id="mensajeNombre"></div>
            </div>
          </div>
          
          
  
          <!--Numero de serial -->
            <div class="row">
          <label for="apellido">Numero serial </label>
          <div class="input-field col s12 ">
            
  
              {!! Form::text('num_serial','',['class'=>'form-control', 'onkeypress' => 'return controltagLet(event)','id'=>'numeroAG']) !!}
              <div id="mensajeNombre"></div>
          </div>
            </div>
          
          <!--Modelo-->
          <div class="row">
            <label  for="email">Modelo</label>
          <div class="input-field col s12">
          
  
              {!! Form::text('modelo','',['class'=>'form-control','onkeypress' => 'return controltagLet(event)','id'=>'modeloAG']) !!}
          </div>
        </div>
        
        
        <!-- Status -->
        <div class="input-field col s6">
            <select id="statusAG">
                <option value="0" disabled selected>Selecciona el status</option>
                <option value="1">Asigado</option>
                <option value="2">No asignado</option>
                
              </select>
                <label>Status</label>
                </div>
      
        
          <div class="input-field col s12">
              {!! Form::submit('Actualizar', ['class' => 'btn btn-primary blue-grey curvaBoton active','id'=>'EditarAG']) !!}
          </div>
        
    {!! Form::close() !!}
        </ul>
      </div>
    </div>
  </div>
  
  
  
  

  