

<?php
session_start();
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
 			<a href="AdministradorTrabajador.php"><button class="AdministradorTrabajador1">Trabajador</button></a>
 			<a href="AdministradorCliente.php"><button class="AdministradorCliente">Cliente</button></a>
 		</div>
		<pre> </pre>

	<div class="container" >
			
		<div class="tab">
 			
 			<button  class="tablinks" onclick="openlogin(event, 'Borrar Cliente')" id="defaultOpen"   >Consultar</button>
 			<button  class="tablinks" onclick="openlogin(event, 'Valoracion')"   >valoracion</button>
 			<button  class="tablinks" onclick="openlogin(event, 'Mantenimiento')"  >Añadir</button>
 			<button  class="tablinks" onclick="openlogin(event, 'Ver Mantenimiento')"  >revisar</button>
 			<button  class="tablinks" onclick="openlogin(event, 'Facturas')"  >Facturas</button>
 		</div>
 	</div>
 	
	<div id="Facturas" class="tabcontent" class="blanco">




<form class="widht95">

  <div class="container">
    <label for="Factura"><b>Facturas de todos los clientes</b></label>
  </div>
  <div class="zindex4">


<br>

	<table border="1" class="tablas" >
		<tr>
			
			<td class="anchotabla1"><b>Cantidad</b></td>
			<td class="fondotabla"><b> Fecha de emision</b></td>
			<td class="fondotabla"><b>Descripción</b></td>
			<td class="fondotabla"><b>Identificador</b></td>
		</tr>

		<?php 
		$consulta = "SELECT * FROM Factura";
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
<form class="widht95">
<div>

  <div class="container">
    <label for="Garantía"><b>Garantias de Clientes</b></label>
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
	$consulta = "SELECT * FROM Garantia ";
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

	
</div>	
</form>			
	<div id="Añadir Cliente" class="tabcontent" class="blanco">


  <div class="zindex4">

  

	<form action="InsertarCliente.php" method="post" class="widht95">
		  <div class="container">
    <label><b>Añadir cliente</b></label>
  </div>
     <input type="text" name="dni" id="dni" value="" placeholder="DNI" class="border10" required="" maxlength="9"/>
     <input type="text" name="nombre" id="nombre" value="" placeholder="Nombre" class="border10" required="" maxlength="50"/>
     <input type="text" name="apellidos" id="apellidos" value="" placeholder="Apellidos" class="border10" required=""maxlength="50"/>
     <input type="text" name="direccion" id="direccion" value="" placeholder="Domicilio" class="border10" required="" maxlength="50"/>
     <input type="number" name="telefono" id="telefono" value="" placeholder="Teléfono" class="border10" required=""/ min="100000000" max="999999999">
     <input type="text" name="contra" id="contra" value="" placeholder="contraseña" class="border10" required="" maxlength="20"/ >
     <input type="submit" value="Registrar Cliente" class="button">
	</form>
	</div>
	<p> </p>
</form>
</div>

<div id="Mantenimiento" class="tabcontent" class="blanco">


  <div class="zindex4">

    <form action="insertarMantenimiento.php" method="post" class="widht95">
          <div class="container">
    <label><b>Añadir mantenimiento</b></label>
  </div>
     <textarea name="descrip" rows="10" cols="131" placeholder="Descripción" class="cajatexto" maxlength="999"  required></textarea>
     <input type="date" name="fecha" title="Introduce fecha de fin de guardia" id="fecha" value="" placeholder="Fecha del mantenimiento" class="border10" required="" />
     <input type="text" name="coste" id="coste" value="" placeholder="Coste" pattern="^[0-9]+([,\.][0-9]*)?$"  class="border10" required=""/>
          <p>ID del Trabajador</p>
     <select name="idTrabajador" id="idTrabajador" value="" placeholder="Identificador del trabajador" class="border12" required="" />
     <?php 
     		
             $listaTrabajador="SELECT IDTRABAJADOR FROM TRABAJADOR";
              $lista= $conexion->query($listaTrabajador);
                 while($row = $lista->fetch(PDO::FETCH_BOTH)){
                                        
                                        echo "<option>$row[0]</option>";
                                    }
                                ?>  
                    
                                    
                     
     
     
     </select>
     <p>ID del cliente</p>
     <select name="idCliente" id="idCliente" value="" placeholder="Identificador del Cliente" class="border12" required="" />
     <?php 
     		
             $listaCliente="SELECT IDCLIENTE FROM CLIENTE";
              $lista2= $conexion->query($listaCliente);
                 while($row = $lista2->fetch(PDO::FETCH_BOTH)){
                                        
                                        echo "<option>$row[0]</option>";
                                    }
                                ?>  
                    
                                    
                     
     
     
     </select>
               <p>Tipo de mantenimiento</p>
    <select  name="tipo" id="tipo" class="floatLeft" >
                <option>NORMAL</option>
                <option>URGENTE</option>
              </select>

     <input type="submit" value="Registrar Mantenimiento" class="button">
    </form>
    </div>
    <p> </p>
</form>
</div>




	<div id="Borrar Cliente" class="tabcontent" class="blanco">

<form class="widht95" action="borrarCliente.php" method="post">

  <div class="container">
    <label for="Borrar Cliente"><b>Clientes</b></label>
  </div>

  <div class="zindex4">

	
		
	<br />

	<table border="1" class="tablas" >
		<tr>
			<td class="fondotabla"><b>ID</b></td>
			<td class="fondotabla"><b>Nombre</b></td>
			<td class="fondotabla"><b>DNI</b></td>
			<td class="fondotabla"><b>Apellidos</b></td>
			<td class="fondotabla"><b>Domicilio</b></td>
			<td class="fondotabla"><b>Password</b></td>
			<td class="fondotabla"><b>Telefono</b></td>
			<td class="fondotabla"><b>Borrar</b></td>
							
		</tr>

		<?php 
		$consulta = "SELECT * FROM Cliente";
$result = $conexion->query($consulta);
		if (!$result) {
    print "    <p>Error en la consulta.</p>\n";
    print "\n";
} else {
    foreach($result as $valor) {  


	echo"<tr>";
			echo"<td>$valor[IDCLIENTE] </td>";
			echo"<td>$valor[NOMBRE] </td>";
			echo"<td>$valor[DNI] </td>";
			echo"<td>$valor[APELLIDOS] </td>";
			echo"<td>$valor[DIRECCION] </td>";
			echo"<td>$valor[CONTRA] </td>";
			echo"<td>$valor[TELEFONO] </td>";
			echo"<td><input type='checkbox' name='ClienteId[]' value='$valor[IDCLIENTE]'></td>";		
	echo"</tr>";
	

		}

	}
	?>  
	</table>
		 	<input type='submit' class='button' value='Borrar cliente' name='BorrarCliente'>

	</div>
	</form>
	
</div>


<div id="Valoracion" class="tabcontent" class="blanco">

<form class="widht95" action="borrarValoracion.php" method="post">

  <div class="container">
    <label for="Borrar Cliente"><b>Valoraciones</b></label>
  </div>
  
  <div class="zindex4">
	
	

  	<?php
	

//CONULTAR SUGERENCIA





//EJEMPLO DE CONSULTA DE SELECCIÓN DE REGISTROS

$consulta = "SELECT * FROM VALORACIONCLIENTE";
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


		echo "<pre> </pre>";
        echo "<p>Descripción: $valor[DESCRIPCION]</p>";
		echo "<p>Nota: $valor[NOTA]<p>";
		echo "<pre> </pre>";
		echo "<p>Cliente: $valor[FKIDCLIENTE]<p>";
		echo "<pre> </pre>";
		echo "<p>$valor[FECHADESCRIPCION]<p>";
		echo "<pre> </pre>";
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
</div>
<div id="Ver Mantenimiento" class="tabcontent" class="blanco">

<form class="widht95" action="borrarMantenimiento.php" method="post">

  <div class="container">
    <label for="Borrar Cliente"><b>Revisar Mantenimientos</b></label>
  </div>
  <div class="zindex4">
  
	
	<br />

	<table border="1" class="tablas" >
		<tr>
			<td class="fondotabla"><b>Descripción</b></td>
			<td class="fondotabla"><b>Fecha revisión</b></td>
			<td class="fondotabla"><b>Próxima revisión</b></td>
			<td class="fondotabla"><b>Tipo</b></td>
			<td class="fondotabla"><b>ID mantenimiento</b></td>
			<td class="fondotabla"><b>ID Trabajador</b></td>
			<td class="fondotabla"><b>ID Cliente</b></td>
			<td class="fondotabla"><b>Borrar</b></td>				
		</tr>

		<?php 
$consulta = "SELECT * FROM MANTENIMIENTO";
$result = $conexion->query($consulta);
		if (!$result) {
    print "    <p>Error en la consulta.</p>\n";
    print "\n";
} else {
    foreach($result as $valor) {  

	echo"<tr>";
			echo"<td>$valor[DESCRIPCION] </td>";
			echo"<td>$valor[FECHA] </td>";
			echo"<td>$valor[FECHAPROXIMAREVISION] </td>";
			echo"<td>$valor[TIPO] </td>";
			echo"<td>$valor[IDMANTENIMIENTO] </td>";
			echo"<td>$valor[FKIDTRABAJADOR] </td>";
			echo"<td>$valor[FKIDCLIENTE] </td>";

			echo"<td><input type='checkbox' name='IDMANTENIMIENTO[]' value='$valor[IDMANTENIMIENTO]'></td>";		
	echo"</tr>";


	}
	}
	?>  
	</table>

		 	<input type='submit' class='button' value='Borrar Mantenimiento' name='BorrarMantenimiento'>
	</div>

</form>
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