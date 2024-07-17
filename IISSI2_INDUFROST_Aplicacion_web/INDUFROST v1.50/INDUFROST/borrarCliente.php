
<?php
//BORRAR FACTURA
session_start();
require_once("gestionBD.php");


$conexion = crearConexionBD();
if (!isset($_SESSION['usuario3']))
	Header("Location: login.php");


    foreach ( $_POST["ClienteId"] as $clienteId ) { 	
		$consulta = "DELETE FROM CLIENTE WHERE IdCliente='".$clienteId."'";    
  		
  		$result = $conexion->query($consulta);

     }



header("location:AdministradorCliente.php");
 
?>