<?php session_start();


if (isset($_SESSION['usuario'] )) {
require_once 'Cliente.php';
}
elseif(isset($_SESSION['usuario2'])){
    require_once 'Trabajador.php';
}
elseif(isset($_SESSION['usuario3'])){
	require_once 'Administrador.php';
	
}
else{
	header('location:login.php');	
}
?>