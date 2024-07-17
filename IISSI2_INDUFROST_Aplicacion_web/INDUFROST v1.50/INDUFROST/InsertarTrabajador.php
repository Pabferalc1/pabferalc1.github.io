
<?php

session_start();
require_once("gestionBD.php");


$conexion = crearConexionBD();
if (!isset($_SESSION['usuario3']))
	Header("Location: login.php");


$Dni = $_POST["DNITrabajador"];
$Nombre= $_POST["NombreTrabajador"];
$Apellidos = $_POST["ApellidosTrabajador"];
$Domicilio = $_POST["DomicilioTrabajador"];
$Email = $_POST["EmailTrabajador"];
$Contra = $_POST["contra"];
$Telefono = $_POST["TelefonoTrabajador"];

if(empty($Dni)){
	
	header("location:errorFormulario.php");
}

else if(!preg_match("/^[0-9]{8}[A-Z]$/", $Dni)){
	
		header("location:errorFormulario.php");
	}

if(empty($Nombre)){
	
	header("location:errorFormulario.php");
}

if(empty($Apellidos)){
	
	header("location:errorFormulario.php");
}

if(empty($Domicilio)){
	
	header("location:errorFormulario.php");
}

if(empty($Email)){
	
	header("location:errorFormulario.php");
}

else if (!filter_var($Email, FILTER_VALIDATE_EMAIL)) {
		
		header("location:errorFormulario.php");
	}

if(empty($Contra)){
	
	header("location:errorFormulario.php");
}


if(empty($Telefono)){
	
	header("location:errorFormulario.php");
}

else if(!preg_match("/^[0-9]{9}/", $Telefono)){
	
		header("location:errorFormulario.php");
	}



if(trabajadoresIguales($conexion, $Email)==1){
			header("location:errorEmail.php");
		}else if(dniIguales($conexion, $Dni)==1){
			
			header("location:errorEmail.php");
			
		}
		
		else {
			
			
	$consulta = "INSERT INTO TRABAJADOR VALUES (DEFAULT, '$Dni', '$Nombre', '$Apellidos', '$Domicilio', '$Email', '$Contra', '$Telefono') ";	

$result = $conexion->query($consulta);
	
			header("location:principal.php");
			
		}







function trabajadoresIguales($conexion, $usuario) {

	try {
		$stmt2 = $conexion -> prepare("SELECT COUNT(*) FROM TRABAJADOR WHERE EMAIL = :email ");
		$stmt2 -> bindParam(":email", $_POST["EmailTrabajador"]);
		$stmt2 -> execute();
		return $stmt2 -> FetchColumn();
	} catch(PDOException $e) {
		echo("error: " . $e -> GetMessage());
	}

}

function dniIguales($conexion, $usuario) {

	try {
		$stmt2 = $conexion -> prepare("SELECT COUNT(*) FROM TRABAJADOR WHERE DNI = :nif ");
		$stmt2 -> bindParam(":nif", $_POST["DNITrabajador"]);
		$stmt2 -> execute();
		return $stmt2 -> FetchColumn();
	} catch(PDOException $e) {
		echo("error: " . $e -> GetMessage());
	}

}
     


?>