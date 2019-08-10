<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>

    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <link rel="shortcut icon" href="{{ asset('favicon.ico') }}">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0"/>
    <title>{{ config('app.name', 'sites') }}</title>


    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">


    <!-- CSS  -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="{{ asset('plugins/materialize_index/css/materialize.css') }}" type="text/css" rel="stylesheet" media="screen,projection"/>
    <link href="{{ asset('plugins/materialize_index/css/style.css') }}" type="text/css" rel="stylesheet" media="screen,projection"/>
    <link href="{{ asset('css/owl.carousel.css') }}" type="text/css" rel="stylesheet" media="screen,projection"/>
    <link href="{{ asset('css/owl.theme.default.css') }}" type="text/css" rel="stylesheet" media="screen,projection"/>
    <link href="{{ asset('css/welcome.css') }}" type="text/css" rel="stylesheet" media="screen,projection"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">


    <script>
        window.Laravel = {!! json_encode([
            'csrfToken' => csrf_token(),
        ]) !!};
    </script>



    <!-- Styles -->
    
    <nav class="default_color" role="navigation">
<div class="nav-wrapper container"><a id="logo-container" href="{{ url('/')}}" class="brand-logo"><img  src="{{asset('sistem_images/logo_btc.png')}}" width="120px;" height="50px;" title="Logo de sites"></a>        
          <ul class="right hide-on-med-and-down">
            <li><a class="blue-text modal-trigger" href="#modal1"><b>Iniciar Sesión</b></a></li>
            <li><a class="blue-text modal-trigger" href="#modal2"><b>Registrate</b></a></li>
            </ul>
            
            <ul id="nav-mobile" class="sidenav">
              
              <li><a class="blue-text modal-trigger" href="#modal1"><b>Iniciar Sesión</b></a></li>
              <li><a class="blue-text modal-trigger" href="#modal2"><b>Registrate</b></a></li>
              
            </ul>
            <a href="#" data-target="nav-mobile" class="sidenav-trigger"><i class="blue-text material-icons">menu</i></a>

      </div>
    </nav>
    

</head>


<body>
  
  <!-- Contenido  -->
  <br><br>
  <div class="row">
      <div class="col s12 m8 offset-m2">
          <div class="card-panel curva">
            
      
              <h4 class="center">Recuperar contraseña de usuario</h4>
          
           {{ csrf_field() }}
                      <div class="row">
                  <div class="input-field col s12  {{ $errors->has('email') ? ' has-error' : '' }}">
                      <i class="material-icons prefix blue-text">email</i>
                      <input type="email" id="email" name="email" class="autocomplete" value="{{ old('email') }}" required>
                      <label for="email">Correo</label>
                      
                          <span id ="validarCorreo" class="help-block" hidden >
                              <strong>Ingrese una dirección de correo valida</strong>
                          </span>
                    
                  </div>
                  <div class="input-field col s12 center">
                      <button class="btn curvaBoton waves-effect waves-light blue-grey" onclick="sendEmailRecuperation()" >Enviar
                          <i class="material-icons right">send</i>
                      </button>
                  </div>
              </div>
          </div>
      </div>
  </div>
  
  <!-- Fin Contenido  -->
  
  <!-- Parallax  -->
  {{--<div class="parallax-container" style="width: 100%; ">--}}
      {{--<div class="parallax"><img src="{{asset('plugins/materialize_index/img/parallax.jpg') }}"></div>--}}
  {{--</div>--}}
  
  <!--Fin parallax-->

  <!-- Modal inicio de sesion -->
  <div id="modal1" class="modal">
      <div class="modal-content center ">
          <div class="row">
              <div class="col s12">
                  <h4>Iniciar Sesión</h4>
              </div>
          </div>
  <div id="usuario" class="col s12 center">
      <form class="form-horizontal" role="form" method="POST" action="{{ url('/login') }}">
          {{ csrf_field() }}
          <div class="row">

              <div class="input-field col s12 {{ $errors->has('login') ? ' has-error' : '' }}">
                  <i class="material-icons prefix blue-text">email</i>
                  <input type="text" id="login" type ="login"name="login" class="autocomplete" value="{{ old('email') }}" required autofocus>
                  <label  for="email">Correo o nombre de usuario</label>
                  <div id="emailMen" style="margin-top: 1%"></div>
                  @if ($errors->has('login'))
                      <span class="help-block">
                                      <strong class="red-text">{{ $errors->first('login') }}</strong>
                                  </span>
                  @endif
              </div>
              
            
              <div class="input-field col s12">
                  <i class="material-icons prefix blue-text">vpn_key</i>
                  <input id="password" type="password" name="password" class="autocomplete" value="{{ old('password') }}" required autofocus>
                  <label for="password">Contraseña</label>
                  <div id="passwordMen" ></div>
                  @if ($errors->has('password'))
                      <span class="help-block">
                              <strong class="red-text">{{ $errors->first('password') }}</strong>
                          </span>
                  @endif
              </div>
              <div class="input-field col s12">
                  <button class="btn curvaBoton waves-effect waves-light  blue-grey" id="iniciar" type="submit" name="action">Iniciar sesión
                      <i class="material-icons right">send</i>
                  </button><br>¿Olvidaste tu contraseña?
                  <a class="blue-text" href="{{ url('/password/reset') }}">
                       Recupérala aquí
                  </a>
                  <br>
                
              </div>
             
            
          </div>

      </form>
  </div>


  
</div>

</div>
<!--Fin modal inicio de sesnion-->
  
  <!-- Modal Registro -->
  <div id="modal2" class="modal">
      <div class="modal-content center ">
          <div class="row">
            <div class="col s12">
                <h4>Regístrate</h4>
            </div>
                
          </div>
          {{--registro usuario--}}
          <div id="usuario1" class="col s12 center">
              <div class="row">
                  <form class="form-horizontal" method="POST" action="{{ route('register') }}" id="formR">
                  

                    {{ csrf_field() }}
                    <input type="hidden" id="enlace" name="enlace">
                    <div class="input-field col s12 {{ $errors->has('name') ? ' has-error' : '' }}">
                        <i class="material-icons prefix blue-text">face</i>
                        <input type="text" class="autocomplete" name="name" id="name" value="{{ old('name') }}" required="required" onkeypress="return controltagLet(event)" pattern="[A-Za-zñÑáéíóúÁÉÍÓÚ\s]+">
                        <label for="name">Nombre</label>
                        <div id="nameMen" style="margin-top: 1%"></div>
                        @if ($errors->has('name'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                        @endif
                    </div>
                    <div class="input-field col s12 {{ $errors->has('username') ? ' has-error' : '' }}">
                      <i class="material-icons prefix blue-text">face</i>
                      <input id="username" type="text" class="autocomplete" name="username"  value="{{ old('username') }}" required="required"  required maxlength="15">
                        <label for="name">Nombre de usuario</label>
                        @if ($errors->has('username'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('username') }}</strong>
                                    </span>
                        @endif
                    </div>
                    
                    <div class="input-field col s12 {{ $errors->has('email') ? ' has-error' : '' }}">
                        <i class="material-icons prefix blue-text">email</i>
                        <input type="email" id="emailRU" name="email" class="autocomplete" required="required">
                        <label for="emailRU">Correo</label>
                        <div id="emailMenRU" style="margin-top: 1%"></div>
                        @if ($errors->has('email'))
                            
                        @endif
                    </div>
                    <div class="input-field col s12 {{ $errors->has('password') ? ' has-error' : '' }}">
                        <i class="material-icons prefix blue-text">vpn_key</i>
                        <input type="password" name="password" id="passwordRU" class="autocomplete" required="required">
                        <label for="passwordRU">Contraseña</label>
                        <i class="material-icons prefix blue-text" onclick="mostrarContrasena()" style="margin-left: 40%;">remove_red_eye</i>

                        <div id="passwordMenRU" style="margin-top: 1%"></div>
                        @if ($errors->has('password'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                        @endif
                        </div>
                    <div class="input-field col s12">
                        <i class="material-icons prefix blue-text">vpn_key</i>
                        <input type="password" name="password_confirm" id="password_confirm" class="autocomplete" required="required">
                        <label for="password_confirm">Repetir Contraseña</label>
                        <i class="material-icons prefix blue-text" onclick="mostrarContrasena2()" style="margin-left: 40%;">remove_red_eye</i>

                        <div id="passwordCMenRU" style="margin-top: 1%"></div>
                        @if ($errors->has('password_confirm'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('password_confirm') }}</strong>
                                    </span>
                        @endif
                    </div>
                    
                
                      
                      <div>
                          <label>
                              <input type="checkbox" name="terminosCondiciones" checked="checked" required="required" id="terminosCondiciones">
                              <span>He leído y acepto los </span> <a href="#" target="_blank">Términos y Condiciones</a>.
                          </label>
                      </div>
  
                      <div class="input-field col s12">
                          <button class="btn curvaBoton waves-effect waves-light blue-grey" id="registroRU" type="submit" name="action">Registrarse
                              <i class="material-icons right">send</i>
                          </button><br>
                      </div>
                      
                    
                  </form>
              </div>

          </div>
          
            
      </div>
  
  </div>
    
    <!--  Scripts-->
    <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
    <script src="{{asset('plugins/materialize_index/js/materialize.js') }}"></script>
    <script src="{{asset('plugins/materialize_index/js/init.js') }}"></script>
    <script src="{{asset('js/owl.carousel.min.js') }}"></script>
    <script src="{{asset('js/email.js') }}"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    
    <script >
    function sendEmailRecuperation() {
          
      var gif = "{{ asset('/sistem_images/loading.gif') }}";
    
    
      swal({
        title: "Enviando correo de recuperación",
        text: "Espere mientras se lo enviamos.",
        icon: gif,
        buttons: false,
        closeOnEsc: false,
        closeOnClickOutside: false,
        onOpen: () => {
          swal.showLoading();
        }
        });
      
        $.ajax({
            url:"{{url('/password/email')}}", 
            dataType: 'json',
            type: 'POST',
            data: {
                email : $('#email').val(),
                _token: $('input[name=_token]').val(),
            },
            success: function (result) {
                        
    
                    if(result.error == "false"){
                        swal.close();
                            
                         M.toast({html: 'Se ha enviado el mensaje de recuperación a su correo electronico!', displayLenght: 2000 
                  }) ;
                  
                            if( $('#validarCorreo').css('display') != 'none' ){
                                
                                  $('#validarCorreo').hide();
    
                                }
                              
                        
                    }else{
                      swal.close();
                         $('#validarCorreo').show();
                         
                         
    
                    
                    }
                    
                  
    
          
            },
            error: function (result) {
                console.log(result);
            }
            
            
            
        });
    
          
            
            
                
    }
    
    </script>
    @if (count($errors) > 0)
        <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
        <script src="{{asset('plugins/materialize_index/js/materialize.js') }}"></script>
        <script src="{{asset('plugins/materialize_index/js/init.js') }}"></script>
        <script>
            $(document).ready(function(){
                $('#modal1').modal('open');
            });
        </script>
        @endif
        
        
        <script type="text/javascript">
        <!-- Mostrar Contraseñas -->
        
            function mostrarContrasena(){
                var tipo = document.getElementById("passwordRU");
                if(tipo.type == "password"){
                    tipo.type = "text";
                }else{
                    tipo.type = "password";
                }
            }
        </script>
        <script>
            function mostrarContrasena2(){
                var tipo = document.getElementById("password_confirm");
                if(tipo.type == "password"){
                    tipo.type = "text";
                }else{
                    tipo.type = "password";
                }
            }
        </script>
        

</div>
</body>
</html>


