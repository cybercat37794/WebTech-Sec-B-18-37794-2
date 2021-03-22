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
	<h1>Edit Profile</h1>

 <form action="controller/updateUser.php" method="POST" enctype="multipart/form-data">
  <label for="name">Username:</label><br>
  <input value="<?php echo $student['username'] ?>" type="text" id="name" name="name"><br>

  <label for="username">Email:</label><br>
  <input value="<?php echo $student['email'] ?>" type="text" id="username" name="username"><br>

  <label for="username">Gender:</label><br>
  <input value="<?php echo $student['gender'] ?>" type="text" id="username" name="username"><br>

   <input type="hidden" name="id" value="<?php echo $_GET['id'] ?>">
  <input type="submit" name = "updateUser" value="Update">
  <input type="reset"> 
</form> 

</body>
</html>

