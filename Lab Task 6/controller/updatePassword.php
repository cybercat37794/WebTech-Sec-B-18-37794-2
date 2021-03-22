<?php  
require_once '../model/model.php';


if (isset($_POST['updatePassword'])) 
{
    if($_POST['Npassword'] == $$_POST['Cpassword'])
    {
        $data['password'] = password_hash($_POST['Npassword'], PASSWORD_BCRYPT, ["cost" => 12]);
    }
    if (updatePassword($_POST['id'], $data)) 
    {
        echo 'Successfully updated!!';


        header('Location: ../showUser.php?id=' . $_POST["id"]);
    }
} 
else 
{
    echo 'You are not allowed to access this page.';
}


?>