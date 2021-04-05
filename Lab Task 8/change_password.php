<?php 

/*require_once 'controller/userInfo.php';
$student = fetchUser($_GET['id']);*/

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
    <h1 class="changePasswordH1">Change Password Field-<?php echo $_SESSION['username'];  ?></h1>

 <form name="confirmPasswordForm" action="controller/updatePassword.php" method="POST" enctype="multipart/form-data">

  <label class="changePasswordLabel" for="Npassword">New Password:</label><br>
  <input style="border-radius: 7px;" class="changePasswordField" value="" type="text" id="Npassword" name="Npassword"><br>
  <p id="PasswordAlart" style="color: red;"></p><br>


   <label class="changePasswordLabel" for="Npassword">Confirm Password:</label><br>
   <input style="border-radius: 7px;" class="changePasswordField" value="" type="text" id="Cpassword" name="Cpassword"><br>
   <p id="ConfirmPasswordAlart" style="color: red;"></p><br>

  
  <input type="hidden" name="id" value="<?php echo $_GET['id'] ?>">
  <input class="changePasswordButton" type="submit" onclick="validatePassword(), validatePasswordMatch()" name = "updateUser" value="Update">
  <input class="changePasswordButton" type="reset"> 
</form> 



<!-- javascript starts here -->
<script>


function validatePassword()
{
   var a = document.forms["confermPasswordForm"]["Npassword"].value;
  if (a == "") 
  {
   text = "Please provide your new password";
  } 
  else 
  {
    text = "Input OK";
  }
  document.getElementById("PasswordAlart").innerHTML = text;
}

function validatePasswordMatch()
{
   var b = document.forms["confirmPasswordForm"]["Cpassword"].value;
  if (b == "") 
  {
   text = "Please provide your confirm password";
  } 
  if (b != a)
  {
    text="password not matched";
  }
  else 
  {
    text = "Input OK";
  }

  document.getElementById("ConfirmPasswordAlart").innerHTML = text;
}

</script>


</body>
</html>

