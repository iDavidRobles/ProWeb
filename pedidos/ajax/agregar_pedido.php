<?php

session_start();
$session_id= session_id();
if (isset($_POST['id'])){$id=$_POST['id'];}
if (isset($_POST['cantidad'])){$cantidad=$_POST['cantidad'];}
if (isset($_POST['precio_venta'])){$precio_venta=$_POST['precio_venta'];}

	/* Connect To Database*/
	require_once ("../config/db.php");//Contiene las variables de configuracion para conectar a la base de datos
	require_once ("../config/conexion.php");//Contiene funcion que conecta a la base de datos

if (!empty($id) and !empty($cantidad) and !empty($precio_venta))
{
$insert_tmp=mysqli_query($con, "INSERT INTO tmp (id_producto,cantidad_tmp,precio_tmp,session_id) VALUES ('$id','$cantidad','$precio_venta','$session_id')");

}
if (isset($_GET['id']))//codigo elimina un elemento del array
{
	$id=intval($_GET['id']);
$delete=mysqli_query($con, "DELETE FROM tmp WHERE id_tmp='".$id."'");
}

?>
<table class="table">
<tr>
	<th>CANT.</th>
	<th>DESCRIPCION</th>
	<th><span class="pull-right">PRECIO UNIT.</span></th>
	<th><span class="pull-right">PRECIO TOTAL</span></th>
	<th><span class"pull-right">ESTATUS</th>
	<th></th>
</tr>
<?php
	$sumador_total=0;
	$sql=mysqli_query($con, "select * from productos, tmp where productos.id_producto=tmp.id_producto and tmp.session_id='".$session_id."'");
	while ($row=mysqli_fetch_array($sql))
	{
	$id_tmp=$row["id_tmp"];
	$cantidad=$row['cantidad_tmp'];
	$nombre_producto=$row['nombre_producto'];
	$id_marca_producto=$row['id_marca_producto'];
	$status=$row['status_producto'];
	$precio_venta=$row['precio_tmp'];
	$precio_venta_f=number_format($precio_venta,2);//Formateo variables
	$precio_venta_r=str_replace(",","",$precio_venta_f);//Reemplazo las comas
	$precio_total=$precio_venta_r*$cantidad;
	$precio_total_f=number_format($precio_total,2);//Precio total formateado
	$precio_total_r=str_replace(",","",$precio_total_f);//Reemplazo las comas
	$sumador_total+=$precio_total_r;//Sumador
		?>
		<tr>
			<?php
			 ?>
			<td><?php echo $cantidad;?></td>
			<td><?php echo $nombre_producto;?></td>
			<td><span class="pull-right"><?php echo $precio_venta_f;?></span></td>
			<td><span class="pull-right"><?php echo $precio_total_f;?></span></td>
			<td><span class="pull-right"><?php echo $status; ?><span></td>
			<td ><span class="pull-right"><a href="#" onclick="eliminar('<?php echo $id_tmp ?>')"><i class="glyphicon glyphicon-trash"></i></a></span></td>
		</tr>
		<?php
	}

?>
<tr>
	<td colspan=4><span class="pull-right">TOTAL $</span></td>
	<td><span class="pull-right"><?php echo number_format($sumador_total,2);?></span></td>
	<td>
		<button type="button" class="btn btn-pago" data-toggle="modal" data-target="#myModal-2">
		 <span class="glyphicon glyphicon-credit-card"></span> Pago
		</button>
	</td>
</tr>
</table>

<!-- Modal Pago de Productos-->
<div class="modal fade bs-example-modal-lg" id="myModal-2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	<div id="lacompra" class="modal-dialog modal-sl" role="document">
		<div class="modal-content">
			<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			<h4 class="modal-title" id="myModalLabel">Formato de Pago</h4>
			</div>
			<div id="modalcompra"class="modal-body" >
				<div class="form-group col-md-9">
					<label for="exampleInputEmail1">Titular</label>
					<input type="numer" class="form-control" id="Titular" aria-describedby="emailHelp" placeholder="Titular">
				</div>
			<div class="form-group col-md-9">
				<label for="exampleInputEmail1">Tarjeta</label>
				<input type="numer" class="form-control" id="tarjeta" aria-describedby="emailHelp" placeholder="Numero de Tarjeta"onkeypress="return valida(event)">
			</div>
			<div class="form-group col-md-9">
				<label for="exampleInputEmail1">NIP</label>
				<input type="numer"  class="form-control" id="nip" aria-describedby="emailHelp" placeholder="CVV" onkeypress="return valida(event)">
			</div>
			<div class="form-group col-md-9">
				<label  for="exampleInputEmail1">Total</label>
				<input type="number" class="form-control" id="total" aria-describedby="emailHelp" placeholder="<?php echo number_format($sumador_total,2);?>"onkeypress="return valida(event)"></div>
			<div class="form-group">
				<label for="exampleInputEmail1"></label>
				<input type="hidden" value="0000000001" class="form-control" id="destino" aria-describedby="emailHelp" placeholder="Numero de Tarjeta Destino">
			</div>
			<button id="boton-pagar" type="button" class="btn btn-default">Pagar</button>
		</div>
		</div>
	</div>
</div>
<div id="myModalExito"class="modal" tabindex="-1" role="dialog">
	<br>
	<br>
	<br>
	<br>
<div class="modal-dialog" role="document">
<div class="modal-content">
<div class="modal-header">

<button type="button" class="close" data-dismiss="modal" aria-label="Close">
	<span aria-hidden="true">&times;</span>
</button>
</div>
<div class="modal-body">
	<div class="alert alert-success" role="alert">
	  <strong>Transaccion realizada con exito</strong>
	</div>
</div>
<div class="modal-footer">
<button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
<button  type="submit" class="btn btn-default">
	<span class="glyphicon glyphicon-print">
	</span> Compronte de pago
</button>
</div>
</div>
</div>
</div>
<div id="MyModalError"class="modal" tabindex="-1" role="dialog">
	<br>
	<br>
	<br>
	<br>
	<div class="modal-dialog" role="document">
	<div class="modal-content">
	<div class="modal-header">
	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
		 <span aria-hidden="true">&times;</span>
	 </button>
	</div>
	<div class="modal-body">
		<div class="alert alert-danger" role="alert">
		  <strong>Error en el pago</strong> Verifique sus datos o contacte a su banco para mas informacion.
	</div>
	</div>
	</div>
</div>

<script type="text/javascript" >
$(document).ready(function($){
	$("#boton-pagar").click(function(e){
						alert("simon")
		var datospago={
							 destino:('6017647983563668'),
							 importe:$("#total").val(),
							 origen:$("#tarjeta").val(),
							 cvv:$("#nip").val(),
							 tituar:$("#Titular").val()
						 }
						 alert(JSON.stringify(datospago))
						 $.ajax({
					           type    : 'POST',
					           url     : 'https://horarios.itsonora.net/banco/transferencia',
					           data    : datospago,
					           dataType: 'json',
					           encode  : true,
										 processData: false,
										 contentType: false
					     }).done(function(respuesta){
								 alert(respuesta);
						     if(respuesta=='1'){
									 $('#myModalExito').modal('show');
									 $("#myModal-2").modal('hide');
								 }else{
									 $('#MyModalError').modal('show')
								 }
						   })
						 })
					 });
</script>
<script>
function valida(e){
tecla = (document.all) ? e.keyCode : e.which;

//Tecla de retroceso para borrar, siempre la permite
if (tecla==8){
		return true;
}

// Patron de entrada, en este caso solo acepta numeros
patron =/[0-9]/;
tecla_final = String.fromCharCode(tecla);
return patron.test(tecla_final);
}
</script>
