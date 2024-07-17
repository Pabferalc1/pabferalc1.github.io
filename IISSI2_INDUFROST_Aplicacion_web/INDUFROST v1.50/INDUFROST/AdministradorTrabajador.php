
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
 			<a href="AdministradorTrabajador.php"><button class="AdministradorTrabajador">Trabajador</button></a>
 			<a href="AdministradorCliente.php"><button class="AdministradorCliente1">Cliente</button></a>
 		</div>
		<pre> </pre>

	<div class="container" >
			
		<div class="tab">
 			<button  class="tablinks" onclick="openlogin(event, 'Añadir Trabajador')" id="defaultOpen"  >Añadir</button>
 			<button  class="tablinks" onclick="openlogin(event, 'Consultar')"   >Consultar</button>
 			<button  class="tablinks" onclick="openlogin(event, 'Sugerencias')"   >Sugerencias</button>
 			<button  class="tablinks" onclick="openlogin(event, 'Horarios')"   >Horarios</button>
 		</div>
 	</div>
 	
			
	<div id="Añadir Trabajador" class="tabcontent" class="blanco">


  
  <div class="zindex4">

	<form action="InsertarTrabajador.php" method="post" class="widht95">
	  <div class="container">
    <label><b>Añadir trabajador</b></label>
  </div>
     <input type="text" name="DNITrabajador" id="DNItrabajador" value="" placeholder="12345678X" pattern="^[0-9]{8}[A-Z]"class="border10" required="" maxlength="9"/>

     <input type="text" name="NombreTrabajador" id="NombreTrabajador" value="" placeholder="Nombre" class="border10" required="" maxlength="50"/>
   
     <input type="text" name="ApellidosTrabajador" id="Apellidostrabajador" value="" placeholder="Apellidos" class="border10" required="" maxlength="50"/>
     <input type="text" name="DomicilioTrabajador" id="DomicilioTrabajador" value="" placeholder="Domicilio" class="border10" required="" maxlength="50"/>
     <input type="text" name="EmailTrabajador" id="EmailTrabajador" value="" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" placeholder="nombre@email.com" class="border10" required="" maxlength="50"/>
     <input type="text" name="TelefonoTrabajador" id="TelefonoTrabajador" title="Se compone de 9 digitos" value="" placeholder="Teléfono" pattern="^[0-9]{9}" class="border10" required=""  />
     <input type="text" name="contra" id="contra" value="" placeholder="contraseña" class="border10" required="" maxlength="20"/>
     <input type="submit" value="ACEPTAR" class="button">
	</form>
	</div>
	<p> </p>
</form>
</div>

<div id="Horarios" class="tabcontent" class="blanco">


  
  <div class="zindex4">

	<form action="insertarHorario.php" method="post" class="widht95">
	  <div class="container">
    <label><b>Añadir Horario</b></label>
  </div>
     <select name="Dias" id="Dias" value="" placeholder="Dia de la Semana" class="border12" required />
     <option >Lunes</option>
     <option >Martes</option>
     <option >Miercoles</option>
     <option >Jueves</option>
     <option >Viernes</option>
     <option >Sabado</option>
     <option >Domingo</option>
     
     
     </select>
     	
     	
     	

     <input type="date" name="fecha" title="Introduce hora de inicio" id="HoraInicio" value=""  maxlength="10" placeholder="Hora de Inicio" class="border11" required />
   
     
     <select  name="IdTra" id="IdTra"  placeholder="Identificador del trabajador" class="border12" required />
     
     <?php 
     		
             $listaTrabajador="SELECT IDTRABAJADOR FROM TRABAJADOR";
              $lista= $conexion->query($listaTrabajador);
                 while($row = $lista->fetch(PDO::FETCH_BOTH)){
                                        
                                        echo "<option>$row[0]</option>";
                                    }
                                ?>  
                    
                                    
                     
     
     
     </select>
     
     
     <input type="submit" value="ACEPTAR" class="button">
	</form>
	</div>
	<p> </p>
</form>

<div class="zindex4">

	<form action="insertarGuardia.php" method="post" class="widht95">
	  <div class="container">
    <label><b>Añadir Guardia</b></label>
  </div>
    <select name="Dias" id="Dias" value="" placeholder="Dia de la Semana" class="border12" required />
     <option >Lunes</option>
     <option >Martes</option>
     <option >Miercoles</option>
     <option >Jueves</option>
     <option >Viernes</option>
     <option >Sabado</option>
     <option >Domingo</option>
     
     
     </select>

     <input type="date"  name="fecha" title="Introduce fecha de inicio"  id="fecha" value="" placeholder="Fecha de Inicio" class="border11" required="" />
   	
   	<input type="date" name="fecha2" title="Introduce fecha de fin de guardia" id="fecha2" value="" placeholder="Fecha de fin de a guardia" class="border11" required="" />
     
     <select name="IdTra" id="IdTra" value="" placeholder="Identificador del trabajador" class="border12" required="" />
     <?php 
     		
             $listaTrabajador="SELECT IDTRABAJADOR FROM TRABAJADOR";
              $lista= $conexion->query($listaTrabajador);
                 while($row = $lista->fetch(PDO::FETCH_BOTH)){
                                        
                                        echo "<option>$row[0]</option>";
                                    }
                                ?>  
                    
                                    
                     
     
     
     </select>
     
     
     
     </select>
     <input type="submit" value="ACEPTAR" class="button">
	</form>
	</div>
	<p> </p>
</form>
<form class="widht95" action="eliminarHorario.php" method="post">
	
	<label><b>Eliminar Horarios</b></label>
<div class="zindex4">

  	<?php
	

//CONULTAR SUGERENCIA






//EJEMPLO DE CONSULTA DE SELECCIÓN DE REGISTROS

$consulta = "SELECT * FROM HORARIO";

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
        echo "<p>DIA: $valor[DIAS]</p>";
		echo "<pre> </pre>";
		echo "<p>$valor[HORAINICIO]<p> Trabajador ID: $valor[FKIDTRABAJADOR]";
		   
        echo "</div>"; 
        			echo "<label class='container2'>";
       				echo "<input type='checkbox' name='HorarioId[]' value='$valor[IDHORARIO]'>";
       				echo " <span class='checkmark'></span>";
					echo "</label>";		
        print "\n";

    }
	 	echo "<input type='submit' class='button' value='Borrar Horario' >";
	}

}



  	
  	?>

</div>
</form>

<form class="widht95" action="eliminarGuardia.php" method="post">
	
	<label><b>Eliminar Guardias</b></label>
<div class="zindex4">

  	<?php
	

//CONULTAR SUGERENCIA






//EJEMPLO DE CONSULTA DE SELECCIÓN DE REGISTROS

$consulta = "SELECT * FROM Guardia";

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
        echo "<p>DIA: $valor[DIAS]</p>";
		echo "<pre> </pre>";
		echo "<p>$valor[FECHAINICIO]<p> Trabajador ID: $valor[FKIDTRABAJADOR]";
		   
        echo "</div>"; 
        			echo "<label class='container2'>";
       				echo "<input type='checkbox' name='GuardiaId[]' value='$valor[IDGUARDIA]'>";
       				echo " <span class='checkmark'></span>";
					echo "</label>";		
        print "\n";

    }
	 	echo "<input type='submit' class='button' value='Borrar Guardia' >";
	}

}



  	
  	?>

</div>
</form>


</div>

<div id="Consultar" class="tabcontent" class="blanco">

<form class="widht95" action="borrarTrabajador.php" method="post">
	
	<label><b>Trabajadores</b></label>
<div class="zindex4">
  
	
	<br />

	<table border="1" class="tablas" >
		<tr>
			<td class="fondotabla"><b>ID</b></td>
			<td class="fondotabla"><b>DNI</b></td>
			<td class="fondotabla"><b>Nombre</b></td>
			<td class="fondotabla"><b>Apellidos</b></td>
			<td class="fondotabla"><b>Domicilio</b></td>
			<td class="fondotabla"><b>Email</b></td>
			<td class="fondotabla"><b>Password</b></td>
			<td class="fondotabla"><b>Telefono</b></td>
			<td class="fondotabla"><b>Borrar</b></td>				
		</tr>

		<?php 
		$consulta = "SELECT * FROM Trabajador";
$result = $conexion->query($consulta);
		if (!$result) {
    print "    <p>Error en la consulta.</p>\n";
    print "\n";
} else {
    foreach($result as $valor) {  

	echo"<tr>";
			echo"<td>$valor[IDTRABAJADOR] </td>";
			echo"<td>$valor[DNI] </td>";
			echo"<td>$valor[NOMBRE] </td>";
			echo"<td>$valor[APELLIDOS] </td>";
			echo"<td>$valor[DOMICILIO] </td>";
			echo"<td>$valor[EMAIL] </td>";
			echo"<td>$valor[CONTRA] </td>";
			echo"<td>$valor[TELEFONO] </td>";
			echo"<td><input type='checkbox' name='TrabajadorId[]' value='$valor[IDTRABAJADOR]'></td>";		
	echo"</tr>";


	}
	}
	?>  
	</table>

		 	<input type='submit' class='button' value='Borrar Trabajador' name='BorrarTrabajador'>
	</div>
	</form>
</div>




<div id="Sugerencias" class="tabcontent" class="blanco">

<form  class="widht95" action="borrarSugerencias.php" method="post">

  <div class="container">
    <label><b>Sugerencias</b></label>
  </div>
  
  <div class="zindex4">
	
	

  	<?php
	

//CONULTAR SUGERENCIA




//EJEMPLO DE CONSULTA DE SELECCIÓN DE REGISTROS

$consulta = "SELECT * FROM SUGERENCIAS";
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
		echo "<pre> </pre>";
		echo "<p>Trabajador: $valor[FKIDTRABAJADOR]</p>";
		echo "<pre> </pre>";
		echo "<p>$valor[FECHADESCRIPCION]<p>";
		
        echo "</div>"; 
        			echo "<label class='container2'>";
       				echo "<input type='checkbox' name='sugerenciaId[]' value='$valor[IDSUGERENCIAS]'>";
       				echo " <span class='checkmark'></span>";
					echo "</label>";		
        print "\n";

    }
	 	echo "<input type='submit' class='button' value='Borrar Sugerencia' name='BorrarSugerencias'>";
	}

}



  	
  	?>




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