<?php

# Lab Task 6
# index.php 

include('model/database_connection.php'); 

session_start(); 

if(!isset($_SESSION['user_id']))
{
    header("location:login.php"); 
}

?>

<html>
<head>
    <title>Users Profile</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">  
</head>
<body>
    <div class="container">
        <br />

        <h3 align="center">Users Dashboard</h3><br />
        <br />

        <div class="table-responsive">
            <h4 align="center">Profile</h4>
            <p align="left">Hi - <?php echo $_SESSION['username'];  ?></p>    
            <p align="left"><a href="showAllUsers.php">View Profile</a></p>
            <p align="left"><a href="http://localhost/WEB%20TECH%20LAB%20TASKS/LAB%20TASK%206/editUser.php?id=1">Edit Profile</a></p>
            <p align="left"><a href="http://localhost/WEB%20TECH%20LAB%20TASKS/LAB%20TASK%206/change_password.php?id=1">Change Password</a></p>
            <p align="left"><a href="logout.php">Logout</a></p>

        </div>
    </div>
</body>
</html>

