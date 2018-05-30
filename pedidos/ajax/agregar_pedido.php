<?php
	/*-------------------------
	Autor: Obed Alvarado
	Web: obedalvarado.pw
	Mail: info@obedalvarado.pw
	---------------------------*/
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
	<th></th>
</tr>
<?php
	$sumador_total=0;
	$sql=mysqli_query($con, "select * from productos, tmp where productos.id_producto=tmp.id_producto and tmp.session_id='".$session_id."'");
	while ($row=mysqli_fetch_array($sql))
	{
	$id_tmp=$row["id_tmp"];
	$codigo_producto=$row['codigo_producto'];
	$cantidad=$row['cantidad_tmp'];
	$nombre_producto=$row['nombre_producto'];
	$id_marca_producto=$row['id_marca_producto'];
	if (!empty($id_marca_producto))
	{
	$sql_marca=mysqli_query($con, "select nombre_marca from marcas where id_marca='$id_marca_producto'");
	$rw_marca=mysqli_fetch_array($sql_marca);
	$nombre_marca=$rw_marca['nombre_marca'];
	$marca_producto=" ".strtoupper($nombre_marca);
	}
	else {$marca_producto='';}
	$precio_venta=$row['precio_tmp'];
	$precio_venta_f=number_format($precio_venta,2);//Formateo variables
	$precio_venta_r=str_replace(",","",$precio_venta_f);//Reemplazo las comas
	$precio_total=$precio_venta_r*$cantidad;
	$precio_total_f=number_format($precio_total,2);//Precio total formateado
	$precio_total_r=str_replace(",","",$precio_total_f);//Reemplazo las comas
	$sumador_total+=$precio_total_r;//Sumador

		?>
		<tr>
			<td><?php echo $cantidad;?></td>
			<td><?php echo $nombre_producto.$marca_producto;?></td>
			<td><span class="pull-right"><?php echo $precio_venta_f;?></span></td>
			<td><span class="pull-right"><?php echo $precio_total_f;?></span></td>
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
	<div class="modal-dialog modal-sl" role="document">
		<div class="modal-content">
			<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			<h4 class="modal-title" id="myModalLabel">Formato de Pago</h4>
			</div>
			<div class="modal-body">
				<div class="form-group col-md-9">
					<label for="exampleInputEmail1">Titular</label>
					<input type="numer" class="form-control" id="Titular" aria-describedby="emailHelp" placeholder="Titular">
				</div>
			<div class="form-group col-md-9">
				<label for="exampleInputEmail1">Tarjeta</label>
				<input type="numer" class="form-control" id="tarjeta" aria-describedby="emailHelp" placeholder="Numero de Tarjeta">
			</div>
			<div class="form-group col-md-9">
				<label for="exampleInputEmail1">NIP</label>
				<input type="numer"  class="form-control" id="nip" aria-describedby="emailHelp" placeholder="CVV">
			</div>
			<div class="form-group col-md-9">
				<label  for="exampleInputEmail1">Total</label>
				<input type="number" class="form-control" id="total" aria-describedby="emailHelp" placeholder="<?php echo number_format($sumador_total,2);?>"></div>
			<div class="form-group">
				<label for="exampleInputEmail1"></label>
				<input type="hidden" value="0000000001" class="form-control" id="destino" aria-describedby="emailHelp" placeholder="Numero de Tarjeta Destino">
			</div>
			<button id="boton-pagar" type="button" class="btn btn-default">Pagar</button>
		</div>
		</div>
	</div>
</div>
<script type="text/javascript">
$(document).ready(function($){
	alert("simon")
	$("#boton-pagar").click(function(e){
		console.log("sexo");
		var datospago={
							 destino:$('123456789123456'),
							 precio:$("#total").val(),
							 nutar:$("#nutar").val(),
							 cvc:$("#nip").val(),
							 tituar:$("#Titular").val()
						 }
						 $.ajax({
					           type    : 'POST',
					           url     : 'https://horarios.itsonora.net/paquetes/transferencia',
					           data    : datospago,
					           dataType: 'json',
					           encode  : true,
										 processData: false,
										 contentType: false
					     }).done(function(respuesta){
						     if(respuesta=='1'){
									 alert("Compra exitosa")
								 }
						     // location.reload();
						   })
						 })
					 });
</script>
