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
   <title>Users Login</title>   
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
</head>
<body>
       <br />
       <h3 align="left">Login</a></h3>
       <br />
       <br />
           <div>Users Login</div>
               <form method="post">
                   <p class="text-danger"><?php echo $message; ?></p>
                   <div class="form-group">
                       <label>Enter Username: </label>
                       <input style="" type="text" name="username" required />
                   </div>
                   <div class="form-group">
                       <label>Enter Password: </label>
                       <input type="password" name="password" class="" required />
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