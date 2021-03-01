<?php include ('Header.php')?>


<?php

session_start();

if (isset($_SESSION['Username']))
{
	echo"" ;
	echo "<h1> Welcome, ".$_SESSION['Username']."</h2>";
	echo "<a href='Profile.php'>Profile</a><br>";
	echo "<br> <a href='LoginLogout.php'>Logout</a><br>";
	echo "<br> <a href='Profile.php'>View Profile</a><br>";
	echo "<br> <a href='EditProfile.php'>Edit Profile</a><br>";
	echo "<br> <a href='ChangePassword.php'>Change Password</a><br>";
}
else
{
		$msg="error";
		header("location:LoginLogout.php");
		// echo "<script>location.href='login.php'</script>";
	}
 ?>

 <?php include ('Footer.php')?>
