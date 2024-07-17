
<?php
session_start();

require_once("gestionBD.php");


$conexion = crearConexionBD();
if (!isset($_SESSION['usuario2']))
	Header("Location: login.php");

$contra= $_POST["Contras"];

if(empty($contra)){
	
	header("location:errorFormulario.php");
}

$consulta = "UPDATE TRABAJADOR SET Contra='".$contra."' WHERE Contra='".$_SESSION["password2"]."' ";

$result = $conexion->query($consulta);

	

header("location:principal.php");
 

?>