<!DOCTYPE html>
<html>
<head>
	<title>Create Account</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<h1 style="color: #ff9900; margin-left: 10px;">Create Account</h1>

 <form name="regForm" action="controller/createUser.php" onsubmit="return validateRegister()" method="POST" enctype="multipart/form-data">

  <label style="color: #ff9900; margin-left: 10px;" for="name">Username:</label><br>
  <input style="margin-left: 10px; border-radius: 7px;" type="text" id="username" name="username">
  <p id="UsernameAlart" style="color: white;"></p><br>
  


  <label style="color: #ff9900; margin-left: 10px;" for="username">Email:</label><br>
  <input style="margin-left: 10px; border-radius: 7px;" type="text" id="email" name="email"><br>
  <p id="EmailAlart" style="color: white;"></p><br>

  <label style="color: #ff9900; margin-left: 10px;" for="password">Password:</label><br>
  <input style="margin-left: 10px; border-radius: 7px;" type="password" id="password" name="password"><br>
  <p id="PasswordAlart" style="color: white;"></p><br>

  <label style="color: #ff9900; margin-left: 10px;" for="gender">Gender:</label><br>
  <input style="margin-left: 10px; border-radius: 7px;" type="text" id="gender" name="gender"><br>
  <p id="GenderAlart" style="color: white;"></p><br>


  <input style="margin-left: 10px; margin-top: 10px;" type="submit" onclick="validateUsername(), validateEmail(), validatePassword(), validateGender()" name = "createUser" value="Create">
  <input type="reset"> 
</form> 


<!-- javascript starts here -->
<script>
function validateUsername() 
{
  var x = document.forms["regForm"]["username"].value;
  if (x == "") 
  {
   text = "Please provide your username";
  } 
  else 
  {
    text = "Input OK";
  }
  document.getElementById("UsernameAlart").innerHTML = text;
}

function validateEmail()
{
  var y = document.forms["regForm"]["email"].value;
  if (y == "") 
  {
   text = "Please provide your Email";
  } 
  else 
  {
    text = "Input OK";
  }
  document.getElementById("EmailAlart").innerHTML = text;
}

function validatePassword()
{
   var a = document.forms["regForm"]["password"].value;
  if (a == "") 
  {
   text = "Please provide your password";
  } 
  else 
  {
    text = "Input OK";
  }
  document.getElementById("PasswordAlart").innerHTML = text;
}

function validateGender()
{
   var b = document.forms["regForm"]["gender"].value;
  if (b == "") 
  {
   text = "Please provide your gender";
  } 
  if (b != "Male" || "Female" || "Other")
  {
    text="gender must be Male / Female / Other";
  }
  else 
  {
    text = "Input OK";
  }

  document.getElementById("GenderAlart").innerHTML = text;
}

</script>


</body>
</html>

