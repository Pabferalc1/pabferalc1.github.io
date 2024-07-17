
<?php
//BORRAR SUGERENCIAS
session_start();
require_once("gestionBD.php");


$conexion = crearConexionBD();

    foreach ( $_POST["IDMANTENIMIENTO"] as $IDMANTENIMIENTO ) { 	
		$consulta = "DELETE FROM MANTENIMIENTO WHERE IDMANTENIMIENTO= '".$IDMANTENIMIENTO."'";    
  		
  		$result = $conexion->query($consulta);

     }


                                      
	  header("location:principal.php");  
   ?> 