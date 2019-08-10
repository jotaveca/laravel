@extends('promoter.layouts.app')
@section('css')
  <style>
    .curvaBoton{border-radius: 20px;}
  </style>
@endsection
@section('main')
  <span class="card-title grey-text"><h3>Verificación C.I</h3></span>
  <div id="test1" class="col s12">
    <ul class="tabs tabs-fixed-width tab-demo z-depth-1">
      <li class="tab" id="pendientes"><a class="active" href="#clientesPendientes">Usuarios pendientes</a></li>
      <li class="tab" id="negados"><a href="#clientesNegados">Usuarios negados</a></li>
      <li class="tab" id="aprobados"><a href="#clientesAprobados">Usuarios aprobados</a></li>
    </ul>
    <div id="test1" class="col s12">
      <table class="responsive-table">
        <thead>
          <tr>
            <th><i class="material-icons"></i>Nombre</th>
            <th><i class="material-icons"></i>Imagen del Documento</th>
            <th><i class="material-icons"></i>Fecha de registro</th>
            <th><i class="material-icons"></i>Fecha de nacimiento</th>
            <th><i class="material-icons"></i>Opciones</th>
          </tr>
        </thead>
        <tbody id="clientes">
        </tbody>
      </table>
    </div>
  </div>

  @include('promoter.modals.ClientValidateViewModal')
@endsection

@section('js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/bluebird/1.2.2/bluebird.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js"></script>
<script src="{{ asset('js/jquery.mlens-1.7.min.js') }}"></script>
<script id="jsbin-javascript">
  
  function setClient(status) {
    $("#clientes").empty();
    var ruta = "";
    if (status==0) {
      ruta = "{{url('ClientsDataTable')}}";
    } else if (status==1) {
      ruta = "{{url('ClientsVerificatedDataTable')}}";
    } else if (status==2) {
      ruta = "{{url('RejectedClientsDataTable')}}";
    }
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
          var nombreCompleto = info.name;
        
          if (info.img_doc!=null) {

            var extensionesValidas = ".png, .gif, .jpeg, .jpg";
            var pdfExtencion = ".pdf";
            var pdf = "{{ asset('/sistem_images/pdf.png') }}";
            var img = info.img_doc;
            var extension = img.substring(img.lastIndexOf('.') + 1).toLowerCase();
            var extensionValida = extensionesValidas.indexOf(extension);

            if (extensionValida < 0) {

               var doc = "<a class='btn red curvaBoton' href='{!!asset('"+info.img_doc+"')!!}' id='pdf' target='_blank'>Ver PDF</a>";

            }

            else{
              var doc = "<img class='materialboxed' width='100' height='90' src='{!!asset('"+info.img_doc+"')!!}'";
                }   
          }

           else {
            var doc = "No tiene documento registrado";
          }
          var fecha = moment(info.created_at).format('DD/MM/YYYY');
          var naci = moment(info.fech_nac).format('DD/MM/YYYY');
          var estatus = "<a class='btn light-blue lighten-1 curvaBoton modal-trigger' value="+info.id+" href='#myModal' id='Status'>Cambiar estatus</a>";
          var masInfo = "<a class='btn light-blue lighten-1 modal-trigger curvaBoton' value="+info.id+" href='#ModalUser' id='user'>Más datos</a>"
          var opciones = estatus+"<br>"+masInfo;
          
          var filas = "<tr><td>"+
          nombreCompleto+"</td><td>"+
          doc+"</td><td>"+
          fecha+"</td><td>"+
          naci+"</td><td>"+
          opciones+"</td></tr>";
          $("#clientes").append(filas);
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

  $(document).ready(function(){

    setClient(0);

    $(document).on('click', '#pendientes', function() {
      setClient(0);
    });
    $(document).on('click', '#negados', function() {
      setClient(2);
    });
    $(document).on('click', '#aprobados', function() {
      setClient(1);
    });

  

    $(document).on('click', '#user', function() {
      var id = $(this).attr("value");
      console.log(id);
      var url = "{{ url('/infoUser/') }}/"+id;
      $.ajax({
        url: url,
        type: 'get',
        dataType: 'json', 
        success: function (info) {
          console.log(info);
          if (info.img_perf!=null) {  
            var perfilUsuario = "{{ asset('/') }}/"+info.img_perf;
            $("#perfilUsuario").attr('src',perfilUsuario);
          } else {
            $("#perfilUsuario").attr('src',"{{asset('plugins/img/sinPerfil.png')}}");
          }
          $("#nombreUsuario").text(info.name+" "+info.last_name);
          $("#correoUsuario").text(info.email);
          $("#codigoUsuario").text(info.codigo_postal);

          if (info.phone_work!=null) {
            $("#telefonoUsuario").text(info.phone_work);
          } else {
            $("#telefonoUsuario").text("No tiene teléfono registrado");
          }
          if (info.img_doc!=null) { 
            var imgRucUsuario = "{{ asset('/') }}/"+info.img_doc;
            $("#imgRucUsuario").show();
            $("#mensajeimgRucUsuario").hide();
            $("#imgRucUsuario").attr('src',imgRucUsuario);
          } else {
            $("#imgRucUsuario").hide();
            $("#mensajeimgRucUsuario").show();
            $("#mensajeimgRucUsuario").text("No tiene su imagen de documento registrada");
          }
        
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

    $(document).on('click', '#Status', function() {
      var x = $(this).attr('value');
      $( "#formStatus" ).on( 'submit', function(e) {
        var s=$("input[type='radio'][name=status]:checked").val();
        var message=$('#razon').val();
        var url = "{{url('ValidateUser/')}}/"+x;
        console.log(message);
        console.log(s);
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
          type: 'post',
          data: {
            _token: $('input[name=_token]').val(),
            status: s,
            message: message,
          }, 
          success: function (result) {
            $('#myModal').toggle();
            $('.modal-backdrop').remove();
            swal("Se ha "+s+" con éxito","","success")
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


    $(document).on('click', '#opt-2', function() {
      $('#if_no2').show();
      $('#razon2').attr('required','required');
    });
    $(document).on('click', '#opt-1', function() {
      $('#if_no2').hide();
      $('#razon2').val('');
      $('#razon2').removeAttr('required');
    });

    /*
    var ClientsDataTable = $('#Clients').DataTable({
          processing: true,
          serverSide: true,
            responsive: true,

          ajax: '{!! url('ClientsDataTable') !!}',
          columns: [
              {data: 'name', name: 'name'},
              {data: 'num_doc', name: 'num_doc'},
              {data: 'img_doc', name: 'img_doc',orderable: false, searchable: false},
              {data: 'fech_nac', name: 'fech_nac'},
              {data: 'type', name: 'type'},
              {data: 'created_at', name: 'created_at'},
              {data: 'webs', name: 'webs'},
              {data: 'Estatus', name: 'Estatus', orderable: false, searchable: false},
          ]
    });
    */

    // Modal de la imagen del documento
    $(document).on('click', '#file_b', function() {
      var x = $(this).val();
      var file = $("#photo"+x).attr("src");
      console.log(file);
      $("#ci_photo").attr("src", file);
      $("#ci_photo").attr("data-big", file);
      $("#ci_photo").mlens({
        imgSrc: $("#ci_photo").attr("data-big"),    // path of the hi-res version of the image
        imgSrc2x: $("#ci_photo").attr("data-big2x"),  // path of the hi-res @2x version of the image
                                                  //for retina displays (optional)
        lensShape: "square",                // shape of the lens (circle/square)
        lensSize: ["50%","50%"],            // lens dimensions (in px or in % with respect to image dimensions)
                                        // can be different for X and Y dimension
        borderSize: 5,                  // size of the lens border (in px)
        borderColor: "#666",            // color of the lens border (#hex)
        borderRadius: 10,                // border radius (optional, only if the shape is square)
        imgOverlay: $("#ci_photo").attr("data-overlay"), // path of the overlay image (optional)
        overlayAdapt: true,    // true if the overlay image has to adapt to the lens size (boolean)
        zoomLevel: 5,          // zoom level multiplicator (number)
        responsive: true       // true if mlens has to be responsive (boolean)
      });
    });
    // Modal de la imagen del documento

    $('#webModal').on('hidden.bs.modal', function () {
      WebsDataTable.destroy();
    });
    
    $(document).on('click', '#users_payments', function() {
      var PaymentsDataTable = $('#Payments').DataTable({
        processing: true,
        serverSide: true,
        responsive: true,
        ajax: '{!! url('DepsitDataTable') !!}',
          columns: [
            {data: 'user_id', name: 'user_id'},
            {data: 'value', name: 'value'},
            {data: 'tickets.name', name: 'tickets.name'},
            {data: 'total', name: 'total'},
            {data: 'voucher', name: 'voucher', orderable: false, searchable: false},
            {data: 'created_at', name: 'created_at'},
            {data: 'Estatus', name: 'Estatus', orderable: false, searchable: false}
          ]
      });
    });

    $(document).on('click', '#users', function() {
      PaymentsDataTable.destroy();
    });

    $(document).on('click', '#users_a', function() {
      var AllClientsDataTable = $('#ClientsAproved').DataTable({
        processing: true,
        serverSide: true,
        responsive: true,
        ajax: '{!! url('AllClientsDataTable') !!}',
          columns: [
              {data: 'name', name: 'name'},
              {data: 'num_doc', name: 'num_doc'},
              {data: 'img_doc', name: 'img_doc',orderable: false, searchable: false},
              {data: 'fech_nac', name: 'fech_nac'},
              {data: 'type', name: 'type'},
              {data: 'created_at', name: 'created_at'},
              {data: 'webs', name: 'webs'},
              {data: 'Estatus', name: 'Estatus', orderable: false, searchable: false}
          ]
      });

      $(document).on('click', '#users', function() {
        AllClientsDataTable.destroy();
      });

      $(document).on('click', '#users_d', function() {
        AllClientsDataTable.destroy();
      });

      $(document).on('click', '#users_payments', function() {
        AllClientsDataTable.destroy();
      });
    });

    $(document).on('click', '#users_d', function() {
      var DenialClientsDataTable = $('#ClientsDenials').DataTable({
        processing: true,
        serverSide: true,
        responsive: true,
        ajax: '{!! url('RejectedClientsDataTable') !!}',
          columns: [
            {data: 'name', name: 'name'},
            {data: 'num_doc', name: 'num_doc'},
            {data: 'img_doc', name: 'img_doc',orderable: false, searchable: false},
            {data: 'fech_nac', name: 'fech_nac'},
            {data: 'type', name: 'type'},
            {data: 'created_at', name: 'created_at'},
            {data: 'webs', name: 'webs'},
            {data: 'Estatus', name: 'Estatus', orderable: false, searchable: false}
          ]
        });

      $(document).on('click', '#users', function() {
        DenialClientsDataTable.destroy();
      });

      $(document).on('click', '#users_a', function() {
        DenialClientsDataTable.destroy();
      });

      $(document).on('click', '#users_payments', function() {
        DenialClientsDataTable.destroy();
      });
    });

  });
</script>
@endsection