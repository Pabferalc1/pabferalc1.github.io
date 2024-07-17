
<?php

require_once("gestionBD.php");

$conexion = crearConexionBD();
if (!isset($_SESSION['usuario2']))
	Header("Location: login.php");





?>



<!DOCTYPE html>
<html lang="es">

<head> 
	
	<meta charset= "UTF-8">
	<title>TRABAJADOR</title>
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
		
<div class="tab">
  <button class="botonhorario" class="tablinks" onclick="openlogin(event, 'HORARIO Y GUARDIAS')" id="defaultOpen"  >HORARIOS Y GUARDIAS</button>
  <button class="botonbuzon" class="tablinks" onclick="openlogin(event, 'BUZON DE SUGERENCIAS')"   >BUZON DE SUGERENCIAS</button>
  <button class="botonbuzon" class="tablinks" onclick="openlogin(event, 'TRABAJADOR')"   >DATOS PERSONALES</button>
</div>


<div id="HORARIO Y GUARDIAS" class="tabcontent" class="blanco">

<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>

<form class="widht95">

  <div class="container">
    <label for="HORARIO Y GUARDIAS"><b>Guardias y horarios actualizados semanalmente</b></label>
  </div>
  
  <div class="zindex4">
	<?php
	


require_once("gestionBD.php");

$conexion = crearConexionBD();
if (!isset($_SESSION['usuario2']))
	Header("Location: login.php");






$consulta = "SELECT DIAS,HORAINICIO FROM HORARIO WHERE FkIdTrabajador IN 
	(SELECT IdTrabajador FROM TRABAJADOR WHERE Email='".$_SESSION["usuario2"]."') ";

$result = $conexion->query($consulta);
if (!$result) {
    print "    <p>Error en la consulta.</p>\n";
    print "\n";
} else {
    foreach($result as $valor) {
        print " <pre>Dias laborales normal:   $valor[DIAS], $valor[HORAINICIO] el turno corresponde de 10:00 hasta 18:00
                
                                      </pre>\n";
        
        
		
		
        print "\n";
		
    }
}


?>


	</div>
	<div>
		
		<?php
	


require_once("gestionBD.php");

$conexion = crearConexionBD();
if (!isset($_SESSION['usuario2']))
	Header("Location: login.php");






$consulta = "SELECT * FROM GUARDIA WHERE FkIdTrabajador IN 
	(SELECT IdTrabajador FROM TRABAJADOR WHERE Email='".$_SESSION["usuario2"]."') ";

$result = $conexion->query($consulta);
if (!$result) {
    print "    <p>Error en la consulta.</p>\n";
    print "\n";
} else {
    foreach($result as $valor) {
        print " <pre>Dias GUARDIA:   $valor[DIAS], $valor[FECHAINICIO] a partir de la 20:00 hasta $valor[FECHAFIN] a las 8:00

              
                                      </pre>\n";
        
        
		
		
        print "\n";
		
    }
}


?>
		
		
	</div>
	
  
</form>

	<pre> </pre>

</body>
</html>
	
</div>	

<div id="TRABAJADOR" class="tabcontent" class="blanco">

<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>


<form class="widht95">

  <div class="container">
    <label for="TRABAJADOR"><b>Aquí puede ver sus datos personales y actualizarlos</b></label>
  </div>
  <div class="zindex4">
	<?php
	

//CONULTAR FACTURA
require_once("gestionBD.php");

$conexion = crearConexionBD();
if (!isset($_SESSION['usuario2']))
	Header("Location: login.php");




//EJEMPLO DE CONSULTA DE SELECCIÓN DE REGISTROS

$consulta = "SELECT * FROM Trabajador WHERE Email='".$_SESSION["usuario2"]."'";
$result = $conexion->query($consulta);
if (!$result) {
    print "    <p>Error en la consulta.</p>\n";
    print "\n";
} else {
    foreach($result as $valor) {
		   	    echo "<div id='widht95'>";
				echo " <p>DNI:   $valor[DNI] </p>";
				echo " <p>NOMBRE: $valor[NOMBRE]</p>";   
				echo " <p>APELLIDOS: $valor[APELLIDOS]</p>";   
				echo " <p>DIRECCION: $valor[DOMICILIO]</p>";  
				echo " <p>EMAIL: $valor[EMAIL]</p>"; 
				echo " <p>CONTRASEÑA: $valor[CONTRA]</p>"; 
				echo " <p>TELEFONO: $valor[TELEFONO]</p>"; 				                    
                echo "</div>";

					   }
	echo "<pre> </pre>";
    }



?>


	</div>
	
	
  
</form>
<div class="container" >
	
	
     
     <button   onclick="location.href='passTrabajador.php'" class="button4" >ACTUALIZAR CONTRASEÑA</button>

	</div>
	<pre> </pre>
</body>
</html>
	
</div>	


<div id="BUZON DE SUGERENCIAS" class="tabcontent" class="blanco">
	
	 <!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>

<form action="borrarSugerencias.php" method="post" class="widht95">

  <div class="container">
    <label for="BUZON DE SUGERENCIAS"><b>Sugerencias anteriores</b></label>
  </div>
  <div>
  	<?php
	

//CONULTAR SUGERENCIA
require_once("gestionBD.php");

$conexion = crearConexionBD();
if (!isset($_SESSION['usuario2']))
	Header("Location: login.php");





//EJEMPLO DE CONSULTA DE SELECCIÓN DE REGISTROS

$consulta = "SELECT * FROM SUGERENCIAS WHERE FkIdTrabajador IN 
	(SELECT IdTrabajador FROM TRABAJADOR WHERE Email='".$_SESSION["usuario2"]."') ORDER BY FECHADESCRIPCION";

$result = $conexion->query($consulta);

if (!$result) {
    print "    <p>Error en la consulta.</p>\n";
    print "\n";
} else {
	$aux = array();
  	foreach($result as $valor1) {
  		$aux = array($aux ,$valor1 );
  	}
  	$result = $conexion->query($consulta);
  	if (sizeof($aux)!=0){
    foreach($result as $valor) {
        echo "<div id='widht95'>";
        echo "<p>Descripción: $valor[DESCRIPCION]</p>";
		echo "<pre> </pre>";
		echo "<p>$valor[FECHADESCRIPCION]<p>";
		
        echo "</div>"; 
        			echo "<label class='container2'>";
       				echo "<input type='checkbox' name='sugerenciaId[]' value='$valor[IDSUGERENCIAS]'>";
       				echo " <span class='checkmark'></span>";
					echo "</label>";		
        print "\n";

    }
	 	echo "<input type='submit' class='button' value='Borrar Sugerencia' name='BorrarSugerencia'>";
	}

}



  	
  	?>
  </div>
  
</form>

<pre> </pre>
<pre> </pre>
<div >
	
	<form action="insertarSugerencias.php" method="post" class="widht95">
		 <div class="container">
    <label><b>Escriba aquí su sugerencia</b></label>
    
  </div>
     <textarea name="descrip" rows="10" cols="131" placeholder="Descripción" class="cajatexto" maxlength="999"  required></textarea>
       	<?php
       	require_once("gestionBD.php");

$conexion = crearConexionBD();
if (!isset($_SESSION['usuario2']))
	Header("Location: login.php");

      $consulta="SELECT IDTRABAJADOR FROM TRABAJADOR WHERE EMAIL='".$_SESSION["usuario2"]."'";
	$result = $conexion->query($consulta);

	if (!$result) {
	    print "    <p>Error en la consulta.</p>\n";
	    print "\n";
	} else {
	    foreach($result as $valor) {
			$sql=$valor[0];
		}
	}
	echo "<input type='hidden' name='idTrabajador' id='idTrabajador' value='$sql'/>";

	?>
     <input type="submit" value="INSERTAR SUGERENCIA" class="button">

</form>
</form>
	</div>
	
	
	<pre> </pre>

</body>
</html>
	
</div>	


	</div>
	

		
	
</body>	

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
	
		
	

</html>	