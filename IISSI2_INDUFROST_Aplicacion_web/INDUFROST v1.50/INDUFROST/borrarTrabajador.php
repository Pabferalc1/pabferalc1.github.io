
<?php
//BORRAR FACTURA
session_start();
require_once("gestionBD.php");


$conexion = crearConexionBD();


    foreach ( $_POST["TrabajadorId"] as $TrabajadorId ) { 	
		$consulta = "DELETE FROM TRABAJADOR WHERE IdTrabajador ='".$TrabajadorId."'";    
  		
  		$result = $conexion->query($consulta);

     }


header("location:AdministradorTrabajador.php");
 
?>