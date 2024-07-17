
<?php

require_once("gestionBD.php");

$conexion = crearConexionBD();
if (!isset($_SESSION['usuario3']))
	Header("Location: login.php");

?>



<!DOCTYPE html>
<html lang="es">

<head> 
	
	<meta charset= "UTF-8">
	<title>ADMINISTRADOR</title>
	<link rel="stylesheet" href="css/datatable.css"> 
	<link rel="stylesheet" href="css/botones.css"> 
	<link rel="stylesheet" href="css/datatable2.css"> 
	<link rel="stylesheet" href="css/datatable3.css"> 
	<link rel="stylesheet" href="css/datatable4.css"> 
	<script src="jQuery/jquery-3.4.1.min.js" type="text/javascript"></script>
	  
</head>	

<body class="fondo">

	<div id="barraHorizontal">
		<p> </p>
	</div>	
	
		
	<div id="general2">
		<div>		
			<div id="logo">
				<a href="index.html"><img src="images/android-icon-192x192.png" class="logocss"></a>
			</div>
		
			<div id="imgLogin">
				<a href="cerrar.php"><img src="images/logout2.png" class="imglogincss"> </a>
			</div>			
			<div id="containerBarHor">
				
			</div>
		</div>
		<div id="banner"> 
		   <img src="images/GEA BANNER.jpg" class="logocss"> 
		</div>
		<div >
 			<a href="AdministradorTrabajador.php"><button class="AdministradorTrabajador">Trabajador</button></a>
 			<a href="AdministradorCliente.php"><button class="AdministradorCliente">Cliente</button></a>
 		</div>
		<pre> </pre>


</div>

</body>
</html>	