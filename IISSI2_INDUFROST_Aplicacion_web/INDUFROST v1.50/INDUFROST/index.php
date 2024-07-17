 <?php session_start();

if (isset($_SESSION['usuario'])) {
 
	header('location:principal.php');
	
	
} elseif (isset($_SESSION['usuario2'])) {
 
	header('location:principal.php');



} elseif (isset($_SESSION['usuario3'])) {
 
	header('location:principal.php');



}
else {
	header('location:login.php');
	
}






 ?> 
 
