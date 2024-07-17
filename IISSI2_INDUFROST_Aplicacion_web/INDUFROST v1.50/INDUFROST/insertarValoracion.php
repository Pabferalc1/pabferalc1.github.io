
<?php
session_start();

require_once("gestionBD.php");


$conexion = crearConexionBD();

$descrip = $_POST["descrip"];
$nota = $_POST["nota"];
$idCliente =$_POST['idCliente'] ;
$fecha= $fecha_actual = date("d/m/y  H:i:s");

if(empty($descrip)){
	
	header("location:errorFormulario.php");
}

if(empty($nota)){
	
	header("location:errorFormulario.php");
}


else if ( ((int)$nota) < 0){
	header("location:errorFormulario.php");
}

else if ( ((int)$nota) > 10){
	header("location:errorFormulario.php");
}

if(empty($idCliente)){
	
	header("location:errorFormulario.php");
}

if(empty($fecha)){
	
	header("location:errorFormulario.php");
}


$consulta = "INSERT INTO VALORACIONCLIENTE VALUES (default, '$descrip', '$nota', '$idCliente', '$fecha') ";	

$result = $conexion->query($consulta);


	header("location:principal.php");
	
	



?>