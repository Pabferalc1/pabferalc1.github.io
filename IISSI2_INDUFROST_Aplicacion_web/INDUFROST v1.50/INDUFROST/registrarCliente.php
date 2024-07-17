
<!DOCTYPE html>
<html lang="es">

<head> 
	
	<meta charset= "UTF-8">
	<title>Nuevo Usuario</title>
	<link rel="stylesheet" href="css/datatable.css"> 
	<link rel="stylesheet" href="css/datatable3.css"> 
	<link rel="stylesheet" href="css/botones.css"> 
	<link rel="stylesheet" href="css/datatable4.css">
</head>	

<body class="fondo">

	<div id="barraHorizontal">
		<p> </p>
	</div>	
	
	<div id="general">
		<div>		
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
		</body>
		




<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>

<form action="/action_page.php">

  <div class="container">
    <label for="valoracion"><b>Registrar nuevo cliente</b></label>
    
  </div>
  

</form>

 <div >
	
	<form action="insertarCliente.php" method="post">
     
     <input type="text" name="nombre" id="nombre" value="" placeholder="Nombre" maxlength="50" / required >
     <input type="text" name="dni" id="dni" value="" placeholder="12345678X" pattern="^[0-9]{8}[A-Z]" maxlength="9" / required>
     <input type="text" name="apellidos" id="apellidos" value="" placeholder="Apellidos" maxlength="50"/ required>
     <input type="text" name="direccion" id="direccion" value="" placeholder="Direccion" maxlength="50"/ required>
     <input type="password" name="contra" id="contra" value="" placeholder="Contraseña" maxlength="20"/ required>
     <input type="text" name="telefono" id="telefono" value="" class="border10" pattern="^[0-9]{9}" placeholder="Telefono"   maxlength="9"/ required>
     <input type="submit" value="REGISTRAR CLIENTE" class="button">
</form>
	</div>
	
	



 

</body>


</div>

	</div>
	
	

		
	
</body>	

</html>