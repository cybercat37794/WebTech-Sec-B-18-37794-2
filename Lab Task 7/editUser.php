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

  <label class="editUserLabel" for="username">Email:</label><br>
  <input style="border-radius: 7px;" class="editUserInput" value="<?php echo $student['email'] ?>" type="text" id="username" name="username"><br>

  <label class="editUserLabel" for="username">Gender:</label><br>
  <input style="border-radius: 7px;" class="editUserInput" value="<?php echo $student['gender'] ?>" type="text" id="username" name="username"><br>

   <input type="hidden" name="id" value="<?php echo $_GET['id'] ?>">
  <input class="editUserButton" type="submit" name = "updateUser" value="Update">
  <input class="editUserButton" type="reset"> 
</form> 

</body>
</html>

