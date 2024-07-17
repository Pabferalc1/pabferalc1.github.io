<?php

session_start();
require_once("gestionBD.php");


$conexion = crearConexionBD();
if (!isset($_SESSION['usuario3']))
	Header("Location: login.php");


$Dias = $_POST["Dias"];
$fecha3 = $_POST["fecha"];
$fecha=date("d/m/y",strtotime($fecha3));

$fecha4 = $_POST["fecha2"];
$fecha2=date("d/m/y",strtotime($fecha4)); 
$IdTra = $_POST["IdTra"];

if(empty($Dias)){
	
	header("location:errorFormulario.php");
}

if(empty($fecha)){
	
	header("location:errorFormulario.php");
}

if(empty($fecha2)){
	
	header("location:errorFormulario.php");
}

if(empty($IdTra)){
	
	header("location:errorFormulario.php");
}

$consulta = "INSERT INTO GUARDIA VALUES (DEFAULT, '$Dias', '$fecha', '$fecha2', '$IdTra') ";	

$result = $conexion->query($consulta);






	header("location:principal.php");


?>