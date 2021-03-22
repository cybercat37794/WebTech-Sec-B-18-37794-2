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
</head>
<body>
    <h1>Change Password-<?php echo $_SESSION['username'];  ?></h1>

 <form action="controller/updatePassword.php" method="POST" enctype="multipart/form-data">

  <label for="Npassword">New Password:</label><br>
  <input value="" type="text" id="Npassword" name="Npassword"><br>


    <label for="Npassword">Confirm Password:</label><br>
  <input value="" type="text" id="Cpassword" name="Cpassword"><br>

  
  <input type="hidden" name="id" value="<?php echo $_GET['id'] ?>">
  <input type="submit" name = "updateUser" value="Update">
  <input type="reset"> 
</form> 

</body>
</html>

