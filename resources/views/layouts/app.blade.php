<!DOCTYPE html>
<html lang="es">
<head>
    <!--Import Google Icon Font-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!--Import materialize.css-->
    <link href="{{ asset('plugins/materialize_adm/css/materialize.css') }}" type="text/css" rel="stylesheet" media="screen,projection"/>
    <link href="{{ asset('plugins/materialize_adm/css/style.css') }}" type="text/css" rel="stylesheet" media="screen,projection"/>
    <link rel="stylesheet" href="//cdn.materialdesignicons.com/3.2.89/css/materialdesignicons.min.css">

@yield('css')
    <!--Let browser know website is optimized for mobile-->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0"/>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <link rel="shortcut icon" href="{{ asset('favicon.ico') }}">
    <title>{{ config('app.name', 'Sites') }}</title>

    <!--external css
    <link href="{{ asset('assets/font-awesome/css/font-awesome.css') }}" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="{{ asset ('assets/css/zabuto_calendar.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/js/gritter/css/jquery.gritter.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{ asset ('assets/lineicons/style.css') }}">-->
    <!-- Custom styles for this template -->
    <!--  <link href="<link href="{{ asset ('assets/css/style.css') }}" rel="stylesheet"> -->
    <!--  <  <link href="{{ asset ('assets/css/style-responsive.css') }}" rel="stylesheet">-->
    <!--  <script src="{{ asset ('assets/js/chart-master/Chart.js')}}"></script>-->

    <!--estilo plyr-->
    <link rel="stylesheet" href="https://cdn.plyr.io/3.4.7/plyr.css">

    <!--DataTables
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">-->

    <!--Modal
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.9.2/themes/base/jquery-ui.css" />-->

    <!--Buscador
    <link  rel="stylesheet" href="http://demo.expertphp.in/css/jquery.ui.autocomplete.css" rel="stylesheet">-->
    <link rel="stylesheet" href="//code.jquery.com/ui/1.9.2/themes/base/jquery-ui.css">

    <!--NUMERO
    <link rel="stylesheet" href="{{asset('plugins/telefono/intlTelInput.css')}}">
    <style type="text/css">
        .iti-flag {background-image: url("{{asset('plugins/telefono/flags.png')}}");}

        @media only screen and (-webkit-min-device-pixel-ratio: 2), only screen and (min--moz-device-pixel-ratio: 2), only screen and (-o-min-device-pixel-ratio: 2 / 1), only screen and (min-device-pixel-ratio: 2), only screen and (min-resolution: 192dpi), only screen and (min-resolution: 2dppx) {
            .iti-flag {background-image: url("{{asset('plugins/telefono/flags2x.png')}}");}

        }
    </style>-->
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <!--<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>-->
    <!-- <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>-->
    <![endif]-->

    <!--Carousel Owl Galeria-->
    <link rel="stylesheet" href="{{ asset('plugins/owlcarousel/dist/assets/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{ asset('plugins/owlcarousel/dist/assets/owl.theme.default.min.css')}}">


</head>
<body>
  <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;"> {{ csrf_field() }} </form>

      <!--header -->
  <header>

          <!--Menu superior navbar-->
          <div class="navbar-fixed" >
              <nav class="blue">
                  <div class="nav-wrapper">
                      <a href="#" data-target="slide-out" class="sidenav-trigger"><i class="material-icons ">menu</i></a>
                
                
                      <!-- Logo principal -->
                      <a href="{{ url('/home')}}" class="brand-logo left logo-adjust">
                          <img  class="responsive-img img-logo" src="{{asset('plugins/materialize_index/img/btc.png')}}" width="120px;" height="50px;">
                      </a>
                      <!-- End logo principal -->
                    
                    
          
                  </div><!-- End nav-wrapper -->
              </nav><!-- End navbar-->
          </div><!-- End navbar-fixed -->

          <!--Menu lateral sidenav-->
          <ul id="slide-out" class="sidenav sidenav-fixed">

             <li><!--Seccion de usuario -->
                  <div class="user-view blue">
                      <div class="container">
                      
                              <a href="#"><img src="{{asset('sistem_images/DefaultUser.png')}}" alt="Avatar" class=" z-depth-3 responsive-img circle logo-container img-perfil"></a><!-- logo user -->
          
                      </div>

                      <div class="info-container">
                          <div class="name ">
                              <a class="white-text" href="#">
                                {{Auth::user()->name}}


                              </a>
                          </div>
                          
                      </div>
                  </div>
             </li><!--End seccion de usuario -->

             <li><a href="{{url('EditProfile')}}" class="waves-effect waves-blue"><i class="small material-icons">person</i>Mi Perfil</a></li>
             <li><div class="divider"></div></li>
             <li>
               <a href="{{url('/home')}}" class="waves-effect waves-blue">
                 <i class="small material-icons">view_carousel</i>
                 Panel principal
               </a>
                 
               </li>
             <li><a href="{{url('Wallets/Consolidado')}}" class="waves-effect waves-blue"><i class="small material-icons">account_balance_wallet</i>Wallets</a></li>
                
             <li><a href="{{url('Comercio/Pagar')}}" class="waves-effect waves-blue"><i class="small material-icons">attach_money</i>Pagar(Comercio)</a></li>
             <li><a href="{{url('Contacto/Transferir')}}" class="waves-effect waves-blue"><i class="small material-icons">keyboard_tab</i>Transferir(Contacto)</a></li>
             <li><a href="{{url('Nube/Recibir')}}" class="waves-effect waves-blue"><i class="small material-icons">send</i>Recibir</a></li>
             <li><a href="{{url('Nube/Enviar')}}" class="waves-effect waves-blue"><i class="small material-icons">send</i>Enviar(Nube)</a></li>
             <li><a href="{{url('Nube/Solicitar')}}" class="waves-effect waves-blue"><i class="small material-icons">format_list_bulleted</i>Solicitar(Nube)</a></li>
             <li><a href="{{url('Contacto')}}" class="waves-effect waves-blue"><i class="small material-icons">contacts
</i>Contactos</a></li>
             <li><a href="{{url('ActivityResent')}}" class="waves-effect waves-blue"><i class="small material-icons">local_activity</i>Actividad Reciente</a></li>

                
                  <li>
                      <a href="{{ url('/logout') }}" class="waves-effect waves-blue " onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="small material-icons">power_settings_new</i>Salir</a></a>
                      <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                          {{ csrf_field() }}
                      </form>
                  </li>
           </ul><!--End sidenav-->

  </header>
      <!--header end-->

  <main>
      <section id="main-content" class="section section-daily-stats center">

          @if (session('error'))
                  <div class="alert alert-danger">{{ session('error') }}</div>
          @endif
          
          <div class="row">
              @yield('main')
          </div>
      </section>
  </main> <!-- End main -->

  <footer class="page-footer blue ">
      <div class="footer-copyright">
          <div class="container center">
              Sites &copy 2019. Todos los Derechos Reservados.
          </div>
      </div>
  </footer>


</body>
 <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
<!--<script src="{{asset('assets/js/jquery.js') }}"></script>-->

<!--Import jQuery before materialize.js-->
<script src="{{asset('plugins/materialize_adm/js/materialize.js') }}"></script>
<script src="{{asset('plugins/materialize_adm/js/init.js') }}"></script>

<!--Import Chart js https://www.chartjs.org/docs/latest/charts/doughnut.html-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.4.0/Chart.min.js"></script>

<script src="{{asset('assets/js/jquery.scrollTo.min.js')}}"></script>
<script src="{{asset('assets/js/jquery.nicescroll.js')}}" type="text/javascript"></script>
<script src="{{asset('assets/js/jquery.sparkline.js')}}"></script>


<!--common script for all pages-->
<script src="{{asset('assets/js/common-scripts.js')}}"></script>

<script type="text/javascript" src="{{asset('assets/js/gritter/js/jquery.gritter.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/js/gritter-conf.js')}}"></script>

<!--Plyr https://plyr.io/ -->
<script src="https://cdn.plyr.io/3.4.7/plyr.js"></script>
<!--Libreria sweetalert-->
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="https://code.jquery.com/ui/1.9.2/jquery-ui.js"></script>

<!--Carousel Owl Galeria-->
<script src="{{ asset('plugins/owlcarousel/dist/owl.carousel.min.js')}}"></script>

<!--PDF.JS-->
<!--<script src="//mozilla.github.io/pdf.js/build/pdf.js"></script>-->




<script class="include" type="text/javascript" src="{{asset('assets/js/jquery.dcjqaccordion.2.7.js')}}"></script>


@yield('js')
</html>
