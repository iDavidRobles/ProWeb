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
      card='<div class="card">'+
      '<img class="card-img-top" src="/assets/imagenes/'+img+'" alt="Card image cap">'+
        '<div class="card-body">'+
          '<h5 class="card-title">'+value.nombre_producto+'</h5>'+
        '  <p class="card-text">'+"Costo: "+value.precio_producto+'</p>'+
      '  </div>'+
        '<div class="card-footer">'+
        ' <button type="button"  data-toggle="modal" data-target="#modaleditar" class="btn btn-primary btn-sm">Editar</button>'+
      '  </div>'+
    '  </div>'




    $("#allprod").append(card)
    })

  })

});
