<?php

session_start();

require("../def/function.php");

$email = $_GET["email"];
$senha = $_GET["senha"];

$connection = connection();

$query = "SELECT * FROM usuario WHERE login = '{$email}' AND senha = '{$senha}'";
$res = $connection->query($query);
$arr = $res->fetchAll(2);

if(count($arr) > 0) {
	$_SESSION['email'] = $email; 
	json_success();
}else{
	
	json_error("Errado!");
}
