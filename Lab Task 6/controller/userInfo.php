<?php 

require_once ('model/model.php');

function fetchAllUsers(){
	return showAllUsers();

}
function fetchUser($id){
	return showUser($id);

}
