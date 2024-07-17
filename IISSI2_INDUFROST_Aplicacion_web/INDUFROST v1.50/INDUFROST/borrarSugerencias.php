
<?php
//BORRAR SUGERENCIAS
session_start();
require_once("gestionBD.php");


$conexion = crearConexionBD();

    foreach ( $_POST["sugerenciaId"] as $sugerenciaId ) { 	
		$consulta = "DELETE FROM SUGERENCIAS WHERE FkIdTrabajador IN  (SELECT IdTrabajador FROM TRABAJADOR WHERE 
		IDSUGERENCIAS='".$sugerenciaId."')";    
  		
  		$result = $conexion->query($consulta);

     }


                                      
	  header("location:principal.php");  
   ?> 