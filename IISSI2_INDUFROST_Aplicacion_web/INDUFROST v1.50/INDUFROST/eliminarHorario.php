<?php
//BORRAR FACTURA
session_start();
require_once("gestionBD.php");


$conexion = crearConexionBD();


    foreach ( $_POST["HorarioId"] as $HorarioId ) { 	
		$consulta = "DELETE FROM Horario WHERE IDHORARIO ='".$HorarioId."'";    
  		
  		$result = $conexion->query($consulta);

     }


header("location:AdministradorTrabajador.php");
 
?>