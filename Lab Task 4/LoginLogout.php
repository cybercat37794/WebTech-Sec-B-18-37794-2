<!DOCTYPE html>
<html>
<head>
	<title>TalkBuzz</title>
</head>
<body>
	<?php include ('Header.php')?>


	<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
		<table align="center">
			<tr>
				<th colspan="2"><h2>Login</h2></th>
			</tr>
			<?php if(isset($msg)){?>
			<tr>
				<td colspan="2" align="center" valign="top"><?php echo $msg;?></td>
			</tr>
			<?php } ?>
			<tr>
				<td><input type="text" placeholder="Username" name="Username"></td>
			</tr>
			<tr>
				<td><input type="password" placeholder="Password" name="Password"></td>
			</tr>
			<tr>
				<td align="right" colspan="2"><input type="submit" name="login" value="Login"></td>
			</tr>
			<tr>
				<td>
					<a href="ForgotPassword.php">Forgot Password</a>
				</td>
			</tr>
			<tr>
				<td><input type="checkbox" name="">Remember Me</td>
			</tr>
		</table>

	</form>
	<?php include ('Footer.php')?>
</body>
</html>

<?php

session_start();

$username="Imran";
$password="admin";

if (isset($_POST['Username'])) {
	if ($_POST['Username']==$username && $_POST['Password']==$password)
	{
		$_SESSION['Username'] = $username;
		header("location:FeedPage.php");
	}
	else
	{
		$msg="Username or Password invalid";
		echo "<script>alert('Username or Password incorrect!')</script>";
	}
}

?>
