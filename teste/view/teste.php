<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>Teste</title>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
		<script type="text/javascript" src="../js/teste.js"></script>
		<link rel="stylesheet" href="../css/css.css" />
	</head>
	<body>
		<h2>formulario</h2>
		<div>
		<label for="idlivro">idlivro: </label>
			<input id="idlivro" type="text" placeholder="Digite o idlivro: ">
			<br><br>
			<label for="criadoem">criadoem: </label>
			<input id="criadoem" type="text" placeholder="Digite o criadoem: ">
			<br><br>
			<label for="livro">livro: </label>
			<input id="livro" type="text" placeholder="Digite o livro: ">
			<br><br>
			<label for="biblioteca">biblioteca: </label>
			<input id="biblioteca" type="text" placeholder="Digite a biblioteca: ">
			<br><br>
			<label for="preco">preco: </label>
			<input id="preco" type="text" placeholder="Digite o preco: ">
		</div>
		<br><br>
		<div>
			<button id="btn-cadastrar" type="button" onclick="inserir()">Cadastrar</button>
		</div>
	<br>
		<table border="2">
			<thead>
				<th>id</th>
				<th>livro</th>
				<th>biblioteca</th>
				<th>preco</th>
				<th>criado em</th>
			</thead>
			<tbody>

			</tbody>
		</table>
	</body>
</html>