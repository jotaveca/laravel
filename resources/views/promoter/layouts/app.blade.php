<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Dashboard">
    <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">

    <link rel="shortcut icon" href="{{ asset('favicon.ico') }}">

    <title>Sites</title>

    <!--Import Google Icon Font-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!--Import materialize.css-->
    <link href="{{ asset('plugins/materialize_adm/css/materialize.css') }}" type="text/css" rel="stylesheet" media="screen,projection"/>
    <link href="{{ asset('plugins/materialize_adm/css/style.css') }}" type="text/css" rel="stylesheet" media="screen,projection"/>
    <!--https://materialdesignicons.com/-->
    <link rel="stylesheet" href="//cdn.materialdesignicons.com/3.2.89/css/materialdesignicons.min.css">

  
    <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
 <!--Import materialize.css-->
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.7/css/materialize.min.css">
 
 <link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/jquery.dataTables.min.css">
 

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

    <style type="text/css"> 
                .iti-flag {background-image: url("{{asset('plugins/telefono/flags.png')}}");}

            @media only screen and (-webkit-min-device-pixel-ratio: 2), only screen and (min--moz-device-pixel-ratio: 2), only screen and (-o-min-device-pixel-ratio: 2 / 1), only screen and (min-device-pixel-ratio: 2), only screen and (min-resolution: 192dpi), only screen and (min-resolution: 2dppx) {
            .iti-flag {background-image: url("{{asset('plugins/telefono/flags2x.png')}}");}
        }

        .sidenav .user-view  {
         background-image: url('{{asset('assets/img/foto_perfil_backend.png')}}');
         /*background-image: url('{{asset("/plugins/materialize_adm/img/images2.jpg")}}');*/
     }
    </style> 
  </head>
  <body>
    
    <!-- 
    *******************************************************************************************************************
    TOP BAR CONTENT & NOTIFICATIONS
    *******************************************************************************************************************-->
  
    <header>
      <div class="navbar-fixed">
        <nav class="pink darken-4">
          <div class="nav-wrapper">
            <a href="#" data-target="slide-out" class="sidenav-trigger"><i class="material-icons">menu</i></a>
            <!-- Logo principal -->
            <a href="{{ url('/promoter_home')}}" class="brand-logo left logo-adjust">
            </a>
            <!-- Logo principal -->
            
          </div>
        </nav>
      </div>
      <!--
      *******************************************************************************************************************
      MAIN SIDEBAR MENU 
      *******************************************************************************************************************
      -->
      <!--sidebar start-->
      @include('promoter.layouts.partials.SideBar')
      <!--sidebar end-->
    </header>
    <!--main content star-->
    <main>
      <section id="main-content" class="section section-daily-stats center">
        <form id="logout-form" action="{{ url('/promoter_logout') }}" method="POST" style="display: none;">
          {{ csrf_field() }}
        </form>
        <div class="row">
          @yield('main')
        </div>
      </section>
    </main>
    <!--main content end-->
    {{--
    <!--Old main-->
    <section id="main-content">
      <section class="wrapper">
        <form id="logout-form" action="{{ url('/promoter_logout') }}" method="POST" style="display: none;">
          {{ csrf_field() }}
        </form>
        @yield('main')
      </section>
    </section>
    <!--Old main-->
    --}}
    <!--footer start-->
  
    <!--footer end-->
  
    <!-- js placed at the end of the document so the pages load faster -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.4.0/Chart.min.js"></script>
    <script src="{{asset('assets/js/jquery.js') }}"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.js" integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60=" crossorigin="anonymous"></script>
    <script src="{{ asset('plugins/telefono/intlTelInput.js') }}"></script>
    <script src="{{ asset('plugins/telefono/utils.js') }}"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="{{asset('assets/js/bootstrap.min.js') }}"></script>
    <script class="include" type="text/javascript" src="{{asset('assets/js/jquery.dcjqaccordion.2.7.js')}}"></script>
    <script src="{{asset('assets/js/jquery.scrollTo.min.js')}}"></script>
    <script src="{{asset('assets/js/jquery.nicescroll.js')}}" type="text/javascript"></script>
    <script src="{{asset('assets/js/jquery.sparkline.js')}}"></script>
    <script src="{{ asset('plugins/upload/jquery.uploadPreview.js') }}"></script>

    <!--common script for all pages-->
    <script src="{{asset('assets/js/common-scripts.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/js/gritter/js/jquery.gritter.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/js/gritter-conf.js')}}"></script>

    <!--script for this page-->
    <script src="{{asset('assets/js/sparkline-chart.js')}}"></script>
    <script src="{{asset('assets/js/zabuto_calendar.js')}}"></script>
    <script src="//cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.18/r-2.2.2/datatables.min.js"></script>
    <!--Import jQuery before materialize.js-->
    <script src="{{asset('plugins/materialize_adm/js/materialize.js') }}"></script>
    <script src="{{asset('plugins/materialize_adm/js/init.js') }}"></script>

    <!--SCRIPS JS-->
    <script type="application/javascript">
      $(document).ready(function () {
        $("#date-popover").popover({html: true, trigger: "manual"});
        $("#date-popover").hide();
        $("#date-popover").click(function (e) {
          $(this).hide();
        });

        $("#my-calendar").zabuto_calendar({
          action: function () {
            return myDateFunction(this.id, false);
          },
          action_nav: function () {
            return myNavFunction(this.id);
          },
          ajax: {
            url: "show_data.php?action=1",
            modal: true
          },
          legend: [
            {type: "text", label: "Special event", badge: "00"},
            {type: "block", label: "Regular event", }
          ]
        });
      });

      function myNavFunction(id) {
        $("#date-popover").hide();
        var nav = $("#" + id).data("navigation");
        var to = $("#" + id).data("to");
        console.log('nav ' + nav + ' to: ' + to.month + '/' + to.year);
      }

      function yesnoCheck() {
        if (document.getElementById('option-2').checked) {
          $('#if_no').show();
          $('#razon').attr('required','required');
        } else {
          $('#if_no').hide();
          $('#razon').val('');
          $('#razon').removeAttr('required');
        }
      }

      
    </script>
    @yield('js')
  </body>
</html>

