

$('.loop').owlCarousel({
    center: true,
    items:2,
    loop:true,
    margin:10,
    responsive:{
        600:{
            items:4
        }
    }
});
$('.nonloop').owlCarousel({
    center: true,
    items:2,
    loop:false,
    margin:10,
    responsive:{
        600:{
            items:4
        }
    }
});

// Tabs
var elem = $('.tabs')
var options = {}
var instance = M.Tabs.init(elem, options);

//or Without Jquery


//var elem = document.querySelector('.tabs');
var options = {}
var instance = M.Tabs.init(elem, options);

document.addEventListener('DOMContentLoaded', function() {
    var elems = document.querySelectorAll('.parallax');
    var instances = M.Parallax.init(elems, options);
})
//Modal
document.addEventListener('DOMContentLoaded', function() {
    var elems = document.querySelectorAll('.modal');
    var instances = M.Modal.init(elems, options);
});


// Or with jQuery
// Slider
$(document).ready(function(){
    $('.tooltipped').tooltip();
    $('.modal').modal();
    $('select').formSelect();
    $('.parallax').parallax();
    $('.materialboxed').materialbox();
    $('.slider').slider({
        indicators: true
    });

    
    /*==========  Featured Cars  ==========*/
    $('#featured-cars').owlCarousel({
        loop: true,
        nav: false,
        dots: false,
        autoplay: true,
        navText: ['<i class="fa fa-angle-left"></i>','<i class="fa fa-angle-right"></i>'],
        responsive: {
            0: {
                items: 1
            },
            768: {
                items: 4
            },
            1200: {
                items: 5
            }
        }
    });
    $('#featured').owlCarousel({
        loop: true,
        nav: false,
        dots: false,
        autoplay: true,
        rtl:false,
        margin:10,
        navText: ['<i class="fa fa-angle-left"></i>','<i class="fa fa-angle-right"></i>'],
        responsive: {
            0: {
                items: 2
            },
            600: {
                items: 3
            },
            1000: {
                items: 6
            }
        }
    });

    $("#formR").on('submit',function(e){
        var url = "register";
        e.preventDefault();
        var gif = "sistem_images/loading.gif";
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
            data: $("#formR").serialize(),
            success: function (result) {
                console.log(result);
                swal("Se a enviado un correo de confirmación a su bandeja de entrada ","","success")
                    .then((recarga) => {
                        location.reload();
                    });
            },
            error: function (result) {
                console.log(result);
                swal('Existe un Error en su Solicitud','','error')
                    .then((recarga) => {
                        location.reload();
                    });
            }
        });
    });

});

function controltagNum(e) {
    tecla = (document.all) ? e.keyCode : e.which;
    if (tecla==8) return true; // para la tecla de retroseso
    else if (tecla==0||tecla==9)  return true; //<-- PARA EL TABULADOR-> su keyCode es 9 pero en tecla se esta transformando a 0 asi que porsiacaso los dos
    else if (tecla==13) return true;
    patron =/[0-9]/;// -> solo numeros
    te = String.fromCharCode(tecla);
    return patron.test(te);
}


$("#emailRU").on('keyup change',function(){
    var email_data = $("#emailRU").val();
    $.ajax({
        url: 'EmailValidate',
        type: 'POST',
        data:{
            _token: $('input[name=_token]').val(),
            'email':email_data,
        },
        success: function(result){
            if (result == 1)
            {
                $('#emailMenRU').hide();
                $('#registroRU').attr('disabled',false);
                return true;
            }
            else
            {
                $('#emailMenRU').show();
                $('#emailMenRU').text('Este email ya se encuentra regitrado');
                $('#emailMenRU').css('font-size','100%');
                $('#emailMenRU').css('color','red');
                $('#registroRU').attr('disabled',true);
                console.log(result);
            }
        }
    });
});


$("#login").on('keyup change',function(){
    var email_data = $("#login").val();
    
    $.ajax({
        url: 'EmailConfirmationValidate',
        type: 'POST',
        data:{
            _token: $('input[name=_token]').val(),
            'email':email_data,
        },
        success: function(result){
            if (result.confirmed == true || result == 1)
            {
                $('#emailMen').hide();
                $('#emailMen').attr('disabled',false);
                $("#password").prop('disabled', false);
                console.log(result);

                return true;
            }
            
            else
            {
          
                $('#emailMen').show();
                $('#emailMen').text('Este email o nombre de usuario ya se encuentra registrado y necesita confirmar correo electronico para continuar');
                $('#emailMen').css('font-size','100%');
                $('#emailMen').css('color','red');
                $('#emailMen').attr('disabled',true);
                $('#iniciar').attr('disabled',true);
                $("#password").prop('disabled', true);


                console.log(result);
            }
        }
    });
});

$(document).ready(function(){

    $('#passwordRU').keyup(function(evento){
        var password = $('#passwordRU').val().trim();
        
        if (password.length==0) {
            $('#passwordMenRU').show();
            $('#passwordMenRU').text('El campo no debe estar vacio');
            $('#passwordMenRU').css('color','red');
            $('#passwordMenRU').css('font-size','100%');
            $('#registroRU').attr('disabled',true);
        }
        if (password.length < 8) {
            $('#passwordMenRU').show();
            $('#passwordMenRU').text('La contaseña debe tener 8 caracteres');
            $('#passwordMenRU').css('color','red');
            $('#passwordMenRU').css('font-size','100%');
            $('#registroRU').attr('disabled',true);
        }
        else {
            $('#passwordMenRU').hide();
            var name = $('#name').val().trim();
            var email = $('#login').val().trim();
            var password1 = $('#password_confirm').val().trim();
            var valCorreo = $('#emailMenRU').is(':hidden');
            console.log(email.length !=0 && name.length  != 0 && password1.length !=0 && valCorreo);
            if ( email.length !=0 && name.length  != 0 && password1.length !=0 && valCorreo ){
                $('#registroRU').attr('disabled',false);
            }
        }
        //VERIFICA SI HAY ALGUN CARACTER ESPECIAL 
        var characterEspecial=".#*$+%&[@+^'_=¬<>;:¿?¡!()";
        if(tiene_caracter_especiales(password) != 1){
          $('#passwordMenRU').show();
          $('#passwordMenRU').text('La contraseña debe contener un caracter especial');
          $('#passwordMenRU').css('color','red');
          $('#passwordMenRU').css('font-size','100%');
          $('#registroRU').attr('disabled',true);
        }
        
        //VERIFICA SI CONTRASEÑA CONTIENE AL MENOS UN NUMERO 
        var numeros="0123456789";
        
        if(tiene_numeros(password) != 1 ){
          $('#passwordMenRU').show();
          $('#passwordMenRU').text('La contraseña debe contener al menos un numero');
          $('#passwordMenRU').css('color','red');
          $('#passwordMenRU').css('font-size','100%');
          $('#registroRU').attr('disabled',true);
        }
        
        //VERIFICA SI CONTRASEÑA TIENE AL MENOS UNA MINUSCULA 
        var letras="abcdefghyjklmnñopqrstuvwxyz";

        if(tiene_minusculas(password) != 1){
          $('#passwordMenRU').show();
          $('#passwordMenRU').text('La contraseña debe contener al menos una letra minuscula');
          $('#passwordMenRU').css('color','red');
          $('#passwordMenRU').css('font-size','100%');
          $('#registroRU').attr('disabled',true);
        }
                
        //VERIFICA SI TIENE AL MENOS ALGUNA MAYUSCULA
        var letras_mayusculas="ABCDEFGHYJKLMNÑOPQRSTUVWXYZ";

        if(tiene_mayusculas(password) != 1){
          $('#passwordMenRU').show();
          $('#passwordMenRU').text('La contraseña debe contener al menos una letra mayuscula');
          $('#passwordMenRU').css('color','red');
          $('#passwordMenRU').css('font-size','100%');
          $('#registroRU').attr('disabled',true);
        }
      

function tiene_numeros(texto){
   for(i=0; i<texto.length; i++){
      if (numeros.indexOf(texto.charAt(i),0)!=-1){
         return 1;
      }
   }
   return 0;
}


function tiene_minusculas(texto){
   for(i=0; i<texto.length; i++){
      if (letras.indexOf(texto.charAt(i),0)!=-1){
         return 1;
      }
   }
   return 0;
}

function tiene_mayusculas(texto){
   for(i=0; i<texto.length; i++){
      if (letras_mayusculas.indexOf(texto.charAt(i),0)!=-1){
         return 1;
      }
   }
   return 0;
}

function tiene_caracter_especiales(texto){
  for(i=0; i<texto.length; i++){
     if (characterEspecial.indexOf(texto.charAt(i),0)!=-1){
        return 1;
     }
  }
  return 0;

}



    });
});
$(document).ready(function(){

    $('#password_confirm').keyup(function(evento){
        var password = $('#password_confirm').val().trim();

        if (password.length==0) {
            $('#passwordCMenRU').show();
            $('#passwordCMenRU').text('El campo no debe estar vacio');
            $('#passwordCMenRU').css('color','red');
            $('#passwordCMenRU').css('font-size','60%');
            $('#registroRU').attr('disabled',true);
        } else {
            $('#passwordMenRU').hide();
            var name = $('#name').val().trim();
            var email = $('#emailRU').val().trim();
            var password1 = $('#passwordRU').val().trim();
            var valCorreo = $('#emailMenRU').is(':hidden');
            if (email.length !=0 && name.length  != 0 && password1.length !=0 && valCorreo){
                $('#registroRU').attr('disabled',false);
            }
        }
    });
});
$(document).ready(function(){

    $('#password_confirm').keyup(function(evento){
        var password1 = $('#passwordRU').val();
        var password = $('#password_confirm').val();

        if (password != password1) {
            $('#passwordCMenRU').show();
            $('#passwordCMenRU').text('Ambas contraseña deben coincidir');
            $('#passwordCMenRU').css('color','red');
            $('#passwordCMenRU').css('font-size','60%');
            $('#registroRU').attr('disabled',true);
        } else {
            $('#passwordCMenRU').hide();
            var name = $('#name').val().trim();
            var email = $('#emailRU').val().trim();
            var valCorreo = $('#emailMenRU').is(':hidden');
            if (email.length !=0 && name.length  != 0 && password1.length !=0 && password.length !=0 && valCorreo){
                $('#registroRU').attr('disabled',false);
            }
        }
    });
});
//---------VALIDACION PARA SOLO INTRODUCIR LETRAS---------------
function controltagLet(e) {
    tecla = (document.all) ? e.keyCode : e.which;
    if (tecla==8) return true; // para la tecla de retroseso
    else if (tecla==0||tecla==9)  return true; //<-- PARA EL TABULADOR-> su keyCode es 9 pero en tecla se esta transformando a 0 asi que porsiacaso los dos
    else if (tecla==13) return true;
    patron =/[AaÁáBbCcDdEeÉéFfGgHhIiÍíJjKkLlMmNnÑñOoÓóPpQqRrSsTtUuÚúVvWwXxYyZz+\s]/;// -> solo letras
    te = String.fromCharCode(tecla);
    return patron.test(te);
}
//---------BLOQUEAR BOTON 1----------------------
$(document).ready(function(){
    var name = $('#name').val().trim();
    var email = $('#login').val().trim();
    var password = $('#password').val().trim();
    var password1 = $('#password_confirm').val().trim();

    if (email.length==0 || name.length ==0 || password.length == 0 || password1.length==0){
        $('#registroRU').attr('disabled',true);
    }
});
$(document).ready(function(){
    var name = $('#name').val().trim();
    var email = $('#login').val().trim();
    var password = $('#password').val().trim();
    var password1 = $('#password_confirm').val().trim();

    if (email.length !=0 && name.length  != 0 && password1.length !=0 && password.length !=0){
        $('#registroRU').attr('disabled',false);
    }
});
$(document).ready(function(){
    $('#name').keyup(function(evento){
        var name = $('#name').val().trim();
        console.log(name.length);
        if (name.length==0) {
            $('#nameMen').show();
            $('#nameMen').text('Campo obligatorio');
            $('#nameMen').css('color','red');
            $('#nameMen').css('font-size','60%');
            $('#registroRU').attr('disabled',true);
        }
        if (name.length < 3) {
            $('#nameMen').show();
            $('#nameMen').text('Minimo 3 caracteres');
            $('#nameMen').css('color','red');
            $('#nameMen').css('font-size','60%');
            $('#registroRU').attr('disabled',true);
        }else {
            $('#nameMen').hide();
            var email = $('#login').val().trim();
            var password = $('#password').val().trim();
            var password1 = $('#password_confirm').val().trim();
            var valCorreo = $('#emailMenRU').is(':hidden');
            if (email.length !=0 && password.length  != 0 && password1.length !=0 && valCorreo) {
                $('#registroRU').attr('disabled',false);
            }
        }
    });
});


//---------------------------------------------------------------------------------------------------


//---------VALIDACION DE FORMATO DE CORREO-----------------------------------
$(document).ready(function(){
    $('#email').keyup(function(evento){
        var email = $('#login').val();
        var caract = new RegExp(/^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/);

        if (caract.test(email) == false){

            $('#emailMen').show();
            $('#emailMen').text('Formato email incorrecto');
            $('#emailMen').css('color','red');
            $('#emailMen').css('font-size','100%');
            $('#iniciar').attr('disabled',true);
            $('#iniciar').css('background-color','')

        }else{

            $('#emailMen').hide();
            $('#iniciar').attr('disabled',false);
            return true;
        }
    });
});
//---------VALIDACION PARA QUE EL CAMPO PASSWORD NO ESTE VACIO---------------
$(document).ready(function(){

    $('#password').keyup(function(evento){
        var password = $('#password').val().trim();
  
      if (password.length==0){
            $('#passwordMen').show();
            $('#passwordMen').text('El campo no debe estar vacio');
            $('#passwordMen').css('color','red');
            $('#passwordMen').css('font-size','60%');
            $('#iniciar').attr('disabled',true);
        } else {
            $('#passwordMen').hide();
            $('#iniciar').attr('disabled',false);
        }
        var email = $('#login').val().trim();
        if (email.length !=0 && password.length !=0 ){
            $('#iniciar').attr('disabled',false);
        }
    });
});


//Muestra contraseña 
$(".toggle-password").click(function() {

  $(this).toggleClass("fa-eye fa-eye-slash");
  var input = $('#passwordRU');
  if (input.attr("type") == "password") {
    input.attr("type", "text");
  } else {
    input.attr("type", "password");
  }
});

  
