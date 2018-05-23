$(document).ready(function($){

  $("#btnagregarproducto").click(function(e){

  var codigo=$("#codprod").val();
  var nombre=$("#nomprod").val();
  var medida=$("#medprod").val();
  var precio=$("#precio").val();
  var cantidad=$("#canprod").val();
  var datos={
    "codigo_producto":codigo,
    "nombre_producto":nombre,
    "unidad_medida_producto":medida,
    "precio_producto":precio,
    "cantidad":cantidad
  }
  $.ajax({
          type    : 'POST',
          url     : '/productos/setProductos',
          data    : datos,
          dataType: 'json',
          encode  : true
    }
  ).done(function(respuesta){
    console.log(respuesta)
  })

})
});
