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

 <form action="controller/updatePassword.php" method="POST" enctype="multipart/form-data">

  <label class="changePasswordLabel" for="Npassword">New Password:</label><br>
  <input style="border-radius: 7px;" class="changePasswordField" value="" type="text" id="Npassword" name="Npassword"><br>


   <label class="changePasswordLabel" for="Npassword">Confirm Password:</label><br>
   <input style="border-radius: 7px;" class="changePasswordField" value="" type="text" id="Cpassword" name="Cpassword"><br>

  
  <input type="hidden" name="id" value="<?php echo $_GET['id'] ?>">
  <input class="changePasswordButton" type="submit" name = "updateUser" value="Update">
  <input class="changePasswordButton" type="reset"> 
</form> 

</body>
</html>

