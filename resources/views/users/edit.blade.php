@extends('layouts.app')
@section('main')
    @include('flash::message')
    <script src="https://code.jquery.com/jquery-3.3.1.js" integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60=" crossorigin="anonymous"></script>

    <script type="text/javascript" src="{{ asset('js/image-profile.js') }}"></script>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="/resources/demos/style.css">
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    
    <style>
        @media only screen and (min-width: 993px) {
            .container {
                width: 98%;
            }
        }

        h5.breadcrumbs-header {
            font-size: 1.64rem;
            line-height: 1.804rem;
            margin: 1.5rem 0 0 0;
        }

        #work-collections .collection-header {
            font-size: 2.0rem;
            font-weight: 500;
        }

        #profile-card .card-image {
            height: 230px;
        }
        #profile-card .card-content p {
            font-size: 1.2rem;
            margin: 0px 0 0px 0;
        }

        #profile-card .btn-move-up {
            position: relative;
            top: -60px;
            right: -18px;
            margin-right: 10px !important;
        }


        #image-preview {
            width: 70px;
            height: 70px;
            padding-top: 0px;
            padding-left: 0px;
        }

        #image-preview input {
            line-height: 100px;
            font-size: 100px;
            position: absolute;
            opacity: 0;
            z-index: 10;
        }

        #image-preview label {
            z-index: 5;
            opacity: 0.8;
            cursor: pointer;
            background-color: #bdc3c7;
            width: 70%;
            height: 70px;
            font-size: 70px;
            line-height: 60px;
            text-transform: uppercase;
            margin: auto;
            text-align: center;
        }

        #image-preview_ci input {
            line-height: 200px;
            font-size: 200px;
            position: absolute;
            opacity: 0;
            z-index: 10;
        }

        .intl-tel-input{
            width: 100%;
        }
        
        .progress { position:relative; width:100%; height:15px; border: 1px solid #2bbbad; border-radius: 6px; background-color: white }
        .bar { background-color: #2bbbad; width:0%; height:15px; border-radius: 6px; }
        .percent { position:absolute; display:inline-block; top:-5px; left:48%; color: #7F98B2;}

    </style>
    <!-- START CONTENT -->
    <div class="row">

        <div class="col s4">
            <!-- Promo Content 1 goes here -->
        </div>
        <div class="col s4">
            <!-- Promo Content 2 goes here -->
        </div>
        <div class="col s4">
            <!-- Promo Content 3 goes here -->
        </div>

    </div>
    <input type="hidden" name="id" id="id" value="{{Auth::user()->created_at}}">

    <!--inicio contenido-->
    {!! Form::open(['route'=>['users.update',$user],'method'=>'PUT', 'files'=>true,'class'=>'form-horizontal','id'=>'edit']) !!}
    {{ Form::token() }}
      <div class="container">
        <div class="row">
          <div class="col s12">
            <div id="profile-card" class="card">
              
              <div class="card-image waves-block blue" style="height: 65px; padding-top: 9px">
      <span class="collection-header center" style="color:white;">
          <font size="5">Editar usuario</font>
      </span>
              </div>
          
              
          </div>
          
          <div class="row">
              <div class="col s4 " style="border-right:2px solid ">
                <span>Datos personales </span>
              </div>
              <div class="col s4 " style="border-right:2px solid ">
                <span>Datos de verificación </span>
              </div>
              <div class="col s4 " style="border-right:2px solid ">
                <span>Status documentos : {{$user->verify}}</span>
              </div>
          </div>
          
          
          <div class="progress">
            
            
          
            
            @if($user->fech_nac != null && $user->codigo_postal != null && $user->phone_work != null && $user->phone_local != null && $user->img_doc != null  && $user->verify == 'Verificado')
            <div class="determinate" style="width: 100%"></div>
            
              @elseif($user->last_name != null && $user->fech_nac != null && $user->num_doc != null && $user->img_doc != null && $user->phone_work != null && $user->phone_local != null && $user->codigo_postal != null)
              <div class="determinate" style="width: 66%">   </div>
            
              @else 
              <div class="determinate" style="width: 33%"></div>
            @endif

      </div>
      
      
      <div id="work-collections">
        <div class="row">
          <div class="col s12 m12 l8">
            <div id="profile-card" class="card">

            <ul id="projects-collection" class="collection">
            
              <div class="card-image waves-block" style="height: 65px; padding-top: 9px">
                  <h4 class="titelgeneral">Datos</h4>
              </div>
              <!--nombre-->
              <div class="input-field col s12 ">
                  {!! Form::text('name',$user->name,['class'=>'form-control', 'onkeypress' => 'return controltagLet(event)', 'pattern' => '[A-Za-zñÑáéíóúÁÉÍÓÚ\s]+','id'=>'nombre']) !!}
                  <div id="mensajeNombre"></div>
                  <label for="nombre">Nombre</label>
              </div>

              <!--apellido-->
              <div class="input-field col s12 ">
                  {!! Form::text('last_name',$user->last_name,['class'=>'form-control', 'onkeypress' => 'return controltagLet(event)', 'pattern' => '[A-Za-zñÑáéíóúÁÉÍÓÚ\s]+','id'=>'apellido']) !!}
                  <div id="mensajeNombre"></div>
                  <label for="apellido">Apellidos</label>
              </div>
              
              <!--email-->
              <div class="input-field col s12">
                  {!! Form::text('email',$user->email,['class'=>'form-control','readonly','id'=>'email']) !!}
                  <label  for="email">Correo</label>
              </div>
              
              
              <h4 class="titelgeneral">Datos de verificación</h4>

              <!--fecha de nacimiento-->
              <div class="input-field col s12 ">
                  <i class="material-icons prefix blue-text">today</i>
                  <input type="text" name="fech_nac" value="{!! date('d-m-Y', strtotime($user->fech_nac)) !!}" class="datepicker" id="fecha">
                  <label for="pickdate">Fecha de nacimiento</label>
                  <div id="mensajeNombre"></div>
              </div>
              
              
              <!--cedula-->
              <div class="input-field col s12">
                  <i class="material-icons prefix blue-text">assignment_ind</i>
                  @if($user->verify == 1)
                      {!! Form::text('ci',$user->num_doc,['class'=>'form-control','readonly','id'=>'ci']) !!}
                  @else
                      {!! Form::text('ci',$user->num_doc,['class'=>'form-control', 'required'=>'required', 'id'=>'cedula','onkeypress' => 'return controltagNum(event)', 'pattern' => '[0-9]+']) !!}
                      <div id="mensajeRuc"></div>
                  @endif
                  <label  for="cedula">Cédula</label>
              </div>
              
              
              <!-- imagen de RUC-->
              
              <div class="input-field col s12">

              <div class="form-group ">
                  @if($user->verify == "Rechazado" || $user->verify == "Por verificar")
                      <div class="file-field input-field col s12">
                          <label for="img_doc" class="control-label">Cargar imagen de cédula , foto o pasaporte</label>
                          <br><br>
                          <div id="mensajeDocumento"></div>
                          <div class="btn blue">
                              <span>seleccione<i class="material-icons right">chrome_reader_mode</i></span>
                              {!! Form::file('img_doc',['class'=>'form-control','id'=>'img_doc','control-label','placeholder'=>'cargar libro','oninvalid'=>"this.setCustomValidity('Seleccione imagen del RUC')"]) !!}
                          </div>
                          <div class="file-path-wrapper">
                              <input class="file-path validate" type="text">
                          </div>
                      </div>

                  @endif
                  <div  class="col m4">
                      @if ($user->img_doc)
                          <img id="preview_img_doc" src="{{asset($user->img_doc)}}" name='ci' alt="your image" width="180" height="180" />
                      @else
                      <!--<a href="#"><img src="{{asset('sistem_images/DefaultUser.png')}}" id="preview_img_doc" alt="Avatar" height="180" width="180"></a>-->
                      @endif
                  </div>
              </div>
              
            </div>
            <!--    <select id="state" >
                  <option selected="selected">Selecciona Tu estado </option>
                  @foreach($state as $stat)
	                   <option value="{{ $stat->id }}">{{ $stat->state_name }}</option> 
                      @endforeach
                    </select> <br/><br/>
                    
                  </div>
                  
                  <div class="input-field col s6">
                    <select id="city" >
                          
                        </select> <br/><br/>
                  </div> -->
                  
                  
                
                  
                      <div class="input-field col s6">
                        
                        @if($user->state == null)
                    <select id="state_id" name="state_id">
                          <option>Selecciona tu estado </option>
                              @foreach($state as $stat)
                                  <option value="{{ $stat->id }}">{{ $stat->state_name }}</option> 
                              @endforeach
                              
                            </select>
                            @else
                            @foreach ($state as $stat)
                                @if($user->state == $stat->id)
                                <p>Estado:</p>
                                <h6>{{$stat->state_name}}</h6>
                                @endif
                                  @endforeach
                              
                            @endif
                            
                        
                            
                          </div>
                          
                                        <br>
                                        
                                        <div class="input-field col s6">
                                          @if($user->city == null)
                                          <select id="city_id" name="city_id">
                                            <option>Selecciona tu ciudad </option>

                                            @foreach($city as $c)
                                                <option value="{{ $c->id }}">{{ $c->city_name }}</option> 
                                            @endforeach

                                          </select>
                                          
                                          @else
                                          @foreach ($city as $c)
                                              @if($user->city == $c->id)
                                              <p>Ciudad:</p>
                                              <h6>{{$c->city_name}}</h6>
                                              @endif
                                                @endforeach
                                            
                                          @endif
                                          
                                        </div>
                                      
                  
              
                  <div class="row">
                    <div class="input-field col s6">
                      
                          <i class="material-icons prefix blue-text">contact_phone</i>
                              {!! Form::text('phone_work',$user->phone_work,['class'=>'form-control', 'required'=>'required','id'=>'telefonoWork', 'onkeypress' => 'return controltagNum(event)', 'pattern' => '[0-9]+']) !!}
                              <div id="mensajeRuc"></div>
                          <label  for="telefono">Telefono Fijo</label>
                      
                    </div>
                    
                    <div class="input-field col s6">
                      
                          <i class="material-icons prefix blue-text">contact_phone</i>
                              {!! Form::text('phone_local',$user->phone_local,['class'=>'form-control', 'required'=>'required','id'=>'telefonoLocal', 'onkeypress' => 'return controltagNum(event)', 'pattern' => '[0-9]+']) !!}
                              <div id="mensajeRuc"></div>
                          <label  for="telefono">Telefono Local</label>
                      
                    </div>
                    
                  </div>
                  
                
                    <!--Codigo postal -->
                    <div class="input-field col s4 ">
                        {!! Form::text('codigo_postal',$user->codigo_postal,['class'=>'form-control','id'=>'codigo_postal', 'onkeypress' => 'return controltagNum(event)', 'pattern' => '[0-9]+']) !!}

                        <div id="mensajeNombre"></div>
                        <label for="codigo_postal">Codigo Postal</label>
                    </div>
                
              

               
              <div class="input-field col s12">
                  {!! Form::submit('Actualizar', ['class' => 'btn btn-primary blue-grey curvaBoton active','id'=>'Editar']) !!}
              </div>
            
        
            </ul>
            
            {!! Form::close() !!}

          </div>
          
          
        
        </div>
        <div class="col s12 m6 l4">

        <!-- CLOSE ACCOUNT -->
        <div id="profile-card" class="card">
            <div class="card-image waves-block blue" style="height: 65px; padding-top: 9px">
    <span class="collection-header center" style="color:white;">
        <font size="5">Opciones de cuenta</font>
    </span>
            </div>
            <div class="card-content">
                <p><i class="mdi-communication-email cyan-text text-darken-2"></i></p>
                <div style="text-align: left;">
                    <ul>
                        <i class="material-icons prefix blue-text">edit</i>
                        <a class="modal-trigger" href="#modal1">CAMBIAR CONTRASEÑA</a>

                        <div id="modal1" class="modal">
                            <div class="modal-content">
                                <div style="text-align: center;">
                                    <div class="card-image waves-block blue" style="height: 65px; padding-top: 9px"><span class="collection-header center" style="color:white;">Cambiar Contraseña</span></div>
                                </div>
                                <div class="card-content">

                                    <div class="input-field col s12">

                                        {!! Form::open(['url'=>['ChangePassword',$user],'method'=>'POST','files'=>true,'class'=>'form-horizontal','id'=>'changepassword']) !!}
                                        {{ Form::token() }}

                                        {!! Form::hidden('password',$user->password,['class'=>'form-control','method'=>'POST']) !!}
                                        <div class="input-field col s12 l11">
                                            <i class="material-icons prefix blue-text">edit</i>
                                            <label for="oldpass">Introduzca su antigua contraseña</label>
                                            {!! Form::password('oldpass',['class'=>'form-control','name'=>'oldpass','id'=>'oldpass','method'=>'POST', 'type'=>'password']) !!}<i class="material-icons prefix blue-text" onclick="mostrarContrasena()" style="margin-left: 5px;">remove_red_eye</i>
                                            <div id="oldpasscp" style="margin-top: 1%"></div>
                                            @if ($errors->has('oldpass'))
                                                <span class="help-block">
                    <strong>{{ $errors->first('oldpass') }}</strong>
                </span>
                                            @endif
                                        </div>
                                        <div class="input-field col s12 l11">
                                            <i class="material-icons prefix blue-text">edit</i>
                                            <label for="newpass">Introduzca su nueva contraseña</label>
                                            {!! Form::password('newpass',['class'=>'form-control','name'=>'newpass','id'=>'newpass','method'=>'POST', 'type'=>'password']) !!}<i class="material-icons prefix blue-text" onclick="mostrarContrasena2()" style="margin-left: 5px;">remove_red_eye</i>
                                            <div id="newpasscp" style="margin-top: 1%"></div>
                                            @if ($errors->has('newpass'))
                                                <span class="help-block">
                    <strong>{{ $errors->first('newpass') }}</strong>
                </span>
                                            @endif
                                        </div>
                                        <div class="input-field col s12 l11">
                                            <i class="material-icons prefix blue-text">edit</i>
                                            <label for="confnewpass">Confirme su nueva contraseña</label>
                                            {!! Form::password('confnewpass',['class'=>'form-control','name'=>'confnewpass','id'=>'confnewpass','method'=>'POST', 'type'=>'password']) !!}<i class="material-icons prefix blue-text" onclick="mostrarContrasena3()" style="margin-left: 5px;">remove_red_eye</i>
                                            <div id="confnewpasscp" style="margin-top: 1%"></div>
                                            @if ($errors->has('confnewpass'))
                                                <span class="help-block">
                    <strong>{{ $errors->first('confnewpass') }}</strong>
                </span>
                                            @endif
                                        </div>
                                        <div style="text-align: center">
                                            {!! Form::submit('Actualizar', ['class' => 'btn btn-primary blue-grey curvaBoton active','id'=>'ChangePassword']) !!}
                                            {!! Form::button('Regresar', ['class' => 'btn btn-primary blue-grey curvaBoton active modal-close','id'=>'Regresar']) !!}
                                        </div>
                                        <!--<a href="#" class="btn btn-primary green curvaBoton active modal-close">Volver</a>-->
                                    </div>
                                <!-- <a href="{{ url('ChangePassword', $user->id) }}" class="btn btn-primary green curvaBoton active modal-close" id="changepassword">Actualizar</a>
        <a href="#" class="btn btn-primary green curvaBoton active modal-close">Volver</a>-->           </div>
                            </div>
                        </div>
                    </ul>
                    <ul>

                        <i class="material-icons prefix blue-text">delete_forever</i>
                        <a class="modal-trigger" href="#modal2">ELIMINAR CUENTA</a>

                        <div id="modal2" class="modal">
                            <div class="modal-content">
                                <div style="text-align: center;">
                                    <div class="card-image waves-block blue" style="height: 65px; padding-top: 9px"><span class="collection-header center" style="color:white;">Eliminar cuenta</span></div>
                                </div>
                                <div class="card-content" style="text-align: center;"><label><h6><span class="card-title"></span><span class="card-title">¿Desea Eliminar su cuenta en Sites? <br><br> Esta acción inhabilitará su cuenta permanentemente y no podra ingresar de nuevo con ella.</span></h6></label><br>
                                    <div style="text-align: center">
                                        <a href="{{ url('DeleteAccount', $user->id) }}" class="btn btn-primary blue-grey curvaBoton active modal-close">Si, Estoy Seguro</a>
                                    {!! Form::button('Regresar', ['class' => 'btn btn-primary blue-grey curvaBoton active modal-close','id'=>'Regresar']) !!}
                                    <!--<a href="#" class="btn btn-primary green curvaBoton active modal-close">Volver</a>-->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </ul>

                </div>

            </div>
              {!! Form::close() !!}
        </div>
        
      <!-- correo por confirmar -->
        @if($user->confirmed != true)
            <div class="card-panel red" style="padding:4px ">  <i class=" small material-icons" style="color:white">cancel</i>
                <h6 style="color:white; margin-top:0.2rem">Correo electronico no verificado </h6> </div>
        @else
            <div class="card-panel blue" style="padding:4px ">  <i class=" small material-icons" style="color:white">check</i>
                <h6 style="color:white; margin-top:0.2rem"> Correo electronico  verificado</h6> </div>
    @endif
      
      
      
      <!--validacion de los documentos -->
      @if($user->verify == 'Por verificar')
      <div class="card-panel red" style="padding:4px ">  <i class=" small material-icons" style="color:white">cancel</i>
          <h6 style="color:white; margin-top:0.2rem">Necesita ingresar los documentos para verificar su  cuenta </h6> </div>
      
          @elseif($user->verify == 'En proceso')
          <div class="card-panel green" style="padding:4px ">  <i class=" small material-icons" style="color:white">check</i>
              <h6 style="color:white; margin-top:0.2rem">Su cuenta se encuentra en proceso de revisión </h6> </div>
              @elseif($user->verify == 'Verificado')
              <div class="card-panel yellow" style="padding:4px ">  <i class=" small material-icons" style="color:white">check</i>
                  <h6 style="color:white; margin-top:0.2rem">Su cuenta se encuentra verificada </h6> </div>
      
               @elseif($user->verify == 'Rechazado')
               <div class="card-panel red" style="padding:4px ">  <i class=" small material-icons" style="color:white">cancel</i>
                   <h6 style="color:white; margin-top:0.2rem">Sus documentos han sido rechazados  </h6> </div>
          @else
      @endif
    
        <div class="card_profile">
          {!! QrCode::size(250)->generate($user->wallet_qr); !!}

        </div>
          
        </div>
        
    
      
      </div>
        
        
</div>
    
     
    

 <link rel="stylesheet" href="plugins/datepicker/datepicker3.css"> 
 
 <script>
     $(function() {
         $('#fecha').datepicker({
             format: 'dd-mm-yyyy',
             yearRange: 50,
             changeMonth: true,
             changeYear: true,
             firstDay: 1,
             i18n: {
                 months: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
                 monthsShort: ['Ene', 'Feb', 'Mar', 'Abr', 'May', 'Jun', 'Jul', 'Ago', 'Sep', 'Oct', 'Nov', 'Dic'],
                 weekdays: ['Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado'],
                 weekdaysShort: ['Dom', 'Lun', 'Mar', 'Mié', 'Jue', 'Vie', 'Sáb'],
                 weekdaysAbbrev: ['D','L','M','M','J','V','S'],

             }
         });
     });
 </script>
     




@endsection


@section('js')



    <!-- Confirmación cambio de contraseñas-->
    <script type="text/javascript">
    
    

  


        $(document).ready(function(){
          
          
          

            $('#oldpass').keyup(function(evento){
                var password = $('#oldpass').val().trim();

                if (password.length==0) {
                    $('#oldpasscp').show();
                    $('#oldpasscp').text('El campo no debe estar vacio');
                    $('#oldpasscp').css('color','red');
                    $('#oldpasscp').css('font-size','60%');
                    $('#modal1').attr('disabled',true);
                    $('#ChangePassword').attr('disabled',true);
                }
                if (password.length < 5) {
                    $('#oldpasscp').show();
                    $('#oldpasscp').text('Su contaseña antigua debe tener al menos 5 caracteres');
                    $('#oldpasscp').css('color','red');
                    $('#oldpasscp').css('font-size','60%');
                    $('#modal1').attr('disabled',true);
                    $('#ChangePassword').attr('disabled',true);
                }
                else {
                    $('#oldpasscp').hide();
                    var password1 = $('#oldpass').val().trim();
                    console.log(password1.length !=0);
                    if (password1.length !=0){
                        $('#modal1').attr('disabled',false);
                        $('#ChangePassword').attr('disabled',false);
                    }
                }
            });
        });
    </script>
    
    <script type="text/javascript">
        $(document).ready(function(){

            $('#newpass').keyup(function(evento){
                var password = $('#newpass').val().trim();

                if (password.length==0) {
                    $('#newpasscp').show();
                    $('#newpasscp').text('El campo no debe estar vacio');
                    $('#newpasscp').css('color','red');
                    $('#newpasscp').css('font-size','60%');
                    $('#modal1').attr('disabled',true);
                    $('#ChangePassword').attr('disabled',true);
                }
                if (password.length < 5) {
                    $('#newpasscp').show();
                    $('#newpasscp').text('Su nueva contaseña debe tener 5 caracteres');
                    $('#newpasscp').css('color','red');
                    $('#newpasscp').css('font-size','60%');
                    $('#modal1').attr('disabled',true);
                    $('#ChangePassword').attr('disabled',true);
                }
                else {
                    $('#newpasscp').hide();
                    var password1 = $('#confnewpass').val().trim();
                    console.log(password1.length !=0 );
                    if (password1.length !=0){
                        $('#modal1').attr('disabled',false);
                        $('#ChangePassword').attr('disabled',false);
                    }
                }
            });
        });
    </script>

    <script type="text/javascript">
        $(document).ready(function(){

            $('#confnewpass').keyup(function(evento){
                var password = $('#confnewpass').val().trim();

                if (password.length==0) {
                    $('#confnewpasscp').show();
                    $('#confnewpasscp').text('El campo no debe estar vacio');
                    $('#confnewpasscp').css('color','red');
                    $('#confnewpasscp').css('font-size','60%');
                    $('#modal1').attr('disabled',true);
                    $('#ChangePassword').attr('disabled',true);
                }
                if (password.length < 5) {
                    $('#confnewpasscp').show();
                    $('#confnewpasscp').text('Su nueva contaseña debe tener 5 caracteres');
                    $('#confnewpasscp').css('color','red');
                    $('#confnewpasscp').css('font-size','60%');
                    $('#modal1').attr('disabled',true);
                    $('#ChangePassword').attr('disabled',true);
                }
                else {
                    $('#confnewpasscp').hide();
                    var password1 = $('#confnewpass').val().trim();
                    console.log(password1.length != 0);
                    if (password1.length !=0){
                        $('#modal1').attr('disabled',false);
                        $('#ChangePassword').attr('disabled',false);
                    }
                }
            });
        });

        $(document).ready(function(){

            $('#confnewpass').keyup(function(evento){
                var password1 = $('#newpass').val();
                var password = $('#confnewpass').val();

                if (password != password1) {
                    $('#confnewpasscp').show();
                    $('#confnewpasscp').text('Ambas contraseña deben coincidir');
                    $('#confnewpasscp').css('color','red');
                    $('#confnewpasscp').css('font-size','60%');
                    $('#ChangePassword').attr('disabled',true);
                } else {
                    $('#confnewpasscp').hide();
                    if (password1.length !=0){
                        $('#ChangePassword').attr('disabled',false);
                    }
                }
            });
        });
    </script>
    <!-- Mostrar Contraseñas -->
    <script>
        function mostrarContrasena(){
            var tipo = document.getElementById("oldpass");
            if(tipo.type == "password"){
                tipo.type = "text";
            }else{
                tipo.type = "password";
            }
        }
    </script>

    <script>
        function mostrarContrasena2(){
            var tipo = document.getElementById("newpass");
            if(tipo.type == "password"){
                tipo.type = "text";
            }else{
                tipo.type = "password";
            }
        }
    </script>

    <script>
        function mostrarContrasena3(){
            var tipo = document.getElementById("confnewpass");
            if(tipo.type == "password"){
                tipo.type = "text";
            }else{
                tipo.type = "password";
            }
        }
    </script>

    <script type="text/javascript">


$('select#state_id2').change(function(){

var stateId = $(this).val();


$.ajax({ 
    type    : "get",
    url     : "ciudades/"+stateId,
    dataType: "json",
    
    success: function (data) 
    {
      $('#city_id option').remove();
      console.log(data);
        $.each( data, function( key, value ) {

             $('#city_id').append("<option  value='" + value.id + "'> " + value.city_name + "</option>") 
               });
    } 
    });

});


</script>


    <!-- this is my JS via cdn -->
   <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
       <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-beta/js/materialize.min.js"></script>
        
        
          <script type="text/javascript">
            
        
      // Or with jQuery
      
      $(document).ready(function(){
        $('select').formSelect();
      });
          </script>
          
    
          
  

  
@endsection