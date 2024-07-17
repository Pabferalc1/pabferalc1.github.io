<?php session_start();


if (isset($_SESSION['usuario'] )) {
	header('location:index.php');
	

}
try {
 	require_once("gestionBD.php");
	$conexion = crearConexionBD();

 }catch (Exception $e) {
 	echo "ERROR A LA CONEXION DE LA BASE DE DATOS";
 }

 $error='';
 $enviar='';
 $enviado ='';

 if  ($_SERVER['REQUEST_METHOD'] == 'POST') {
   $usuario = $_POST['usuario'];
   $password = $_POST['password'];
   $sql = $conexion->prepare('SELECT * FROM Cliente WHERE Dni = :usuario AND Contra = :password');
   $sql->execute( array(':usuario' => $usuario ,':password'=> $password ));
   $resultado = $sql->fetch();
   if ($resultado !== false) {
         $_SESSION['usuario'] = $usuario;
        $_SESSION['password'] = $password;
		$enviar .= '<meta http-equiv="refresh" content="2;url=index.php">';
   } else {
   		$sql = $conexion->prepare('SELECT * FROM Trabajador WHERE Email = :usuario AND Contra = :password');
   		$sql->execute( array(':usuario' => $usuario ,':password'=> $password ));
   		$resultado = $sql->fetch(); 
   		if ($resultado !== false) {
        	$_SESSION['usuario2'] = $usuario;
        	$_SESSION['password2'] = $password;
			$enviar .= '<meta http-equiv="refresh" content="2;url=index.php">';
   		} else{
			$sql = $conexion->prepare('SELECT * FROM Administrador WHERE admin = :usuario AND password = :password');
   			$sql->execute( array(':usuario' => $usuario ,':password'=> $password ));
   			$resultado = $sql->fetch();
   			if ($resultado !== false) {
        		$_SESSION['usuario3'] = $usuario;
        		$_SESSION['password3'] = $password;				
				$enviar .= '<meta http-equiv="refresh" content="2;url=index.php">';
   			
			}else{
				$error='El usuario o la contraseña no coincide';
			}
   		}
	}
} 
 ?>
 
 <?php
 require 'paginaLogin.php';
 ?>

 

