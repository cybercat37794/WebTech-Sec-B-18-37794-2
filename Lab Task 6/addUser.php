<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
</head>
<body>
	<h1>Create Account</h1>

 <form action="controller/createUser.php" method="POST" enctype="multipart/form-data">
  <label for="name">Username:</label><br>
  <input type="text" id="username" name="username"><br>

  <label for="username">Email:</label><br>
  <input type="text" id="email" name="email"><br>

  <label for="password">Password:</label><br>
  <input type="password" id="password" name="password"><br>

  <label for="password">Gender:</label><br>
  <input type="password" id="gender" name="gender"><br>


  <input type="submit" name = "createUser" value="Create">
  <input type="reset"> 
</form> 

</body>
</html>

