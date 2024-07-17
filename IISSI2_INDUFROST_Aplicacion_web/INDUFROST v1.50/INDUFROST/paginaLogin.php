<!DOCTYPE html>
<html lang="es">

<head> 
	
	<meta charset= "UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Inicio</title>
	<link rel="stylesheet" href="css/datatable.css"> 
	<link rel="stylesheet" href="css/datatable2.css"> 
	<link rel="stylesheet" href="css/botones.css">
	<link rel="stylesheet" href="css/datatable3.css"> 
	<link href="css/estilos.css" rel="stylesheet">
	<script src="jQuery/jquery-3.4.1.min.js"></script>
	 
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
				<a href="https://twitter.com/thegeagroup"><img src="images/twitter.png" class="logocss"> </a>
			</div>	
			<div id="containerBarHor">
				
			</div>		
		
		</div>
		<div id="banner"> 
		   <img src="images/GEA BANNER.jpg" class="logocss" >   
		</div>

<div class="tab">
  <button class="marginleft400" class="tablinks" onclick="openlogin(event, 'Trabajador')" id="defaultOpen"  >LOGIN</button>
  
</div>

<div  id="Trabajador" class="cuadrarlogin" class="tabcontent" >
  <!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">

</head>
<body>

<script>
function openlogin(evt, loginName) {
  var i, tabcontent, tablinks;
  tabcontent = document.getElementsByClassName("tabcontent");
  for (i = 0; i < tabcontent.length; i++) {
    tabcontent[i].style.display = "none";
  }
  tablinks = document.getElementsByClassName("tablinks");
  for (i = 0; i < tablinks.length; i++) {
    tablinks[i].className = tablinks[i].className.replace(" active", "");
  }
  document.getElementById(loginName).style.display = "block";
  evt.currentTarget.className += " active";
}

// Get the element with id="defaultOpen" and click on it
document.getElementById("defaultOpen").click();
</script>



  <div class="container">
  <form name="form" method="post">
  	<div>
    <label class="marginenlogin" for="user_login">usuario</label>
     <input type="text" name="usuario" id="widht95"> 
    
	</div>
	<br />
    <br />
	<div>
    <label class="marginenlogin" for="user_password">Contraseña</label>
    <input type="password" name="password" id="widht95">
    
    </div>    
    <br /> 
    <br />
    </div>
    <br>
    <div class="margen">
               
          <?php 
          
          if(!isset($_SESSION['usuario'])){
                 include 'btn_enviar.php'; } ?>
           
             <?php if(!empty($enviar)): ?>
                 <div >
                     <?php echo $enviar;  ?>
                 </div>
              <?php echo $enviado; ?> 
            <?php endif; ?>
            <?php if(!empty($error)): ?>
                <div >
                 <div >
                     <?php echo $error ?>
                 </div>
    
               </div>

            <?php endif; 
            ?>
         </div>   
             
</form>

</body>
</div>
</div>
</body>
</html>
