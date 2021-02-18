<!DOCTYPE HTML>  
<html>
<head>
<style>
.error {color: #FF0000;}
</style>
</head>
<body>  

<?php

$nameErr = $passwordERR = "";
$name = $password = $RememberMe = "";

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
    if (!preg_match("/^(?![- ])([a-zA-Z0-9-_ '])+$/i",$name)) 
    {
      $nameErr = "Only letters and white space allowed, Must start with latters and contains atleast two words";
    }
  }
  //###########################PASSWORD FIELD##########################################################
  
  if (empty($_POST["password"])) 
  {
    $passwordERR = "Password is required";
  } 
  else 
  {
    $password = test_input($_POST["password"]);
    
    if (!preg_match("/(?i)^(?=.*[a-z])(?=.*\d).{8,}$/i",$password)) 
    {
      $passwordERR = "Invalid password format. Password must contain atleast 8 characters and at least one of special characters (@,#,$,%)";
    }
  }    

  if (empty($_POST["RememberMe"]))
  {

  }
  else
  {
    $RememberMe=test_input($_POST["RememberMe"]);

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


<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"> 
  <fieldset>
  <legend><strong>LOGIN</strong></legend> 
  
  Name: <input type="text" name="name" value="<?php echo $name;?>">
  <span class="error">* <?php echo $nameErr;?></span>
  <br><br>
  
  Password: <input type="text" name="password" value="<?php echo $password;?>">
  <span class="error">* <?php echo $passwordERR;?></span>
  <br>
  <hr>
  
  <input type="checkbox" name="RememberMe" value="RememberMe">Remember Me</input>

    <br><br>
  
  <input type="submit" name="submit" value="Submit">  <a href="#">Forgot Password?</a> 

  </fieldset>
</form>

</body>
</html>