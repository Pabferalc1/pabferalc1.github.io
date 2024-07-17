<?php
//BORRAR FACTURA
session_start();
require_once("gestionBD.php");


$conexion = crearConexionBD();


    foreach ( $_POST["GuardiaId"] as $GuardiaId ) { 	
		$consulta = "DELETE FROM GUARDIA WHERE IDGUARDIA ='".$GuardiaId."'";    
  		
  		$result = $conexion->query($consulta);

     }


header("location:AdministradorTrabajador.php");
 
?>