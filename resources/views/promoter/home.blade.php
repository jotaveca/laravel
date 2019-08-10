@extends('promoter.layouts.app')
  @section('main')
  @include('flash::message')

<style media="screen">

.my-flex{

min-height: 360px;
}
</style>

    <span class="card-title grey-text"><h3>Panel principal</h3></span>
    <div class="col s12 m6 l3">
      <div class="card pink darken-3 darken-3 hoverable">
        <div class="card-content white-text">
          <span class="card-title">Usuarios</span>
            <i class="large material-icons">group</i>          <h4>
          </h4>
        </div>
        <div class="card-action">
          <a href="{{url('admin_clients')}}" class="btn btn-primary indigo">Revisar</a>
        </div>
      </div>
    </div>
    
                  
@endsection
@section('js')
  <script>
    $(document).ready(function(){
      $('.tooltipped').tooltip();
      $('.modal').modal();
    });

  

</script>
@endsection
