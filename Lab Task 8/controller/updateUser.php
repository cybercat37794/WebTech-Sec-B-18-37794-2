<?php  
require_once '../model/model.php';


if (isset($_POST['updateUser'])) 
{

	$data['name'] = $_POST['name'];

	$data['username'] = $_POST['username'];
	// $data['password'] = password_hash($_POST['password'], PASSWORD_BCRYPT, ["cost" => 12]);;
	// $data['image'] = basename($_FILES["image"]["name"]);

	$target_dir = "../uploads/";
	// $target_file = $target_dir . basename($_FILES["image"]["name"]);


  if (updateStudent($_POST['id'], $data)) {
  	echo 'Successfully updated!!';

  	header('Location: ../showUser.php?id=' . $_POST["id"]);
  }
} else {
	echo 'You are not allowed to access this page.';
}


?>