$(document).ready(function(){
    $("#btn-ingresar").click(function(e){
        validar_login();
    })
function validar_login(){
  var datos = {
    correo : $("#correo").val(),
    clave   : $("#clave").val(),
  }
  var opciones = {
    url       : '/usuarios/getUsuario',
    type      : 'POST',
    data      : datos,
    dataType  : 'json',
    encode  : true
  }
  $.ajax(opciones)
    .done(function(respuesta){
      if(respuesta.length >0){
        window.location.href = "/provweb/modulo/inicio.php";
      }else {
        alert("Error en los datos");
      }
    })
  }
  })
