<style type="text/css">
<!--
table { vertical-align: top; }
tr    { vertical-align: top; }
td    { vertical-align: top; }
.pumpkin{
	background:#006b8c;
	padding: 4px 4px 4px;
	color:white;
	font-weight:bold;
	font-size:12px;
}
.silver{
	background:#bdc3c7;
	padding: 3px 4px 3px;
}
.clouds{
	background:#ecf0f1;
	padding: 3px 4px 3px;
}
.border-top{
	border-top: solid 1px #bdc3c7;

}
.border-left{
	border-left: solid 1px #bdc3c7;
}
.border-right{
	border-right: solid 1px #bdc3c7;
}
.border-bottom{
	border-bottom: solid 1px #bdc3c7;
}

table.page_footer {width: 100%; border: none; background-color: white; padding: 2mm;border-collapse:collapse; border: none;}
}
-->
</style>
<page backtop="15mm" backbottom="15mm" backleft="15mm" backright="15mm" style="font-size: 12pt; font-family: arial" >
        <page_footer>
        <table class="page_footer">
            <tr>

                <td style="width: 50%; text-align: left">
                    P&aacute;gina [[page_cu]]/[[page_nb]]
                </td>
            </tr>
        </table>
    </page_footer>
    <table cellspacing="0" style="width: 100%;">
        <tr>

            <td  style="width: 25%; color: #444444;">
                <img style="width: 100%;" src="../../img/logo.jpg" alt="Logo"><br>

            </td>


        </tr>
    </table>
    <br>
    <table cellspacing="0" style="width: 100%; text-align: left; font-size: 10pt;">
		<tr>
			<td class='pumpkin' style="width:45%; ">CONTACTO</td>
			<td  style="width:10%; "></td>
		</tr>
		<tr>
			<td style="width:45%; ">
			<br>
				Dirección: <?php echo("Avenida tecnologico")?><br>
				Teléfono: <?php echo("6625242125")?><br>
				Email: <?php echo('Ventas@ProveMax.com')?>
			</td>
			<td  style="width:10%; "></td>

		</tr>
	</table>
	<br>
	<table cellspacing="0" style="width: 100%; text-align: left; font-size: 10pt;">
	<?php
	$sql_id2=mysqli_query($con,"SELECT id_pedido FROM `pedidos` WHERE 1 ORDER by id_pedido DESC LIMIT 1");
	while ($row=mysqli_fetch_array($sql_id2))
		{
	$id_tmp2=$row["id_pedido"];
		}
	 ?>
	<tr>
		<td class='pumpkin' style="width:45%; ">NUMERO DE PEDIDO</td>
		<td  style="width:10%; "></td>
	</tr>
	<tr>
		<td style="width:45%; ">
		<?php echo $id_tmp2+1; ?>
		</td>
		<td  style="width:10%; "></td>
	</tr>
</table>
	<br>
	<table cellspacing="0" style="width: 100%; text-align: left; font-size: 10pt;">
		<tr>
			<td class='pumpkin' style="width:33%; ">CLIENTE</td>
			<td class='pumpkin' style="width:34%; ">RFC</td>
			<td class='pumpkin' style="width:33%; text-align:right ">FECHA</td>
		</tr>
		<tr>
			<td style="width:33%; ">
				<?php echo $transporte;?>
			</td>
			<td style="width:34%; ">
				<?php echo $condiciones;?>
			</td>
			<td  style="width:33%; text-align:right"><?php echo date("d-m-Y");?></td>
		</tr>
	</table>


	<br>




    <table cellspacing="0" style="width: 100%; border: solid 0px #7f8c8d; text-align: center; font-size: 10pt;padding:1mm;">
        <tr >
			<th class="pumpkin" style="width: 7% ">CANT.</th>
            <th class="pumpkin" style="width: 55%">DESCRIPCION</th>
            <th class="pumpkin" style="width: 14%;text-align:right">PRECIO UNIT.</th>
            <th class="pumpkin" style="width: 10%;text-align:right">TOTAL</th>

        </tr>

<?php
$sumador_total=0;
$nums=1;
$sql=mysqli_query($con, "select * from productos, tmp where productos.id_producto=tmp.id_producto and tmp.session_id='".$session_id."'");
while ($row=mysqli_fetch_array($sql))
	{
	$id_tmp=$row["id_tmp"];
	$id_producto=$row["id_producto"];
	$cantidad=$row['cantidad_tmp'];
	$nombre_producto=$row['nombre_producto'];
	$id_marca_producto=$row['id_marca_producto'];
	$status=$row['status_producto'];
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "pedidos";
	$conn = new mysqli($servername, $username, $password, $dbname);
	$nuevo=$status-$cantidad;
	$sql_update="UPDATE productos SET status_producto='$nuevo' WHERE id_producto=$id_producto";
	if (mysqli_query($conn, $sql_update)) {

} else {
    echo "Error updating record: " . mysqli_error($conn);
}

	$precio_venta=$row['precio_tmp'];
	$precio_venta_f=number_format($precio_venta,2);//Formateo variables
	$precio_venta_r=str_replace(",","",$precio_venta_f);//Reemplazo las comas
	$precio_total=$precio_venta_r*$cantidad;
	$precio_total_f=number_format($precio_total,2);//Precio total formateado
	$precio_total_r=str_replace(",","",$precio_total_f);//Reemplazo las comas
	$sumador_total+=$precio_total_r;//Sumador
	if ($nums%2==0){
		$clase="silver";
	} else {
		$clase="clouds";
	}
	?>

        <tr>
			<td class='<?php echo $clase;?>' style="width: 7%; text-align: center"><?php echo $cantidad; ?></td>
            <td class='<?php echo $clase;?>' style="width: 55%; text-align: left"><?php echo $nombre_producto;?></td>
            <td class='<?php echo $clase;?>' style="width: 14%; text-align: right"><?php echo $precio_venta_f;?></td>
            <td class='<?php echo $clase;?>' style="width: 10%; text-align: right"><?php echo $precio_total_f;?></td>

        </tr>

	<?php
	//Insert en la tabla detalle_cotizacion

	$sql_id=mysqli_query($con,"SELECT id_pedido FROM `pedidos` WHERE 1 ORDER by id_pedido DESC LIMIT 1");
	while ($row=mysqli_fetch_array($sql_id))
		{
	$id_tmp1=$row["id_pedido"];
		}
		$pedido=$id_tmp1+1;
	$insert_detail=mysqli_query($con, "INSERT INTO detalle_pedido VALUES ('','$pedido','$id_producto','$nombre_producto','$cantidad','$precio_venta_r')");
	$nums++;

	}
	$total_neto=number_format($sumador_total,2,'.','');
	$sumador_total=$total_neto;

?>
	</table>
	<table cellspacing="0" style="width: 100%; border: solid 0px black; background: white; font-size: 11pt;padding:1mm;">
	        <tr>
				<th style="width: 50%; text-align: right;"></th>
	            <th style="width: 37%; text-align: right;">TOTAL &#36;</th>
	            <th style="width: 13%; text-align: right;"><?php echo number_format($total_neto,2);?></th>
	        </tr>
			<tr>
				<th class='pumpkin' style="width: 50%; text-align: center;">Direccion del envio</th>
	        </tr>
			<tr>
				<td class='border-left border-bottom border-right' style="width: 50%;"><?php echo $comentarios;?></td>
	        </tr>
	    </table>
			<br>
			<table>
			<tr>
				<th class='pumpkin' style="width: 50%; text-align: center;">CONCEPTO</th>
					</tr>
			<tr>
				<td class='border-left border-bottom border-right' style="width: 50%;"><?php echo("PAGADO")?></td>
					</tr>
			</table>


	<br>
</page>

<?php
$date=date("Y-m-d H:i:s");
$insert_detail=mysqli_query($con, "INSERT INTO pedidos VALUES ('$id_tmp','$total_neto','$id_producto','$transporte','0')");
// $insert=mysqli_query($con,"INSERT INTO pedidos VALUES ('','$numero_pedido','$date','$proveedor','$transporte','$condiciones','$comentarios')");
$delete=mysqli_query($con,"DELETE FROM tmp WHERE session_id='".$session_id."'");

?>
