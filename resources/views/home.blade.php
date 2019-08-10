@extends('layouts.app')
@section('css')


<link rel='stylesheet prefetch' href='https://cdnjs.cloudflare.com/ajax/libs/Swiper/3.3.1/css/swiper.min.css'>
<style>
    .owl-carousel.owl-drag .owl-item {
        padding-left: 2px ;
        padding-right: 2px;
    }

    .owl-nav {
        padding: 0px;
    }

    .owl-theme .owl-nav [class*='owl-'] {
        transition: all .3s ease;
    }
    .owl-theme .owl-nav [class*='owl-'].disabled:hover {
        background-color: #D6D6D6;
    }
    owl-theme {
        position: relative;
    }
    .owl-theme .owl-next, .owl-theme .owl-prev {
            width: 22px;
            height: 22px;
            position: absolute;
            top: 50%;
            transform: translateY(-125%)
        }
    .owl-theme .owl-prev {
            left: 10px;
        }
    .owl-theme .owl-next {
        right: 10px;
    }

</style>
@endsection



<!--main content start-->
@section('main')
<!-- ******************************************************************************************************************
MAIN CONTENT
********************************************************************************************************************-->
  <input type="hidden" name="id" id="id" value="{{Auth::user()->created_at}}">
  
  <div class="row">
    @if(Auth::user()->name==NULL || Auth::user()->last_name==NULL || Auth::user()->email==NULL  )
    <!-- COMPLETAR PERFIL PANELS -->
        <div class="col s12 m12">
            <div class="card">
                <div class="card-content grey-text">
                    <span class="card-title  blue-text"><h5><b><i class="material-icons">create</i> <h3 >Complete Su Registro para verificar su cuenta </h3></b></h5></span>
                    <p>Le recordamos que aun faltan documentos que adjuntar para disfrutar de todo lo que puede ofrecer nuestra plataforma, le invitamos completar su perfil.</p>
                </div>
                <div class="card-action ">
                    <a class="waves-effect waves-light btn curvaBoton blue-grey" href="{{url('EditProfile')}}"><i class="material-icons right">create</i>Completar Registro</a>
                </div>
            </div>
        </div>
        <br> <br>
    @endif
  </div>

@endsection
