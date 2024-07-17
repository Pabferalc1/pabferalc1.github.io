<?php
require_once("gestionBD.php");


$conexion = crearConexionBD();

$fkIdTrabajador=$_POST["idTrabajador"];
$fkIdCliente=$_POST["idCliente"];
$descrip = $_POST["descrip"];

$fecha3 = $_POST["fecha"];


$fecha=date("d/m/y",strtotime($fecha3));

$fechaProximaRev=date("d/m/y",strtotime($fecha3." + 1 year"));

$fechafin=date("d/m/y",strtotime($fecha3." + 2 year"));



$coste=$_POST["coste"];
$tipo=$_POST["tipo"];

if ( $coste < 0){
	header("location:errorFormulario.php");
}

if(empty($descrip)){
	
	header("location:errorFormulario.php");
}

if(empty($fechaProximaRev)){
	
	header("location:errorFormulario.php");
}

if(empty($fecha)){
	
	header("location:errorFormulario.php");
}

if(empty($tipo)){
	
	header("location:errorFormulario.php");
}

if(empty($fkIdTrabajador)){
	
	header("location:errorFormulario.php");
}

if(empty($fkIdCliente)){
	
	header("location:errorFormulario.php");
}

if(empty($coste)){
	
	header("location:errorFormulario.php");
}


if(empty($fechafin)){
	
	header("location:errorFormulario.php");
}

$consulta = "INSERT INTO MANTENIMIENTO VALUES (default,'$descrip', '$fechaProximaRev', 
'$fecha', '$tipo', '$fkIdTrabajador', '$fkIdCliente')";
$result = $conexion->query($consulta);


//---------------------------------FACTURA
$consultaMantenimiento="SELECT IDMANTENIMIENTO FROM MANTENIMIENTO WHERE DESCRIPCION='".$descrip."' 
AND FECHAPROXIMAREVISION ='".$fechaProximaRev."' 
AND FECHA ='".$fecha."'
AND TIPO ='".$tipo."' 
AND FKIDTRABAJADOR= '".$fkIdTrabajador."' 
AND FKIDCLIENTE = '".$fkIdCliente."'";

$fkIdMantenimientoAux = $conexion->query($consultaMantenimiento);

foreach ($fkIdMantenimientoAux as $valor) {
	$fkIdMantenimiento=$valor[0];
}


$consulta2 = "INSERT INTO FACTURA VALUES (default, '$coste', '$fecha', '$descrip', '$fkIdMantenimiento')";
$result2 = $conexion->query($consulta2);

//---------------------------------GARANTIA

$consulta3 = "INSERT INTO GARANTIA VALUES (default, '$fecha', '$fechafin', '$fkIdMantenimiento')";
$result3 = $conexion->query($consulta3);

    header("location:principal.php");



?>