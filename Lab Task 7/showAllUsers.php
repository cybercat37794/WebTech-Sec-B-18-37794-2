<?php  
require_once 'controller/userInfo.php';

$students = fetchAllUsers();
session_start(); 

if(!isset($_SESSION['user_id']))
{
    header("location:login.php"); 
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>View Profile Information</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<h1 class="ViewProfileH1">View Profile</h1>
<table>
	<thead>
		<tr>
			<th>Name</th>	
			
			<th>Username</th>
			<th>Password</th>
			<th>Email</th>
			<th>Gender</th>
			<th>Action</th>
		</tr>
	</thead>
	<tbody>
		<?php foreach ($students as $i => $student): ?>
			
			<tr>
				<td><a href="showUser.php?id=<?php echo $student['user_id'] ?>"><?php echo $student['username'] ?></a></td>

				<td><?php echo $student['username'] ?></td>
				
				<td><?php echo $student['password'] ?></td>
				<td><?php echo $student['email'] ?></td>
				<td><?php echo $student['gender'] ?></td>

				<td><a href="editUser.php?id=<?php echo $student['user_id'] ?>">Edit</a>
					&nbsp
					<a href="controller/deleteUser.php?id=<?php echo $student['user_id'] ?>">Delete Account</a>					
				</td>
				<br>
				
					<a href="index.php?id=<?php echo $student['user_id'] ?>">Back to Dashboard</a>
				
			</tr>
		<?php endforeach; ?>
		

	</tbody>
	

</table>


</body>
</html>