<?php include ('Header.php')?>
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
	<h1>Create Account</h1>
	<fieldset>
	<legend><strong>UPLOAD PROFILE PICTURE</strong></legend>
<form action="CreateAccount.php" method="post" enctype="multipart/form-data">

  <input type="file" name="fileToUpload" id="fileToUpload">
  <hr>
  <input type="submit" value="Upload" name="Submit">
</form>
</fieldset>

<?php
$target_dir = "E:/Softwere/Xampp/Xampp install/htdocs/WEB TECH LAB TASKS/LAB TASK 4/Lab Task 4 Submitable file/Profile Pictures/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
  $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
  if($check !== false) {
    echo "File is an image - " . $check["mime"] . ".";
    $uploadOk = 1;
  }
  else
  {
    echo "File is not an image.";
    $uploadOk = 0;
  }
}

// Check if file already exists
if (file_exists($target_file)) {
  echo "Sorry, file already exists.";
  $uploadOk = 0;
}

// Check file size
if ($_FILES["fileToUpload"]["size"] > 4000000000) {
  echo "Sorry, your file is too large.";
  $uploadOk = 0;
}

// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
  echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
  $uploadOk = 0;
}

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
  echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
  if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
    echo "The file ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " has been uploaded.";//upload
  } else {
    echo "Sorry, there was an error uploading your file.";
  }
}
echo "<img src=".$target_dir."height=200 width=300/>";
?>

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
		<legend><strong>CREATE ACCOUNT</strong></legend>

		Name: <input type="text" name="name" value="<?php echo $name;?>">
		<span class="error">* <?php echo $nameErr;?></span>
		<br><hr>

		E-mail: <input type="text" name="email" value="<?php echo $email;?>">
		<span class="error">* <?php echo $emailErr;?></span>
		<br><hr>

		User Name: <input type="text" name="name" value="<?php echo $name;?>">
		<span class="error">* <?php echo $nameErr;?></span>
		<br><hr>

		Password: <input type="password" name="Password" value="<?php echo $Password;?>">
		<span class="error">* <?php echo $PasswordErr;?></span>
		<br><hr>

		Conferm Password: <input type="password" name="CPassword" value="<?php echo $CPassword;?>">
		<span class="error">* <?php echo $PasswordErr;?></span>
		<br><hr>

		<fieldset>
			<legend>Gender</legend>
			<input type="radio" name="gender" <?php if (isset($gender) && $gender=="female") echo "checked";?>value="female">Female

			<input type="radio" name="gender" <?php if (isset($gender) && $gender=="male") echo "checked";?> value="male">Male

			<input type="radio" name="gender" <?php if (isset($gender) && $gender=="other") echo "checked";?> value="other">Other

			<span class="error">* <?php echo $genderErr;?></span>
			<br>
		</fieldset>
<hr>
<!--##########################Date of Birth field START###########################################-->
	<fieldset>
		<legend>Date of Birth</legend>
		<select name="Date">
			<option value="">Select date</option>
			<?php for ($i = 1; $i <= 31; $i++) : ?>
				<option value="<?php echo ($i < 10) ? '0'.$i : $i; ?>"><?php echo $i; ?></option>
			<?php endfor; ?>
		</select>

		<select name="Month">
			<option value="">Select month</option>
			<?php for ($i = 1; $i <= 12; $i++) : ?>
				<option value="<?php echo ($i < 10) ? '0'.$i : $i; ?>"><?php echo $i; ?></option>
			<?php endfor; ?>
		</select>

		<select name="Year">
			<option value="">Select year</option>
			<?php for ($i = 1900; $i < date('Y'); $i++) : ?>
				<option value="<?php echo $i; ?>"><?php echo $i; ?></option>
			<?php endfor; ?>
	    </select>

	    <span class="error">* <?php echo $DOBErr;?></span>
	 </fieldset>
<hr>
<!--#################################DATE OF BIRTH END###########################################-->


	<input type="submit" name="submit" value="Save Change">
	<input type="reset" name="reset" value="Reset">
	<a href="BoringCompanyHome.php">Go to Home page</a>

	</fieldset>
</form>
</body>
</html>
<?php include ('Footer.php')?>
