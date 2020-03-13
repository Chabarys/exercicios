<?php
	require("../def/handling.php");
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>Página em branco</title>
		<link href="../lib/bootstrap-4.3.1/css/bootstrap.min.css" rel="stylesheet" >	
		<link href="css/login.css" rel="stylesheet">
	</head>
	<body>
		<h1>Sucesso</h1>
		<p>Login realizado com sucesso</p>
		<button class="btn btn-lg btn-primary btn-block btn-logout" onclick="window.location.href='../logout.php'">Sair</button>
	</body>
	<script type="text/javascript" src="../js/login.js"></script>
</html>