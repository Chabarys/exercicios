<?php
require("../def/function.php");

$connection = connection();
?>
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

			<!--
			Botoes para alterar telas (cadastro e grade)
			-->

			<!-- CADASTRO -->
			<div id="div-cadastro" class="col border-right">
				<div class="navbar bg-dark">
					<button id="btnCriarNovo" type="button" class="btn btn-primary btn-sm" onclick="inserirNovo()">
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
				<div class="form-row px-4">
					<div class="form-group col-4 col-lg-3">
						<label for="idLivro" class="col-form-label">ID:</label>
						<input id="idLivro" type="number" class="form-control">
					</div>
					<div class="form-group col-6 offset-2 col-lg-4 offset-lg-5">
						<label for="criadoEm" class="col-form-label">Criado em:</label>
						<input id="criadoEm" type="text" class="form-control" disabled>
					</div>
					<div class="w-100"></div>
					<div class="form-group col-6">
						<label for="nomeLivro" class="col-form-label">Nome do Livro:</label>
						<input id="nomeLivro" type="text" class="form-control" placeholder="Informe o Nome do Livro">
					</div>
					<div class="w-100"></div>
					<div class="form-group col-md-6">
						<label for="idBiblioteca" class="col-form-label">Biblioteca:</label>
						<select class="form-control" id="idBiblioteca" aria-label="Example select with button addon">
							<option value="" selected disabled>Escolha a biblioteca</option>
							<?php
							$res = $connection->query("SELECT idbiblioteca, nome FROM biblioteca ORDER BY nome");
							$arr = $res->fetchAll(2);
							foreach ($arr as $row) {
								echo "<option value='{$row["idbiblioteca"]}'>{$row["nome"]}</option>";
							}
							?>
						</select>
					</div>
					<div class="form-group col-md-5 offset-md-1">
						<label for="precoLivro" class="col-form-label">Preço:</label>
						<input id="precoLivro" type="text" class="form-control" placeholder="R$" min="1" max="10">
					</div>

				</div>
			</div>
			<!-- GRADE DE LIVROS -->
			<div id="div-grade" class="col no-gutters">
				<table id="grade" class="table table-hover">
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
					<tbody></tbody>
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

	<div id="sizes">
		<div class="d-block d-sm-none">XS</div>
		<div class="d-none d-sm-block d-md-none">SM</div>
		<div class="d-none d-md-block d-lg-none">MD</div>
		<div class="d-none d-lg-block d-xl-none">LG</div>
		<div class="d-none d-xl-block">XL</div>
	</div>
</body>

</html>