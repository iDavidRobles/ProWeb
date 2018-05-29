<?php
	/*-------------------------
	Autor: Obed Alvarado
	Web: obedalvarado.pw
	Mail: info@obedalvarado.pw
	---------------------------*/
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Cotizacion</title>
   <!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
	<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.2/css/select2.min.css" rel="stylesheet" />
	<link rel=icon href='pedidos\img\shopping-cart-icon-2-24-227182.png' type="image/png">
  </head>
  <body>



    <div class="container">
		  <div class="row-fluid">

			<div class="col-md-12">
			<h2><span class="glyphicon glyphicon-shopping-cart"></span> Cotizacion</h2>
			<hr>
      <button type="submit" class="btn btn-default">
        <span  class="glyphicon glyphicon-arrow-left" ></span> Volver
      </button>
			<form class="form-horizontal" role="form" id="datos_pedido">
				<div class="row">
					<div class="col-md-4">
						<label for="comentarios" class="control-label">Comentarios</label>
						<input type="text" class="form-control input-sm" id="comentarios" placeholder="Comentarios o instruciones especiales">
					</div>
				</div>


				<hr>
				<div class="col-md-12">
					<div class="pull-right">
						<button type="button" class="btn btn-info" data-toggle="modal" data-target="#myModal">
						 <span class="glyphicon glyphicon-plus"></span> Agregar productos
						</button>
						<button type="submit" class="btn btn-default">
						  <span class="glyphicon glyphicon-print"></span> Imprimir
						</button>
            <button type="button" class="btn btn-pago" data-toggle="modal" data-target="#myModal-2">
						 <span class="glyphicon glyphicon-credit-card"></span> Pago
						</button>
					</div>
			</form>
			<br><br>
		<div id="resultados" class='col-md-12'></div><!-- Carga los datos ajax -->

			<!-- Modal seleccion de productos -->
			<div class="modal fade bs-example-modal-lg" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
			  <div class="modal-dialog modal-lg" role="document">
				<div class="modal-content">
				  <div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title" id="myModalLabel">Buscar productos</h4>
				  </div>
				  <div class="modal-body">
					<form class="form-horizontal">
					  <div class="form-group">
						<div class="col-sm-6">
						  <input type="text" class="form-control" id="q" placeholder="Buscar productos" onkeyup="load(1)">
						</div>
						<button type="button" class="btn btn-default" onclick="load(1)"><span class='glyphicon glyphicon-search'></span> Buscar</button>
					  </div>
					</form>
					<div id="loader" style="position: absolute;	text-align: center;	top: 55px;	width: 100%;display:none;"></div><!-- Carga gif animado -->
					<div class="outer_div" ></div><!-- Datos ajax Final -->
				  </div>
				  <div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>

				  </div>
				</div>
			  </div>
			</div>

      <!-- Modal Pago de Productos-->
      <div class="modal fade bs-example-modal-lg" id="myModal-2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog modal-sl" role="document">
          <div class="modal-content">
            <div class="modal-header">
  					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  					<h4 class="modal-title" id="myModalLabel">Formato de Pago</h4>
  				  </div>
            <div class="modal-body">
            <div class="form-group col-md-9">
              <label for="exampleInputEmail1">Tarjeta</label>
              <input type="numer" class="form-control" id="tarjeta" aria-describedby="emailHelp" placeholder="Numero de Tarjeta">
            </div>
            <div class="form-group col-md-9">
              <label for="exampleInputEmail1">NIP</label>
              <input type="numer"  class="form-control" id="nip" aria-describedby="emailHelp" placeholder="CVV">
            </div>
            <div class="form-group col-md-9">
              <label for="exampleInputEmail1">Total</label>
              <input type="number" class="form-control" id="total" aria-describedby="emailHelp" placeholder="Total a Pagar">
            </div>
            <div class="form-group">
              <label for="exampleInputEmail1"></label>
              <input type="hidden" value="0000000001" class="form-control" id="destino" aria-describedby="emailHelp" placeholder="Numero de Tarjeta Destino">
            </div>
            <div class="modal-footer">
  					<button type="button" class="btn btn-default" data-dismiss="modal">Aceptar</button>

  				  </div>
          </div>
          </div>
        </div>
      </div>
			</div>
		 </div>
	</div>

   <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	<!-- Latest compiled and minified JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
	<script type="text/javascript" src="js/VentanaCentrada.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.2/js/select2.min.js"></script>
	<script>
		$(document).ready(function(){
			load(1);
		});

		function load(page){
			var q= $("#q").val();
			var parametros={"action":"ajax","page":page,"q":q};
			$("#loader").fadeIn('slow');
			$.ajax({
				url:'./ajax/productos_pedido.php',
				data: parametros,
				 beforeSend: function(objeto){
				 $('#loader').html('<img src="./img/ajax-loader.gif"> Cargando...');
			  },
				success:function(data){
					$(".outer_div").html(data).fadeIn('slow');
					$('#loader').html('');

				}
			})
		}
	</script>
	<script>
	function agregar (id)
		{
			var precio_venta=$('#precio_venta_'+id).val();
			var cantidad=$('#cantidad_'+id).val();
			//Inicia validacion
			if (isNaN(cantidad))
			{
			alert('Esto no es un numero');
			document.getElementById('cantidad_'+id).focus();
			return false;
			}
			if (isNaN(precio_venta))
			{
			alert('Esto no es un numero');
			document.getElementById('precio_venta_'+id).focus();
			return false;
			}
			//Fin validacion
		var parametros={"id":id,"precio_venta":precio_venta,"cantidad":cantidad};
		$.ajax({
        type: "POST",
        url: "./ajax/agregar_pedido.php",
        data: parametros,
		 beforeSend: function(objeto){
			$("#resultados").html("Mensaje: Cargando...");
		  },
        success: function(datos){
		$("#resultados").html(datos);
		}
			});
		}

			function eliminar (id)
		{

			$.ajax({
        type: "GET",
        url: "./ajax/agregar_pedido.php",
        data: "id="+id,
		 beforeSend: function(objeto){
			$("#resultados").html("Mensaje: Cargando...");
		  },
        success: function(datos){
		$("#resultados").html(datos);
		}
			});

		}

		$("#datos_pedido").submit(function(){
		  var proveedor = $("#proveedor").val();
		  var transporte = $("#transporte").val();
		  var condiciones = $("#condiciones").val();
		  var comentarios = $("#comentarios").val();
			VentanaCentrada('./pdf/documentos/pedido_pdf.php?proveedor='+proveedor+'&transporte='+transporte+'&condiciones='+condiciones+'&comentarios='+comentarios,'Pedido','','1024','768','true');
	 	});
	</script>
  </body>
</html>
