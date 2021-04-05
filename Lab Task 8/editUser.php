<?php 

require_once 'controller/userInfo.php';
$student = fetchUser($_GET['id']);
session_start(); 

if(!isset($_SESSION['user_id']))
{
    header("location:login.php"); 
}

 ?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<h1 class="editProfileH1">Edit Profile</h1>

 <form action="controller/updateUser.php" method="POST" enctype="multipart/form-data">
  <label class="editUserLabel" for="name">Username:</label><br>
  <input style="border-radius: 7px;" class="editUserInput" value="<?php echo $student['username'] ?>" type="text" id="name" name="name"><br>
  <p id="UsernameAlart" style="color: red;"></p><br>

  <label class="editUserLabel" for="username">Email:</label><br>
  <input style="border-radius: 7px;" class="editUserInput" value="<?php echo $student['email'] ?>" type="text" id="username" name="username"><br>
  <p id="EmailAlart" style="color: red;"></p><br>

  <label class="editUserLabel" for="username">Gender:</label><br>
  <input style="border-radius: 7px;" class="editUserInput" value="<?php echo $student['gender'] ?>" type="text" id="username" name="username"><br>
  <p id="GenderAlart" style="color: red;"></p><br>

   <input type="hidden" name="id" value="<?php echo $_GET['id'] ?>">
  <input class="editUserButton" type="submit" onclick="validateUsername(), validateEmail(), validateGender()" name = "updateUser" value="Update">
  <input class="editUserButton" type="reset"> 
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


</script>

</body>
</html>

