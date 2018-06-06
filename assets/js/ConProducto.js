$(document).ready(function($){

  $.ajax({
          type    : 'POST',
          url     : '/productos/getProductos',
          data    : {},
          dataType: 'json',
          encode  : true
    }
  ).done(function(respuesta){

    $.each(respuesta,function(key,value){
      if (value.Imagen != "") {
        img=value.Imagen

      }else{
        img="null.png"
      }
      card='<tr>'+'<td>'+
      '<img class="card-img-top" src="/assets/imagenes/'+img+'" alt="Card image cap">'+'</td>'+
          '<td>'+value.nombre_producto+'</td>'+
          '<td>'+value.precio_producto+'</td>'+
          '<td>'+value.status_producto+'</td>'+
          '</tr>'
    $("#tabla").append(card)
    })

  })

});
