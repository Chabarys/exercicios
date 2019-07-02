<!DOCTYPE html>
<html>

<head>
	<?php require("../def/head.php"); ?>
	<title>Cadastro de Livros</title>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>

</head>

<body class="bg-light">
	<div class="container-fluid no-gutters">
		<div class="row no-gutters">
			<!-- CADASTRO -->
			<div class="col border-right">
				<div class="navbar bg-dark">
					<button id="btnCriarNovo" type="button" class="btn btn-primary btn-sm">
						<span>Criar Livro</span>
						<i class="fas fa-plus-square"></i>
					</button>
					<button id="btnGravar" type="button" class="btn btn-success btn-sm">
						<span>Gravar Livro</span>
						<i class="fas fa-check"></i>
					</button>
					<button id="btnCancelar" type="button" class="btn btn-warning btn-sm">
						<span>Cancelar</span>
						<i class="fas fa-exclamation-triangle btn-sm"></i>
					</button>
					<button id="btnDeletar" type="button" class="btn btn-danger btn-sm">
						<span>Deletar Livro</span>
						<i class="fas fa-trash"></i>
					</button>
				</div>
				<div class="form-row">
					<div class="form-group col-2">
						<label for="idLivro" class="col-form-label">ID:</label>
						<input id="idLivro" type="number" class="form-control">
					</div>
					<div class="form-group col-4 offset-md-5">
						<label for="criadoEm" class="col-form-label">Criado em:</label>
						<input id="criadoEm" type="text" class="form-control" disabled>
					</div>

					<div class="form-group col-7">
						<label for="nomeLivro" class="col-form-label">Nome do Livro:</label>
						<input id="nomeLivro" type="text" class="form-control" placeholder="Informe o Nome do Livro">
					</div>
					<div class="form-group col-6">
						<label for="nomeBiblioteca" class="col-form-label">Biblioteca:</label>
						<select class="custom-select" id="inputGroupSelect04" aria-label="Example select with button addon">
							<option selected></option>
							<option value="1">biblioteca 1</option>
							<option value="2">biblioteca 2</option>
							<option value="3">biblioteca 3</option>
						</select>
					</div>
					<div class="form-group col-4 offset-md-1">
						<label for="precoLivro" class="col-form-label">Preço:</label>
						<input id="precoLivro" type="text" class="form-control" placeholder="R$">
					</div>
				</div>
			</div>
			<!-- GRADE DE LIVROS -->
			<div class="col no-gutters">
				<table class="table">
					<caption>Lista de Livros</caption>
					<thead class="table-dark table-bordered">
						<tr>
							<th scope="col">ID</th>
							<th scope="col">Nome</th>
							<th scope="col">Biblioteca</th>
							<th scope="col">Preço</th>
							<th scope="col">Criado em:</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<th scope="row">1</th>
							<td>Livro 1</td>
							<td>Biblioteca 1</td>
							<td>R$ 10,00</td>
							<td>28/06/2019</td>
						</tr>
						<tr>
							<th scope="row">1</th>
							<td>Livro 1</td>
							<td>Biblioteca 1</td>
							<td>R$ 10,00</td>
							<td>28/06/2019</td>
						</tr>
						<tr>
							<th scope="row">1</th>
							<td>Livro 1</td>
							<td>Biblioteca 1</td>
							<td>R$ 10,00</td>
							<td>28/06/2019</td>
						</tr>
						<tr>
							<th scope="row">1</th>
							<td>Livro 1</td>
							<td>Biblioteca 1</td>
							<td>R$ 10,00</td>
							<td>28/06/2019</td>
						</tr>
						<tr>
							<th scope="row">1</th>
							<td>Livro 1</td>
							<td>Biblioteca 1</td>
							<td>R$ 10,00</td>
							<td>28/06/2019</td>
						</tr>
						<tr>
							<th scope="row">1</th>
							<td>Livro 1</td>
							<td>Biblioteca 1</td>
							<td>R$ 10,00</td>
							<td>28/06/2019</td>
						</tr>
						<tr>
							<th scope="row">1</th>
							<td>Livro 1</td>
							<td>Biblioteca 1</td>
							<td>R$ 10,00</td>
							<td>28/06/2019</td>
						</tr>
						<tr>
							<th scope="row">1</th>
							<td>Livro 1</td>
							<td>Biblioteca 1</td>
							<td>R$ 10,00</td>
							<td>28/06/2019</td>
						</tr>

					</tbody>
				</table>
			</div>
		</div>
	</div>
	<div class="card-footer text-muted bg-dark">
		<div class="offset-md-5">
			<span class="ml-md-0 text-white">Alisson Chabaribery - 2019</span><br>
			<span class="ml-md-4 text-white">Cadastro de Livros</span><br>
			<span class="ml-md-5 text-white">ControlWare</span><br>
		</div>
	</div>
</body>

</html>