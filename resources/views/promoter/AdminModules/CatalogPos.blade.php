@extends('promoter.layouts.app')
@section('css')
  <style>
    .curvaBoton{border-radius: 20px;}
  </style>
@endsection
@section('main')
  <span class="card-title grey-text"><h3>Catalogo POS</h3></span>
  
  
    <div class="row">
        <div class="col s9">
          
        </div>
        <div class="col s3">
          <a class='btn blue lighten-1 modal-trigger curvaBoton' href='#modal3'  id='agregar'><i class='material-icons'>edit</i> Agregar nuevo registro</a>
          
        </div>
    </div>
      <table id="example" class=" table-responsive display highlight" cellspacing="0" width="100%">
        <thead>
          <tr>
            <th><i class="material-icons"></i>id</th>
            <th><i class="material-icons"></i>Equipo de futbol</th>
            <th><i class="material-icons"></i>Numero Serial</th>
            <th><i class="material-icons"></i>Modelo</th>
            <th><i class="material-icons"></i>Status</th>

            <th><i class="material-icons"></i>Opciones</th>
          </tr>
        </thead>
        <tbody id="catalogo">
          
        
        </tbody>
      </table>
  
  @include('promoter.modals.CatalogViewModal')
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
  $("#catalogo").empty();
  var ruta = "{{url('AllCatalogPosDataTable')}}";
  
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
        
        var stat ;
        if(info.status == "unsigned")
        stat = "No asignado"; 
        else {
          stat ="Asignado";
        }
      
        var estatus = "<a class='btn red lighten-1 curvaBoton modal-trigger' value="+info.id+" href='#modal2' id='Eliminar'> <i class='material-icons'>clear</i></a>";
        var masInfo = "<a class='btn blue lighten-1 modal-trigger curvaBoton' value="+info.id+" href='#modal1' id='modificar'><i class='material-icons'>edit</i></a>"
        var opciones = estatus+""+masInfo;
      
        var filas = "<tr><td>"+
       info.id+"</td><td>"+
        info.equipo_futbol+"</td><td>"+
        info.num_serial+"</td><td>"+
        info.modelo+"</td><td>"+
        stat+"</td><td>"+
        opciones+"</td></tr>";
        $("#catalogo").append(filas);
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
    
    var url = "{{url('DeleteCatalog/')}}/"+x;
  
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
  var url = "{{ url('findCatalog') }}/"+id;
  $.ajax({
    url: url,
    type: 'get',
    dataType: 'json', 
    success: function (info) {
      console.log(info);
      
      
      $("#equipoF").val(info.equipo_futbol);
      $("#numeroS").val(info.num_serial);
      $("#modeloF").val(info.modelo);
      $("#statusE").val(info.status);
    
    
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
    
    var url = "{{url('update_catalog')}}";
    var stat ; 
    
    if($("#statusE").val() == 1)
    stat = "asignado";
    else{
      stat = "unsigned"; 
    }
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
          name_equipo:   $("#equipoF").val(),
          num_serial : $("#numeroS").val(),
          modelo:   $("#modeloF").val(),
          status :stat,
        _token: $('input[name=_token]').val(),
      }, 
      success: function (result) {
        $('#modal1').toggle();
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




$(document).on('click', '#agregar', function() {
  
  $( "#formAdd" ).on( 'submit', function(e) {
    stat = $("#statusAG").val(); 
    if(stat == 1)
      stat = "asignado"; 
      else {
        stat = "unsigned";
      }
    var url = "{{url('addCatalogPos')}}";
  
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
      type: 'POST',
      data: {
          name_equipo:   $("#equipoAG").val(),
          num_serial : $("#numeroAG").val(),
          modelo:   $("#modeloAG").val(),
          status : stat,
        _token: $('input[name=_token]').val(),
      }, 
      success: function (result) {
        $('#modal3').toggle();
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

<script type="text/javascript">
document.addEventListener('DOMContentLoaded', function() {
 var elems = document.querySelectorAll('select');
 var instances = M.FormSelect.init(elems, options);
});

// Or with jQuery

$(document).ready(function(){
 $('select').formSelect();
});
     
</script>



@endsection