  <ul id="slide-out" class="sidenav sidenav-fixed">
    <li>
      <div class="user-view darken-1">
        <div class="container">
           
                <a href="#"><img src="{{asset('sistem_images/DefaultUser.png')}}" alt="Avatar" class=" z-depth-3 responsive-img circle logo-container img-perfil"></a>
          
        </div>
        <div class="info-container">
          <div class="name">
            <a class="white-text" href="#">
              {{Auth::guard('Promoter')->user()->name_c}}
            </a>
            <br>
          
          </div>
        </div>
      </div>
    </li>
    <li>
      <a href="{{url('EditProfilePromoter')}}" class="waves-effect waves-blue">
        <i class="small material-icons">person</i>
        Mi Perfil
      </a>
    </li>
    <li><div class="divider"></div></li>
    <li>
      
    
    <ul class= "collapsible collapsible-accordion">
    <li>
      <a href="{{url('/promoter_home')}}" class="waves-effect waves-blue">
        <i class="small material-icons">view_carousel</i>
        Panel principal
        <span class="new badge orange darken-1 curvaBoton" data-badge-caption="" id="badgeContenido" style="display: none;"></span>
      </a>
        
      </li>
    </ul>
    
    
    </li>
    
    <li>
      
    
  <!--  <ul class= "collapsible collapsible-accordion">
    <li>
      <a href="{{url('/admin_clients')}}" class="waves-effect waves-blue">
      <i class="small material-icons">group</i>
        Usuarios
        <span class="new badge orange darken-1 curvaBoton" data-badge-caption="" id="badgeContenido" style="display: none;"></span>
      </a>
        
      </li>
    </ul> -->
    
    <li>
      <ul class= "collapsible collapsible-accordion">
        <li>
          <a href="javascript:;" class="collapsible-header waves-effect waves-blue">
            <i class="small material-icons">group</i>
            Usuarios
            <span class="new badge orange darken-1" data-badge-caption="" id="cliente" style="display: none; background-color: #d9534f;"></span>
            <i class="material-icons right">expand_more</i>
          </a>
          <div class="collapsible-body">
            <ul>
              <li>
                <a href="{{url('/admin_clients')}}" class="waves-effect waves-blue">
                  <i class="small material-icons">payment</i>
                  Usuarios
                  <span class="new badge orange darken-1" data-badge-caption="" id="badgePagosU" style="display: none; background-color: #d9534f;"></span>
                </a>
              </li>
              <li>
                <a href="{{url('/admin_verification_clients')}}" class="waves-effect waves-blue">
                  <i class="small material-icons">group_add</i>
                  Verificación Docs
                  <span class="new badge orange darken-1" data-badge-caption="" id="badgeSolicitudUsuario" style="display: none; background-color: #d9534f;"></span>
                </a>
              </li>
            </ul>
          </div>
        </li>
      </ul>
    </li>
    
    <ul class= "collapsible collapsible-accordion">
    <li>
      <a href="{{url('/admin_catalog_pos')}}" class="waves-effect waves-blue">
      <i class="small material-icons">folder_shared</i>
        Catalogo POS
        <span class="new badge orange darken-1 curvaBoton" data-badge-caption="" id="badgeContenido" style="display: none;"></span>
      </a>
        
      </li>
    </ul>
    
    
    
    
    <!-- Cerrar sesion -->
    <ul class="collapsible collapsible-accordion">
      <li>
        <a class="logout" href="{{ url('/promoter_logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
          <!--Cerrar Sesión-->
          <i class="left material-icons tooltipped" data-position='left' data-tooltip='Cerrar sesión'>power_settings_new</i>
          Salir
        </a>
      </li>
    </ul>
    <!-- Cerrar sesion -->
    
    </li>


  
  </ul>
