$(document).ready(function(){
    $("#btn-ingresar").click(function(e){
        validar_login();
    })

function validar_login(){
  var datos = {
    usuario : $("#correo").val(),
    clave   : $("#clave").val(),
  }
  var opciones = {
    url       : 'usuarios/getUsuario',
    type      : 'POST',
    data      : datos,
    dataType  : 'json',
    encode  : true
  }
  $.ajax(opciones)
    .done(function(respuesta){
      if(respuesta.length >0){
        alert("fierro");
        window.location.href = "index.php";
      }else {
        alert("Pinche panochon");
      }
    })
  }
  })
