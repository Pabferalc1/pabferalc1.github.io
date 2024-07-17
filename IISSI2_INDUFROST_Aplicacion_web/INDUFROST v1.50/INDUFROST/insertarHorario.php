<?php

session_start();
require_once("gestionBD.php");


$conexion = crearConexionBD();
if (!isset($_SESSION['usuario3']))
	Header("Location: login.php");


$fecha3 = $_POST["fecha"];
$fecha=date("d/m/y",strtotime($fecha3));
$Dias = $_POST["Dias"];								
$HoraInicio= $_POST["HoraInicio"]; 
$IdTra = $_POST["IdTra"];

if(empty($Dias)){
	
	header("location:errorFormulario.php");
}

if(empty($fecha)){
	
	header("location:errorFormulario.php");
}
if(empty($IdTra)){
	
	header("location:errorFormulario.php");
}


$consulta = "INSERT INTO HORARIO VALUES (DEFAULT, '$Dias', '$fecha', '29/08/2019', '$IdTra') ";	

$result = $conexion->query($consulta);





	header("location:principal.php");
	

	


?>