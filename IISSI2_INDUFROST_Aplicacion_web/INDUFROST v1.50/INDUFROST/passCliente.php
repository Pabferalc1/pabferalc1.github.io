<?php
session_start();
require_once("gestionBD.php");

$conexion = crearConexionBD();
if (!isset($_SESSION['usuario']))
	Header("Location: login.php");

?>

<!DOCTYPE html>
<html lang="es">

<head> 
	
	<meta charset= "UTF-8">
	<title>CAMBIAR PASSWORD</title>
	<link rel="stylesheet" href="css/datatable.css"> 
	<link rel="stylesheet" href="css/botones.css"> 
	<link rel="stylesheet" href="css/datatable3.css"> 
	<script src="jQuery/jquery-3.4.1.min.js" type="text/javascript"></script>
	  
</head>	

<body class="fondo">

	<div id="barraHorizontal">
		<p> </p>
	</div>	
	
		
	<div id="general2">
		<div id="containerBarHor">		
			<div id="logo">
				<a href="index.html"><img src="images/android-icon-192x192.png" class="logocss"></a>
			</div>
		
			<div id="imgLogin">
				<a href="cerrar.php"><img src="images/logout2.png"class="imglogincss" > </a>
			</div>			
			<div id="containerBarHor">
				
			</div>
		</div>
		<div id="banner"> 
		   <img src="images/GEA BANNER.jpg" class="logocss" > 
		</div>
		
		

<div class="container" >
	
	<form action="actualizarContraCliente.php" method="post">
     <input type="text" name="Contras" id="Contras" value="" placeholder="NUEVA CONTRASEÑA" class="actualizarContra"  maxlength="20"   required/>
     <input type="submit" value="ACTUALIZAR CONTRASEÑA" class="button4" >
</form>
	</div>
	</div>
	</body>
	</html>