<?php 

require_once 'database_connection.php';


function showAllUsers(){
	$conn = db_conn();
    $selectQuery = 'SELECT * FROM `profile_details` ';
    try{
        $stmt = $conn->query($selectQuery);
    }catch(PDOException $e){
        echo $e->getMessage();
    }
    $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $rows;
}

function showUser($id){
	$conn = db_conn();
	$selectQuery = "SELECT * FROM `profile_details` where user_id = ?";

    try {
        $stmt = $conn->prepare($selectQuery);
        $stmt->execute([$id]);
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
    $row = $stmt->fetch(PDO::FETCH_ASSOC);

    return $row;
}



function addUser($data){
	$conn = db_conn();
    $selectQuery = "INSERT into profile_details (username, email, gender, password)
VALUES (:username, :email, :gender, :password)";
    try{
        $stmt = $conn->prepare($selectQuery);
        $stmt->execute([
        	':username' => $data['username'],
        	':email' => $data['email'],
        	':gender' => $data['gender'],
        	':password' => $data['password'],
        ]);
    }catch(PDOException $e){
        echo $e->getMessage();
    }
    
    $conn = null;
    return true;
}


function updateUser($id, $data){
    $conn = db_conn();
    $selectQuery = "UPDATE profile_details set Name = ?, Surname = ?, Username = ? where user_id = ?";
    try{
        $stmt = $conn->prepare($selectQuery);
        $stmt->execute([
        	$data['name'], $data['surname'], $data['username'], $id
        ]);
    }catch(PDOException $e){
        echo $e->getMessage();
    }
    
    $conn = null;
    return true;
}

function deleteUser($id){
	$conn = db_conn();
    $selectQuery = "DELETE FROM `profile_details` WHERE `user_id` = ?";
    try{
        $stmt = $conn->prepare($selectQuery);
        $stmt->execute([$id]);
    }catch(PDOException $e){
        echo $e->getMessage();
    }
    $conn = null;

    return true;
}