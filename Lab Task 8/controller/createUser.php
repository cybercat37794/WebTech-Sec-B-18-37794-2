<?php  
require_once '../model/model.php';


if (!isset($_POST['createUser'])) 
{
	echo "Sorry, there was an error uploading your file.";


  }
  else 
  {
  	$data['username'] = $_POST['username'];
	$data['email'] = $_POST['email'];

	$data['password'] = password_hash($_POST['password'], PASSWORD_BCRYPT, ["cost" => 12]);

	$data['gender'] = $_POST['gender'];
    
  }

  if (addUser($data)) 
  {
  	echo 'Successfully added!!';
  }
else 
{
	echo 'You are not allowed to access this page.';
}

?>