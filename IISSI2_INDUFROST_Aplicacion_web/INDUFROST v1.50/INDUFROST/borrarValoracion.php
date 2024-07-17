
<?php
//BORRAR VALORACION
session_start();
require_once("gestionBD.php");


$conexion = crearConexionBD();


    foreach ( $_POST["valoracionId"] as $valoracionId ) { 	                                                                 
	$consulta = "DELETE FROM VALORACIONCLIENTE WHERE FkIdCliente IN 
	(SELECT IdCliente FROM Cliente WHERE IDVALORACIONCLIENTE='".$valoracionId."') "; 
                                        
  		$result = $conexion->query($consulta);                                                                               
                                                                                                                             
     }         
	  header("location:principal.php");                                                                                                                

?>