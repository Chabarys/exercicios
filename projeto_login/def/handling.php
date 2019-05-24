<?php
	session_start();
	require("../def/function.php");

	if(empty($_SESSION["email"])){
		header("Location: login.php");
		die();
}