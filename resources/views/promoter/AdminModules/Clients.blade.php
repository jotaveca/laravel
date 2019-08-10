@extends('promoter.layouts.app')
@section('css')
  <style>
    .curvaBoton{border-radius: 20px;}
  </style>
@endsection
@section('main')
  <span class="card-title grey-text"><h3>Usuarios</h3></span>
  
      <table id="example" class=" table-responsive display highlight" cellspacing="0" width="100%">
        <thead>
          <tr>
            <th><i class="material-icons"></i>Nombre de usuario</th>
            <th><i class="material-icons"></i>Contraseña</th>
            <th><i class="material-icons"></i>Correo Electronico</th>
            <th><i class="material-icons"></i>Nombres y apellidos</th>
            <th><i class="material-icons"></i>Wallet(qr)</th>

            <th><i class="material-icons"></i>Opciones</th>
          </tr>
        </thead>
        <tbody id="clientes">
          
        
        </tbody>
      </table>
  
  @include('promoter.modals.ClientViewModal')
@endsection

@section('js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/bluebird/1.2.2/bluebird.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js"></script>
<script src="{{ asset('js/jquery.mlens-1.7.min.js') }}"></script>





<script >
$(document).ready(function() {
  
  setClient();
  
} ); 

</script>

<script type="text/javascript">
function setClient() {
  $("#clientes").empty();
  var ruta = "{{url('AllClientsDataTable')}}";
  
  var gif = "{{ asset('/sistem_images/loading.gif') }}";
  swal({
    title: "Procesando la información",
    text: "Espere mientras se procesa la información.",
    icon: gif,
    buttons: false,
    closeOnEsc: false,
    closeOnClickOutside: false
  });
  $.ajax({
    url: ruta,
    type:'GET',
    dataType: "json",
    success: function (data) {
      swal.close();
      console.log(data);
      $.each(data,function(i,info) {
        
        if(info.last_name != null ){
          var nombreCompleto = info.name+" "+info.last_name;

        }
        else{
          var nombreCompleto = info.name;
        }
      
        var estatus = "<a class='btn red lighten-1 curvaBoton modal-trigger' value="+info.id+" href='#modal2' id='Eliminar'> <i class='material-icons'>clear</i></a>";
        var masInfo = "<a class='btn blue lighten-1 modal-trigger curvaBoton' value="+info.id+" href='#modal1' id='modificar'><i class='material-icons'>edit</i></a>"
        var opciones = estatus+""+masInfo;
      
        var filas = "<tr><td>"+
       info.username+"</td><td>"+
        info.password+"</td><td>"+
        info.email+"</td><td>"+
        nombreCompleto+"</td><td>"+
        info.wallet_qr+"</td><td>"+
        opciones+"</td></tr>";
        $("#clientes").append(filas);
      });
      
      $('#example').DataTable({
        "language": {
                      "sProcessing":     "Procesando...",
                      "sLengthMenu":     "Mostrar _MENU_ registros",
                      "sZeroRecords":    "No se encontraron resultados",
                      "sEmptyTable":     "Ningún dato disponible en esta tabla",
                      "sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
                      "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0 registros",
                      "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
                      "sInfoPostFix":    "",
                      "sSearch":         "Buscar:",
                      "sUrl":            "",
                      "sInfoThousands":  ",",
                      "sLoadingRecords": "Cargando...",
                      "oPaginate": {
                          "sFirst":    "Primero",
                          "sLast":     "Último",
                          "sNext":     "Siguiente",
                          "sPrevious": "Anterior"
                      },
                      "oAria": {
                          "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
                          "sSortDescending": ": Activar para ordenar la columna de manera descendente"
                      }
                  }
      });
      $('.materialboxed').materialbox();
    },
    error:function(data) {
      swal('Existe un error en su solicitud','','error')
      .then((recarga) => {
        location.reload();
      });
      console.log(data);
    }
  });
}
</script>

<script type="text/javascript">
  
$(document).on('click', '#Eliminar', function() {
  var x = $(this).attr('value');
  $( "#formStatus" ).on( 'submit', function(e) {
    
    var url = "{{url('DeleteAccount/')}}/"+x;
  
    e.preventDefault();
    var gif = "{{ asset('/sistem_images/loading.gif') }}";
    swal({
        title: "Procesando la información",
        text: "Espere mientras se procesa la información.",
        icon: gif,
        buttons: false,
        closeOnEsc: false,
        closeOnClickOutside: false
    });
    $.ajax({
      url: url,
      type: 'get',
      data: {
        _token: $('input[name=_token]').val(),
      }, 
      success: function (result) {
        $('#modal2').toggle();
        $('.modal-backdrop').remove();
        swal("Se ha eliminado con éxito","","success")
        .then((recarga) => {
          location.reload();
        });
      },
      error: function (result) {
        swal('Existe un Error en su Solicitud','','error')
        .then((recarga) => {
          location.reload();
        });
        console.log(result);
      }
    }); 
  });
});


$(document).on('click', '#modificar', function() {
  var id = $(this).attr("value");
  console.log(id);
  var url = "{{ url('findUser') }}/"+id;
  $.ajax({
    url: url,
    type: 'get',
    dataType: 'json', 
    success: function (info) {
      console.log(info);
      
      $("#nombreC").val(info.name);
      $("#apellidoC").val(info.last_name);

      $("#emailC").val(info.email);
    
    
    },
    error: function (info) {
      console.log(info);
      swal('Existe un error en su solicitud','','error')
      .then((recarga) => {
        location.reload();
      });
    }
  });
});


$(document).on('click', '#modificar', function() {
  var x = $(this).attr('value');
  $( "#formEdit" ).on( 'submit', function(e) {
    
    var url = "{{url('update_user_admin')}}";
  
    e.preventDefault();
    var gif = "{{ asset('/sistem_images/loading.gif') }}";
    swal({
        title: "Procesando la información",
        text: "Espere mientras se procesa la información.",
        icon: gif,
        buttons: false,
        closeOnEsc: false,
        closeOnClickOutside: false
    });
    $.ajax({
      url: url,
      type: 'PUT',
      data: {
          id : x,
          name:   $("#nombreC").val(),
          last_name : $("#apellidoC").val(),
        _token: $('input[name=_token]').val(),
      }, 
      success: function (result) {
        $('#modal2').toggle();
        $('.modal-backdrop').remove();
        console.log(result);

        swal("Se ha modificado la información con exito","","success")
        .then((recarga) => {
          location.reload();
        });
      },
      error: function (result) {
        swal('Existe un Error en su Solicitud','','error')
        .then((recarga) => {
          location.reload();
        });
        console.log(result);
      }
    }); 
  });
});


</script>





@endsection