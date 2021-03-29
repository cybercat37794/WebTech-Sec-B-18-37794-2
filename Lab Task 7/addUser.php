<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<h1 style="color: #ff9900; margin-left: 10px;">Create Account</h1>

 <form action="controller/createUser.php" method="POST" enctype="multipart/form-data">
  <label style="color: #ff9900; margin-left: 10px;" for="name">Username:</label><br>
  <input style="margin-left: 10px; border-radius: 7px;" type="text" id="username" name="username"><br>

  <label style="color: #ff9900; margin-left: 10px;" for="username">Email:</label><br>
  <input style="margin-left: 10px; border-radius: 7px;" type="text" id="email" name="email"><br>

  <label style="color: #ff9900; margin-left: 10px;" for="password">Password:</label><br>
  <input style="margin-left: 10px; border-radius: 7px;" type="password" id="password" name="password"><br>

  <label style="color: #ff9900; margin-left: 10px;" for="password">Gender:</label><br>
  <input style="margin-left: 10px; border-radius: 7px;" type="password" id="gender" name="gender"><br>


  <input style="margin-left: 10px; margin-top: 10px;" type="submit" name = "createUser" value="Create">
  <input type="reset"> 
</form> 

</body>
</html>

