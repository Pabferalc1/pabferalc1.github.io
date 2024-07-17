

<?php


require_once("gestionBD.php");


$conexion = crearConexionBD();


$descrip = $_POST["descrip"];
$fecha= $fecha_actual = date("d/m/y  H:i:s");
$idTrabajador=$_POST["idTrabajador"];

if(empty($descrip)){
	
	header("location:errorFormulario.php");
}

if(empty($fecha)){
	
	header("location:errorFormulario.php");
}


if(empty($IdTra)){
	
	header("location:errorFormulario.php");
}


$consulta = "INSERT INTO SUGERENCIAS VALUES (default,'$descrip', '$fecha', '$idTrabajador')";	

$result = $conexion->query($consulta);





	header("location:principal.php");



?>