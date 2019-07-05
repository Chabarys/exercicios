<!DOCTYPE html>
<html>

<head>
	<?php require("../def/head.php"); ?>
	<title>Cadastro de Livros</title>
	<script type="text/javascript" src="js/livro.js"></script>
</head>

<body class="bg-light">
	<div class="container-fluid no-gutters px-0">
		<div class="row no-gutters">
			<!-- CADASTRO -->
			<div id="div-cadastro" class="col border-right">
				<div class="navbar bg-dark">
					<button id="btnCriarNovo" type="button" class="btn btn-primary btn-sm" onclick="criarLivro()">
						<span>Criar Livro</span>
						<i class="fas fa-plus-square"></i>
					</button>
					<button id="btnGravar" type="button" class="btn btn-success btn-sm" onclick="gravarLivro()">
						<span>Gravar Livro</span>
						<i class="fas fa-check"></i>
					</button>
					<button id="btnCancelar" type="button" class="btn btn-warning btn-sm" onclick="cancelar()">
						<span>Cancelar</span>
						<i class="fas fa-exclamation-triangle btn-sm"></i>
					</button>
					<button id="btnDeletar" type="button" class="btn btn-danger btn-sm" onclick="deletarLivro()">
						<span>Deletar Livro</span>
						<i class="fas fa-trash"></i>
					</button>
				</div>
				<div class="form-row">
					<div class="form-group col px-4 ">
						<label for="idLivro" class="col-form-label">ID:</label>
						<input id="idLivro" type="number" class="form-control col-4">
					</div>
					<div class="form-group col offset-md-1">
						<label for="criadoEm" class="col-form-label">Criado em:</label>
						<input id="criadoEm" type="text" class="form-control col-9" disabled>
					</div>

					<div class="form-group col-12 px-4">
						<label for="nomeLivro" class="col-form-label">Nome do Livro:</label>
						<input id="nomeLivro" type="text" class="form-control col-7" placeholder="Informe o Nome do Livro">
					</div>
					<div class="form-group col px-4">
						<label for="nomeBiblioteca" class="col-form-label">Biblioteca:</label>
						<select class="form-control" id="nomeBiblioteca" aria-label="Example select with button addon">
							<option value="" disabled selected>Escolha a Biblioteca</option>
							<option value="1">biblioteca 1</option>
							<option value="2">biblioteca 2</option>
							<option value="3">biblioteca 3</option>
						</select>
					</div>
					<div class="form-group col offset-md-1">
						<label for="precoLivro" class="col-form-label">Preço:</label>
						<input id="precoLivro" type="text" class="form-control col-9" placeholder="R$" min="1" max="10">
					</div>
			
				</div>
			</div>
			<!-- GRADE DE LIVROS -->
			<div class="col no-gutters">
				<table class="table table-hover">
					<caption class="mx-1">
						<span>Lista de Livros</span>
						<i class="fas fa-book"></i>
					</caption>
					<thead class="table-dark table-bordered">
						<tr>
							<th scope="col">ID</th>
							<th scope="col">Livro</th>
							<th scope="col">Biblioteca</th>
							<th scope="col">Preço</th>
							<th scope="col">Criado em</th>
						</tr>
					</thead>
					<tbody>
						<tr class="">
							<th>1</th>
							<td>Livro 1</td>
							<td>Biblioteca 1</td>
							<td>R$ 10,00</td>
							<td>28/06/2019</td>
						</tr>	
						<tr class="">
							<th>2</th>
							<td>Livro 2</td>
							<td>Biblioteca 2</td>
							<td>R$ 10,00</td>
							<td>28/06/2019</td>
						</tr>
						<tr class="">
							<th>3</th>
							<td>Livro 3</td>
							<td>Biblioteca 3</td>
							<td>R$ 10,00</td>
							<td>28/06/2019</td>
						</tr>
						<tr class="">
							<th>4</th>
							<td>Livro 4</td>
							<td>Biblioteca 4</td>
							<td>R$ 10,00</td>
							<td>28/06/2019</td>
						</tr>
						<tr class="">
							<th>5</th>
							<td>Livro 5</td>
							<td>Biblioteca 5</td>
							<td>R$ 10,00</td>
							<td>28/06/2019</td>
						</tr>
					</tbody>
				</table>
			</div>
		</div>
	</div>
	<div class="card-footer text-muted bg-dark py-0">
		<div class="offset-md-5">
			<span class="ml-md-0 text-white">Alisson Chabaribery - 2019</span><br>
			<span class="ml-md-4 text-white">Cadastro de Livros</span><br>
			<span class="ml-md-5 text-white">ControlWare</span><br>
		</div>
	</div>
	
</body>

</html>