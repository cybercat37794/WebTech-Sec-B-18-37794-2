<!--CHANGE PASSWORD-->
<!DOCTYPE HTML>
<html>
<head>
<style>
.error {
  color: #FF0000;
}
p1{
  color: green;
}
p2{
  color: red;
}
</style>
</head>
<body>
  <?php include 'Header.php'; ?>

<?php

$nameErr = $passwordERR = "";
$name = $password = "";

$CurrentPassword = $NewPassword = $RetypeNewPassword = "";
$CurrentPasswordErr = $NewPasswordErr = "";


if ($_SERVER["REQUEST_METHOD"] == "POST")
{
  if (empty($_POST["CurrentPassword"]))
  {
    $nameErr = "Current Password is required";
  }
  else
  {
    $CurrentPassword = test_input($_POST["CurrentPassword"]);
    // check if CurrentPassword only contains letters and whitespace//"/^(?![- ])([a-z -])+$/i"//"/^[a-zA-Z- ']*$/"
    if (!preg_match("/^(?![- ])([a-zA-Z0-9-_ '])+$/i",$CurrentPassword))
    {
      $nameErr = "Only letters and white space allowed, Must start with latters and contains atleast two words";
    }
  }
  //###########################NEW PASSWORD FIELD############################################

  if (empty($_POST["NewPassword"]))
  {
    $passwordERR = "Password is required";
  }
  else
  {
    $NewPassword = test_input($_POST["NewPassword"]);

    if (!preg_match("/(?i)^(?=.*[a-z])(?=.*\d).{8,}$/i",$NewPassword))
    {
      $passwordERR = "Invalid password format. Password must contain atleast 8 characters and at least one of special characters (@,#,$,%)";
    }
  }
########################################RETYPE PASSWORD##################################
   if (empty($_POST["RetypeNewPassword"]))
  {
    $passwordERR = "Password is required";
  }
  else
  {
    $RetypeNewPassword = test_input($_POST["RetypeNewPassword"]);

    if (!preg_match("/(?i)^(?=.*[a-z])(?=.*\d).{8,}$/i",$RetypeNewPassword))
    {
      $passwordERR = "Invalid password format. Password must contain atleast 8 characters and at least one of special characters (@,#,$,%)";
    }
  }
########################################RETYPE PASSWORD CHECK FIELD#######################
  if(empty($_POST["RetypeNewPassword"]))
  {
    $passwordERR = "New Password is required";
  }
  if($NewPassword!=$RetypeNewPassword)
  {
    $passwordERR = "New password does not match";
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
  <legend><strong>CHANGE PASSWORD</strong></legend>

  Current Password: <input type="text" name="CurrentPassword" value="<?php echo $CurrentPassword;?>">
  <span class="error">* <?php echo $nameErr;?></span>
  <br><br>

  <p1>New Password:</p1><input type="text" name="NewPassword" value="<?php echo $NewPassword;?>">
  <span class="error">* <?php echo $nameErr;?></span>
  <br><br>

  <p2>Retype New Password:</p2> <input type="text" name="RetypeNewPassword" value="<?php echo $RetypeNewPassword;?>">
  <span class="error">* <?php echo $passwordERR;?></span>
  <br>
  <hr>


  <input type="submit" name="submit" value="Submit">
  <a href="FeedPage.php">Go to Home Feed</a>

  </fieldset>
</form>
<?php include 'Footer.php'; ?>
</body>
</html>
