<?php 
include('config.php');
function conectar()
{
$server=localhost;
$user=root;
$pass="";
$DB=pedidos;
if (!$conexion=mysql_connect($server,$user,$pass))
{
echo "Error al conectar a la base de datos ".mysql_error();;	
exit();
}
 if (!@mysql_select_db($DB,$conexion)) 
			{
		   echo "Error al seleccionar la base de datos ".mysql_error();;  
		   exit();
			}
}
?>