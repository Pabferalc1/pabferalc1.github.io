
<?php

require_once("gestionBD.php");

$conexion = crearConexionBD();
if (!isset($_SESSION['usuario']))
	Header("Location: login.php");





?>
  



<!DOCTYPE html>
<html lang="es">

<head> 
	
	<meta charset= "UTF-8">
	<title>Cliente</title>
	<link rel="stylesheet" href="css/datatable.css"> 
	<link rel="stylesheet" href="css/botones.css"> 
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
				<a href="cerrar.php"><img src="images/logout2.png" class="imglogincss" > </a>
			</div>			
					<div id="containerBarHor">
				
			</div>	
		</div>
		<div id="banner"> 
		   <img src="images/GEA BANNER.jpg" class="bannercss" > 
		</div>
		
<div   class="tab"  >
	
  <button class="botonfactura" class="tablinks" onclick="openlogin(event, 'Factura')" id="defaultOpen"  >Facturas</button>
  <button class="botongarantia" class="tablinks" onclick="openlogin(event, 'Garantía')"  >Garantías</button>
  <button class="botonvaloracion" class="tablinks" onclick="openlogin(event, 'ValoracionCliente')"   >Valorar servicio</button>
	<button class="botonvaloracion"  class="tablinks" onclick="openlogin(event, 'Cliente')"   >Datos Personales</button>

</div>



<div id="Factura" class="tabcontent" class="blanco">

<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>


<form class="widht95">

  <div class="container">
    <label for="Factura"><b>Aquí puede ver sus facturas</b></label>
  </div>
  <div class="zindex4">
	<?php 

require_once("gestionBD.php");

$conexion = crearConexionBD();
if (!isset($_SESSION['usuario']))
	Header("Location: login.php");

?>

<br>

	<table border="1" class="tablas" >
		<tr>
			<td class="anchotabla1"><b>Cantidad</b></td>
			<td class="fondotabla"><b> Fecha de emision</b></td>
			<td class="fondotabla"><b>Descripción</b></td>
			<td class="fondotabla"><b>Identificador</b></td>
		</tr>

		<?php 
		$consulta = "SELECT * FROM Factura WHERE FkIdMantenimiento IN (SELECT IdMantenimiento FROM Mantenimiento WHERE FkIdCliente =
	(SELECT IdCliente FROM Cliente WHERE Dni='".$_SESSION["usuario"]."'))";
$result = $conexion->query($consulta);
		if (!$result) {
    print "    <p>Error en la consulta.</p>\n";
    print "\n";
} else {
    foreach($result as $valor) {  
	

		echo "<tr>";
			echo "<td> $valor[CANTIDAD] € </td>";
			echo "<td> $valor[FECHAEMISION] </td>";
			echo "<td> $valor[DESCRIPCION] </td>";
			echo "<td> $valor[FKIDMANTENIMIENTO] </td>";
		echo "</tr>";

	}
	}
	?>  
	</table>


	</div>
	
	
  
</form>

	<pre> </pre>
</body>
</html>
	
</div>	

<div id="Cliente" class="tabcontent" class="blanco">

<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>


<form class="widht95">

  <div class="container">
    <label for="Cliente"><b>Aquí puede ver sus datos personales y actualizarlos</b></label>
  </div>
  <div class="zindex4">
	<?php
	

//CONULTAR FACTURA
require_once("gestionBD.php");

$conexion = crearConexionBD();
if (!isset($_SESSION['usuario']))
	Header("Location: login.php");




//EJEMPLO DE CONSULTA DE SELECCIÓN DE REGISTROS

$consulta = "SELECT * FROM Cliente WHERE Dni='".$_SESSION["usuario"]."'";
$result = $conexion->query($consulta);
if (!$result) {
    print "    <p>Error en la consulta.</p>\n";
    print "\n";
} else {
    foreach($result as $valor) {
		   	    echo "<div id='widht95'>";
				echo " <p>NOMBRE:   $valor[NOMBRE] </p>";
				echo " <p>DNI: $valor[DNI]</p>";   
				echo " <p>APELLIDOS: $valor[APELLIDOS]</p>";   
				echo " <p>DIRECCION: $valor[DIRECCION]</p>";  
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
	
	
     
     <button onclick="location.href='passCliente.php'" class="button4" >ACTUALIZAR CONTRASEÑA</button>

	</div>

	<pre> </pre>
</body>
</html>
	
</div>	


<div id="Garantía" class="tabcontent" class="blanco">
	
	 <!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
<form class="widht95">
<div>

  <div class="container">
    <label for="Garantía"><b>Aquí puede ver sus garantías</b></label>
  </div>
  
  <div class="zindex4">

  	
  	
<br>

	<table border="1" class="tablas" >
		<tr>
			<td class="anchotabla1"><b>Fecha inicio</b></td>
			<td class="fondotabla"><b> Fecha fin</b></td>
			<td class="fondotabla"><b>Identificador</b></td>
				
		</tr>

		<?php 
	$consulta = "SELECT * FROM Garantia WHERE FkIdMantenimiento IN (SELECT IdMantenimiento FROM Mantenimiento WHERE FkIdCliente =
	(SELECT IdCliente FROM Cliente WHERE Dni='".$_SESSION["usuario"]."')) ";
$result = $conexion->query($consulta);
		if (!$result) {
    print "    <p>Error en la consulta.</p>\n";
    print "\n";
} else {
    foreach($result as $valor) {  
	

		echo "<tr>";
			echo "<td>  $valor[FECHAINICIO]</td>";
			echo "<td> $valor[FECHAFIN] </td>";
			echo "<td> $valor[FKIDMANTENIMIENTO]</td>";
			
		echo "</tr>";

	}
	}
	?>  
	</table>

  	
  	
  </div>
</div>
</form>
	<pre>    </pre>
</body>
</html>
	
</div>	
<div id="ValoracionCliente" class="tabcontent" class="blanco">
  <!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>

<form action="borrarValoracion.php" method="post" class="widht95">

  <div class="container">
    <label for="valoracion"><b>Valoración del cliente</b></label>
    
  </div>
  <div>
  	<?php
	

//CONULTAR VALORACION CLIENTE
require_once("gestionBD.php");

$conexion = crearConexionBD();
if (!isset($_SESSION['usuario']))
	Header("Location: login.php");

$consulta = "SELECT * FROM VALORACIONCLIENTE WHERE FkIdCliente IN 
	(SELECT IdCliente FROM Cliente WHERE Dni='".$_SESSION["usuario"]."') ORDER BY FECHADESCRIPCION";
		
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
        echo "<p> Nota en relación con el servicio recibido: $valor[NOTA]</p>";
		echo "<p>$valor[FECHADESCRIPCION]<p>";
        echo "</div>"; 
        			echo "<label class='container2'>";
       				echo "<input type='checkbox' name='valoracionId[]' value='$valor[IDVALORACIONCLIENTE]'>";
       				echo " <span class='checkmark'></span>";
					echo "</label>";		
        print "\n";

    }
	 	echo "<input type='submit' class='button' value='Borrar valoracion' name='BorrarValoracion'>";
	}

}
?>
  	
  	
  	
  	
 	
  </div>
  
 
</form>

 <div >
	<pre> </pre>
	<form action="insertarValoracion.php" method="post" class="widht95">
 <div class="container">
    <label><b>Escriba aquí su valoración</b></label>
 
  </div>
     <textarea name="descrip" rows="10" cols="131" placeholder="Escriba aquí su comentario" class="cajatexto" maxlength="999" required></textarea>
           	<?php
       	require_once("gestionBD.php");

$conexion = crearConexionBD();
if (!isset($_SESSION['usuario']))
	Header("Location: login.php");

      $consulta="SELECT IDCLIENTE FROM CLIENTE WHERE DNI='".$_SESSION["usuario"]."'";
	$result = $conexion->query($consulta);

	if (!$result) {
	    print "    <p>Error en la consulta.</p>\n";
	    print "\n";
	} else {
	    foreach($result as $valor) {
			$sql=$valor[0];
		}
	}
	echo "<input type='hidden' name='idCliente' id='idCliente' value='$sql'/>";
	
	?>
	<p></p>
	 <span> Nota del mantenimiento :    </span><select  name="nota" id="nota" >
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
                <option value="6">6</option>
                <option value="7">7</option>
                <option value="8">8</option>
                <option value="9">9</option>
                <option value="10">10</option>
              </select>
     
     <input type="submit" value="INSERTAR VALORACION CLIENTE" class="button">
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