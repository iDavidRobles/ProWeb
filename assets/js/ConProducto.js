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
      card='<div class="card">'+
      '<img class="card-img-top" src="/assets/imagenes/bloque2.png" alt="Card image cap">'+
        '<div class="card-body">'+
          '<h5 class="card-title">'+value.nombre_producto+'</h5>'+
        '  <p class="card-text">'+value.precio_producto+'</p>'+
      '  </div>'+
        '<div class="card-footer">'+
        ' <small class="text-muted">Last updated 3 mins ago</small>'+
      '  </div>'+
    '  </div>'




    $("#allprod").append(card)
    })

  })

});
