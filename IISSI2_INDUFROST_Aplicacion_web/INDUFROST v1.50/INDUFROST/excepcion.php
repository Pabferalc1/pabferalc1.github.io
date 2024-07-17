<!DOCTYPE html>
<html lang="es">

<head> 
	
	<meta charset= "UTF-8">
	<title>Inicio</title>  
	<link rel="stylesheet" href="css/datatable.css"> 
	<link rel="stylesheet" href="css/datatable3.css"> 
	<link rel="stylesheet" href="css/botones.css"> 
	
</head>	

<body class="fondo">

	<div id="barraHorizontal">
		<p> </p>
		
	</div>	

	<div id="general">

		<div >		
		
			<div id="logo">
				<a href="index.html"><img src="images/android-icon-192x192.png" class="logocss"></a>
			</div>
			
			<div id="user">
				<a href="registrarCliente.php"><img src="images/user.png" class="logocss"></a>
			</div>
				
			<div id="imgLogin">
				<a href="principal.php"><img src="images/login.png" class="logocss" > </a>
			</div>	
			
			<div class="imgYoutube">
				<a href="https://www.youtube.com/user/TheGEAGroup"><img src="images/youtube.png" class="logocss" > </a>
			</div>			

			<div class="imgTwitter">
				<a href="https://twitter.com/thegeagroup"><img src="images/twitter.png" class="logocss" > </a>
			</div>			
			<div id="containerBarHor">
				
			</div>
		</div>
		<div id="banner"> 
		   <img src="images/GEA BANNER.jpg" class="logocss" >   
		</div>
		
		<div>

<?php 
	session_start();
	
	$excepcion = $_SESSION["excepcion"];
	unset($_SESSION["excepcion"]);
	
	if (isset ($_SESSION["destino"])) {
		$destino = $_SESSION["destino"];
		unset($_SESSION["destino"]);	
	} else 
		$destino = "";
?>



	
	

	<div>
		<h2>Ups!</h2>
		<?php if ($destino<>"") { ?>
		<p>Ocurrió un problema durante el procesado de los datos. Pulse <a href="<?php echo $destino ?>">aquí</a> para volver a la página principal.</p>
		<?php } else { ?>
		<p>Ocurrió un problema para acceder a la base de datos. </p>
		<?php } ?>
	</div>
		
	<div class='excepcion'>	
		<?php echo "Información relativa al problema: $excepcion;" ?>
	</div>
	</div>
	</div>
</body>
</html>