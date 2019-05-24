<?php
	session_start();
	require("../def/function.php");

	$_SESSION["email"];
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>Login</title>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
		<link href="../lib/bootstrap-4.3.1/css/bootstrap.min.css" rel="stylesheet" >	
		<link href="../css/login.css" rel="stylesheet">
	</head>
	<body class="text-center">
		<div class="form-signin">
			<h1 class="h3 mb-3 font-weight-normal titulo-login"><b>Login</b></h1>
			<input type="email" id="inputEmail" class="form-control" placeholder="Email address" autofocus >
			<input type="password" id="inputPassword" class="form-control" placeholder="Password" >
			<div class="checkbox mb-3">
				<label>
					<input type="checkbox" value="remember-me"> Lembre-me
				</label>
			</div>
			<button class="btn btn-md btn-primary btn-block" onclick="validarLogin()">Entrar</button>
			<footer class="mt-5 mb-3 text-muted">
				<tr>
					<td colspan="2">
						<span>Alisson Chabaribery &reg; - 2019</span><br>
						<span>Atividade Login</span><br>
						<span>Controlware</span><br>
					</td>
				</tr>
			</footer>
		</div>
	</body>
	<script type="text/javascript" src="../js/login.js"></script>
</html>