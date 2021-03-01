<?php include('Header.php')?>

<?php

session_start();

if (isset($_SESSION['Username']))
{
	echo "<h2>Profile</h2>";
	echo "<a href='FeedPage.php'>back to feed page</a> <br> <a href='EditProfile.php'>Edit Profile</a>";
	echo "<br>";
}

else{
	header("location:LoginLogout.php");
}
 ?>
<!--#########################################################################################-->
<!DOCTYPE HTML>
<html>

<head>
	<style>
		.error {
			color: #FF0000;
		}
	</style>
</head>

<body>

<?php
// define variables and set to empty values
$nameErr = $emailErr = $PasswordErr = $CPasswordErr = $genderErr = $DOBErr = $DegreeErr = "";
$name = $email = $Password = $CPassword = $gender = $DOB = "";

if ($_SERVER["REQUEST_METHOD"] == "POST")
{
	if (empty($_POST["name"]))
	{
		$nameErr = "Name is required";
	}
	else
	{
		$name = test_input($_POST["name"]);
		// check if name only contains letters and whitespace//"/^(?![- ])([a-z -])+$/i"//"/^[a-zA-Z- ']*$/"
		if (!preg_match("/^(?![- ])([a-zA-Z- '])+$/i",$name))
		{
			$nameErr = "Only letters and white space allowed, Must start with latters and contains atleast two words";
		}
	}

	if (empty($_POST["email"]))
	{
		$emailErr = "Email is required";
	}
	else
	{
		$email = test_input($_POST["email"]);
		// check if e-mail address is well-formed
		if (!filter_var($email, FILTER_VALIDATE_EMAIL))
		{
			$emailErr = "Invalid email format";
		}
	}
##############################################PASSWORD FIELD ###################################
	if (empty($_POST["Password"]))
	{
		$PasswordErr = "Password is required";
	}
	else
	{
		$Password = test_input($_POST["Password"]);
		// check if name only contains letters and whitespace//"/^(?![- ])([a-z -])+$/i"//"/^[a-zA-Z- ']*$/"
		if (!preg_match("/(?i)^(?=.*[a-z])(?=.*\d).{8,}$/i",$Password))
		{
			$PasswordErr = "Invalid password format. Password must contain atleast 8 characters and at least one of special characters (@,#,$,%)";
		}
	}
######################################### CONFERM PASSWORD FIELD ###############################
	if (empty($_POST["CPassword"]))
	{
		$CPasswordErr="password is required";
	}

	if ($Password != $CPassword)//abcd1234
	{
		$CPasswordErr="PASSWORD does not match";
		# code...
	}



//#######################################Date of Birth starts here#################################


	if (empty($_POST["Year"]))
	{
		$DOBErr="Date of Birth is required";
	}
	else
	{
		$Year = $_POST['Year'];
		$Month = $_POST['Month'];
		$Date = $_POST['Date'];

		if ($Year != '' && $Month != '' && $Date != '')
		{
			$DOB = $Date.'-'.$Month.'-'.$Year; //$Date.'-'.$Month.'-'.$Year
		}
	}


//################################################################################################

	if (empty($_POST["gender"]))
	{
		$genderErr = "Gender is required";
	}
	else
	{
		$gender = test_input($_POST["gender"]);
	}


}

function test_input($data)
{
	$data = trim($data);
	$data = stripslashes($data);
	$data = htmlspecialchars($data);
	return $data;
}

?>
<!--######################################################################################-->
<!--######################################################################################-->
<!--######################################################################################-->
<!--########################### HTML START ###############################################-->
<!--######################################################################################-->
<!--######################################################################################-->
<!--######################################################################################-->
<!--######################################################################################-->
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
	<fieldset>
		<legend><strong>REGISTATION</strong></legend>
		Name: Imran
		<span class="error">* <?php echo $nameErr;?></span>
		<br><hr>

		E-mail: Imran@Yahoo.com
		<span class="error">* <?php echo $emailErr;?></span>
		<br><hr>

		User Name: Imran Ahmed
		<span class="error">* <?php echo $nameErr;?></span>
		<br><hr>

		Password: admin
		<span class="error">* <?php echo $PasswordErr;?></span>
		<br><hr>

		<fieldset>
			<legend>Gender</legend>
			Male
			<br>
		</fieldset>
<hr>
<!--##########################Date of Birth field START###########################################-->
	<fieldset>
		<legend>Date of Birth</legend>
		16-1-1999

	    <span class="error">* <?php echo $DOBErr;?></span>
	 </fieldset>
<hr>
<!--#################################DATE OF BIRTH END###########################################-->


	</fieldset>
</form>
</body>
</html>
<!--#############################################################################################-->

<?php include ('Footer.php')?>
