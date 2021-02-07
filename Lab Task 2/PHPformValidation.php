<!DOCTYPE HTML>  
<html>
<head>
<style>
.error {color: #FF0000;}
</style>
</head>
<body>  

<?php
// define variables and set to empty values
$nameErr = $emailErr = $genderErr = $websiteErr = $DOBErr = $BloodGroupErr = $DegreeErr = "";
$name = $email = $gender = $comment = $website = $DOB = $Degree1 = $Degree2 = $Degree3 = $Degree4 = $BloodGroup = "";

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
    if (!preg_match("/^(?![- ])([a-zA-Z- '])+$/i",$name)) 
    {
      $nameErr = "Only letters and white space allowed, Must start with latters and contains atleast two words";
    }
  }
  
  if (empty($_POST["email"])) 
  {
    $emailErr = "Email is required";
  } 
  else 
  {
    $email = test_input($_POST["email"]);
    // check if e-mail address is well-formed
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) 
    {
      $emailErr = "Invalid email format";
    }
  }
    
//#######################################Date of Birth starts here#################################


  if (empty($_POST["Year"])) 
  {
    $DOBErr="Date of Birth is required";
  }
  else
  {
    $Year = $_POST['Year'];
    $Month = $_POST['Month'];
    $Date = $_POST['Date'];

    if ($Year != '' && $Month != '' && $Date != '') 
      {
        $DOB = $Date.'-'.$Month.'-'.$Year; //$Date.'-'.$Month.'-'.$Year
        //echo $DOB;
      }

}


//################################################################################################

  if (empty($_POST["gender"])) 
  {
    $genderErr = "Gender is required";
  } 
  else 
  {
    $gender = test_input($_POST["gender"]);
  }

//###################################Degree Recieving here#######################################
  if (empty($_POST["Degree1"]))
  {
    $DegreeErr="Degree required";
  }
  else
  {
    $Degree1=test_input($_POST["Degree1"]);
    $Degree2=test_input($_POST["Degree2"]);
    $Degree3=test_input($_POST["Degree3"]);
    $Degree4=test_input($_POST["Degree4"]);
  }

    if (empty($_POST["Degree2"]))
  {
    $DegreeErr="Degree required";
  }
  else
  {
    $Degree2=test_input($_POST["Degree2"]);
  }

    if (empty($_POST["Degree3"]))
  {
    $DegreeErr="Degree required";
  }
  else
  {
    $Degree3=test_input($_POST["Degree3"]);
  }

  if (empty($_POST["Degree4"]))
  {
    $DegreeErr="Degree required";
  }
  else
  {
    $Degree4=test_input($_POST["Degree4"]);
  }
//#############################################################################################
//#####################################Blood group#############################################
  if (empty($_POST["BloodGroup"]))
  {
    $BloodGroupErr="Blood Group required";
  }
  else
  {
    $BloodGroup=test_input($_POST["BloodGroup"]);
  }
//#############################################################################################
}


function test_input($data) 
{
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>

<h2>PHP Form </h2>

<p><span class="error">* required field</span></p>

<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"> 
  <fieldset>
  <legend><strong>PHP Form:</strong></legend> 
  
  Name: <input type="text" name="name" value="<?php echo $name;?>">
  <span class="error">* <?php echo $nameErr;?></span>
  <br><br>
  
  E-mail: <input type="text" name="email" value="<?php echo $email;?>">
  <span class="error">* <?php echo $emailErr;?></span>
  <br><br>
<!--##########################Date of Birth field#############################################-->  
  Date of Birth: 

  <select name="Date">
  <option value="">Select date</option>
  <?php for ($i = 1; $i <= 31; $i++) : ?>
  <option value="<?php echo ($i < 10) ? '0'.$i : $i; ?>"><?php echo $i; ?></option>
  <?php endfor; ?>
  </select>

  <select name="Month">
  <option value="">Select month</option>
  <?php for ($i = 1; $i <= 12; $i++) : ?>
  <option value="<?php echo ($i < 10) ? '0'.$i : $i; ?>"><?php echo $i; ?></option>
  <?php endfor; ?>
  </select>


  <select name="Year">
  <option value="">Select year</option>
  <?php for ($i = 1900; $i < date('Y'); $i++) : ?>
  <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
  <?php endfor; ?>
  </select>




  <span class="error">* <?php echo $DOBErr;?></span>
  <br><br>
 <!--################################################################################################-->  
  Gender:
  <input type="radio" name="gender" <?php if (isset($gender) && $gender=="female") echo "checked";?> value="female">Female
  <input type="radio" name="gender" <?php if (isset($gender) && $gender=="male") echo "checked";?> value="male">Male
  <input type="radio" name="gender" <?php if (isset($gender) && $gender=="other") echo "checked";?> value="other">Other  
  <span class="error">* <?php echo $genderErr;?></span>
  <br><br>

  Degree: 
  <input type="checkbox" name="Degree1" value="SSC">SSC</input>
  <input type="checkbox" name="Degree2" value="HSC">HSC</input>
  <input type="checkbox" name="Degree3" value="BSc">BSc</input>
  <input type="checkbox" name="Degree4" value="MSc">MSc</input>
  <span class="error">* <?php echo $DegreeErr;?></span>
  <br>

  Blood Group: 
  <select name="BloodGroup">
    <option value="A+">A+</option>
    <option value="A-">A-</option>
    <option value="B+">B+</option>
    <option value="B-">B-</option>
    <option value="AB+">AB+</option>
    <option value="AB-">AB-</option>
    <option value="O+">O+</option>
    <option value="O-">O-</option>
  </select>
  <span class="error">* <?php echo $BloodGroupErr;?></span>

    <br><br>
  
  <input type="submit" name="submit" value="Submit">  

  </fieldset>
</form>

<?php
echo "<h2>Your Input:</h2>";
echo $name;
echo "<br>";

echo $email;
echo "<br>";

echo $DOB;
//echo $date;
echo "<br>";

echo $gender;
echo "<br>";

echo $Degree1," ", $Degree2," ", $Degree3," ", $Degree4;
echo "<br>";

echo $BloodGroup;

?>

</body>
</html>