
<?php
//BORRAR FACTURA
session_start();
require_once("gestionBD.php");


$conexion = crearConexionBD();

$facturaId = $_POST["facturaId"];

$consulta = "DELETE FROM Factura WHERE FkIdMantenimiento IN (SELECT IdMantenimiento FROM Mantenimiento WHERE FkIdCliente =
	(SELECT IdCliente FROM Cliente WHERE IDFACTURA='".$facturaId."')) "; 

$result = $conexion->query($consulta);

header("location:principal.php");
 


?>