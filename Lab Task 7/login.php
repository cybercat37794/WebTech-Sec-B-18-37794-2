<?php
# Lab task 6
# login.php


include ('model/database_connection.php'); 

session_start();

$message = ''; 

if (isset($_SESSION['user_id']))
{
   header('location:index.php'); 
}
if (isset($_POST['login'])) 
{
   $query = "
   SELECT * FROM profile_details
   WHERE username = :username
   "; 

   $statement = $connect->prepare($query); 
   $statement->execute(
       array(
           ':username' => $_POST['username'],
       )
   );

   $count = $statement->rowCount(); 
   if($count > 0)
   {
       $result = $statement->fetchAll();
       foreach ($result as $row)
       {
           if(password_verify($_POST['password'], $row['password'])) 
           {
               $_SESSION['user_id']  = $row['user_id'];   
               $_SESSION['username'] = $row['username']; 

               header('location:index.php'); 
           }
           else
           {
               $message = '<label>Wrong Password</label>';
           }
       }
   }
   else
   {
       $message = '<label>Wrong Username</label>';
   }
}
?>

<html>
<head>
   <title>TalkBuzz Login</title>   
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
   <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
       <br />
       <h2>TalkBuzz</h2>
       <h3>A friendly chatting website for everyone</h3>
       <br />
       <br />
           <div class="userLogin">Users Login</div>
               <form method="post">
                   <p class="text-danger"><?php echo $message; ?></p>
                   <div class="form-group">
                       <label class="labelStyle">Enter Username: </label>
                       <input style="border-radius: 7px;" type="text" name="username" required />
                   </div>
                   <div class="form-group">
                       <label class="labelStyle">Enter Password: </label>
                       <input style="border-radius: 7px;" type="password" name="password" required />
                   </div>
                   <div class="form-group">
                       <input type="submit" name="login" class="btn btn-info" value="Login" />
                   </div>
                   <div class="form-group">
                       <a href="addUser.php">Create Account</a>
                   </div>

               </form>

</body>
</html>