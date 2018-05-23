$(document).ready(function($){

  $("#btnagregarproducto").click(function(e){


  var nombre=$("#nomprod").val();
  var medida=$("#medprod").val();
  var precio=$("#precio").val();
  var cantidad=$("#canprod").val();
  var imagen=$("imgprod").val();
  var datos={

    "nombre_producto":nombre,
    "unidad_medida_producto":medida,
    "precio_producto":precio,
    "cantidad":cantidad,
    "Imagen":imagen
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
    location.reload();
  })

})
});
