$(document).ready(function($){
  $("#btnagregarusuario").click(function(e){
  var correo=$("#correo").val();
  var contra=$("#contra").val();
  var datos={
    "correo":correo,
    "contra":contra
  }
  $.ajax({
          type    : 'POST',
          url     : '/usuarios/setUsuario',
          data    : datos,
          dataType: 'json',
          encode  : true
    }
  ).done(function(respuesta){
    console.log(respuesta)
  })
  e.preventDefault()
})
});
