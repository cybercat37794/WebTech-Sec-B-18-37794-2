<?php 

session_start();

if (isset($_SESSION['Username'])) {
	session_destroy();
	header("location:LoginLogout.php");
	
}

else{
	header("location:LoginLogout.php");
}

 ?>