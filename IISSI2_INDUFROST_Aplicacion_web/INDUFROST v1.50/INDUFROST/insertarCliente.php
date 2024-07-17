  

<?php
session_start();
require_once("gestionBD.php");


$conexion = crearConexionBD();






$nombre = $_POST["nombre"];
$dni = $_POST["dni"];
$apellidos =$_POST['apellidos'];
$direccion = $_POST['direccion'];
$contra = $_POST['contra'];
$telefono = $_POST['telefono'];

if(empty($nombre)){
	
	header("location:errorFormulario.php");
}

if(empty($dni)){
	
	header("location:errorFormulario.php");
}

else if(!preg_match("/^[0-9]{8}[A-Z]$/", $dni)){
	
		header("location:errorFormulario.php");
	}

if(empty($apellidos)){
	
	header("location:errorFormulario.php");
}

if(empty($direccion)){
	
	header("location:errorFormulario.php");
}

if(empty($contra)){
	
	header("location:errorFormulario.php");
}


if(empty($telefono)){
	
	header("location:errorFormulario.php");
}

else if(!preg_match("/^[0-9]{9}/", $telefono)){
	
		header("location:errorFormulario.php");
	}




if(usuariosIguales($conexion, $dni)==1){
			header("location:error.php");
		}else{
			
			$consulta = "INSERT INTO CLIENTE  VALUES (DEFAULT, '$nombre', '$dni', '$apellidos', '$direccion', '$contra', '$telefono')";
	
			$result = $conexion->query($consulta);
	
	
			header("location:registroClienteExito.php");
			
		}






function usuariosIguales($conexion, $usuario) {

	try {
		$stmt2 = $conexion -> prepare("SELECT COUNT(*) FROM CLIENTE WHERE DNI = :nif ");
		$stmt2 -> bindParam(":nif", $_POST["dni"]);
		$stmt2 -> execute();
		return $stmt2 -> FetchColumn();
	} catch(PDOException $e) {
		echo("error: " . $e -> GetMessage());
	}

}
         
    
 
	

	






	 




	


?>