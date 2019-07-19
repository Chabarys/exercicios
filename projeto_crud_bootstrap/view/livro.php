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
		<div class="navbar bg-dark d-none d-sm-block d-md-none d-block d-sm-none">
			<ul class="nav">
				<li id="cadastro" class="nav-item col">
					<a class="nav-link active text-white" onclick="trocarTelaCadastro()" href="#">
						<i class="fas fa-book-open"></i>
						<span>Cadastro de Livros</span>
					</a>
				</li>
				<li id="lista" class="nav-item col">
					<a class="nav-link text-white" onclick="trocarTelaGrade()" href="#">
						<i class="fas fa-list-ol"></i>
						<span>Lista de Livros</span>
					</a>
				</li>
			</ul>
		</div>
		<div class="row no-gutters">
			<!-- CADASTRO -->
			<div id="div-cadastro" class="col-12 col-md-6">
				<div class="navbar bg-dark">
					<div class="col-6 col-sm-3 col-md-6 col-lg-3 p-1">
						<button id="btnCriarNovo" type="button" class="btn btn-primary btn-sm btn-block" onclick="inserirNovo()">
							<span>Criar Livro</span>
							<i class="fas fa-plus-square"></i>
						</button>
					</div>
					<div class="col-6 col-sm-3 col-md-6 col-lg-3 p-1">
						<button id="btnGravar" type="button" class="btn btn-success btn-sm btn-block" onclick="gravarLivro()">
							<span>Gravar Livro</span>
							<i class="fas fa-check"></i>
						</button>
					</div>
					<div class="col-6 col-sm-3 col-md-6 col-lg-3 p-1">
						<button id="btnCancelar" type="button" class="btn btn-warning btn-sm btn-block" onclick="cancelar()">
							<span>Cancelar</span>
							<i class="fas fa-exclamation-triangle btn-sm"></i>
						</button>
					</div>
					<div class="col-6 col-sm-3 col-md-6 col-lg-3 p-1">
						<button id="btnDeletar" type="button" class="btn btn-danger btn-sm btn-block" onclick="mostrarModalDeletar()">
							<span>Deletar Livro</span>
							<i class="fas fa-trash"></i>
						</button>
					</div>
				</div>
				<div class="form-row px-4">
					<div class="form-group col-4 col-lg-2">
						<label for="idLivro" class="col-form-label">ID:</label>
						<i id="pesquisar" class="fas fa-search"></i>
						<input id="idLivro" type="text" class="form-control" inputmode="numeric">
					</div>
					<div class="form-group col-6 offset-2 col-lg-4 offset-lg-5">
						<label for="criadoEm" class="col-form-label">Criado em:</label>
						<input id="criadoEm" type="text" class="form-control" disabled>
					</div>
					<div class="w-100"></div>
					<div class="form-group col-lg-6 col-sm-12">
						<label for="nomeLivro" class="col-form-label">Nome do Livro:</label>
						<input id="nomeLivro" type="text" class="form-control" placeholder="Informe o Nome do Livro" autocomplete="off">
					</div>
					<div class="w-100"></div>
					<div class="form-group col-md-6">
						<label for="idBiblioteca" class="col-form-label">Biblioteca:</label>
						<select class="form-control" id="idBiblioteca">
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
						<input id="precoLivro" type="text" class="form-control" placeholder="R$" inputmode="numeric" autocomplete="off">
					</div>
				</div>
			</div>
			<!-- GRADE DE LIVROS -->
			<div id="div-grade" class="col-12 col-md-6 no-gutters">
				<div>
					<table id="grade" class="table table-hover">
						<caption class="mx-1">
							<span>Lista de Livros</span>
							<i class="fas fa-book"></i>
						</caption>
						<thead class="table-dark table-bordered">
							<tr>
								<th class="d-none d-lg-block">ID</th>
								<th>Livro</th>
								<th>Biblioteca</th>
								<th>Preço</th>
								<th class="d-none d-xl-block">Criado em</th>
							</tr>
						</thead>
						<tbody></tbody>
					</table>
				</div>
			</div>
		</div>
		<!-- Rodapé com Registração -->
		<div class="card-footer text-muted bg-dark py-0">
			<div class="offset-3 offset-sm-5">
				<span class="ml-2 ml-sm-0 text-white">Alisson Chabaribery - 2019</span><br>
				<span class="ml-4 ml-sm-4 text-white">Cadastro de Livros</span><br>
				<span class="ml-5 ml-sm-5 text-white">ControlWare</span><br>
			</div>
		</div>
		<!-- Marcador do tamanho do página -->
		<div id="sizes">
			<div class="d-block d-sm-none">XS</div>
			<div class="d-none d-sm-block d-md-none">SM</div>
			<div class="d-none d-md-block d-lg-none">MD</div>
			<div class="d-none d-lg-block d-xl-none">LG</div>
			<div class="d-none d-xl-block">XL</div>
		</div>
	</div>
	<!-- Modal mensagem deletar livro -->
	<div id="mensagemDeletar" class="modal" tabindex="-1" role="dialog">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header bg-dark">
					<h5 class="modal-title text-danger">
						Atenção
						<i class="fas fa-exclamation-triangle"></i>
					</h5>
				</div>
				<div class="modal-body">
					<p class="text-black">Tem certeza que deseja <b>DELETAR</b> este livro?</p>
				</div>
				<div class="modal-footer bg-dark">
					<button type="button" class="btn btn-primary" data-dismiss="modal" onclick="fecharModalDeletar()">Não</button>
					<button type="button" class="btn btn-danger" onclick="deletarLivro(), fecharModalDeletar()">Deletar Livro</button>
				</div>
			</div>
		</div>
	</div>
</body>

</html>