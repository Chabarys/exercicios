<?php
require("../def/function.php");

$connection = connection();
?>
<html>

<head>
    <meta charset="UTF-8" />
    <link rel="stylesheet" href="../css/livro.css" />
    <title>Cadastro</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
    <script type="text/javascript" src="../js/livro.js"></script>
</head>

<body>
    <div id='painel-formulario'>
        <div>
            <div id="campo-id" class='form-control size-2'>
                <label for='idlivro'>ID:</label>
                <input type='number' id='idlivro'/>
            </div>
            <div id="campo-data" class='form-control size-3'>
                <label for='criadoem'>Criado em:</label>
                <input type='text' id='criadoem' disabled />
            </div>
        </div>
        <div>
            <div id="campo-nome" class='form-control size-5'>
                <label for='nome'>Nome:</label>
                <input class="nome" type='text' id='nome' />
            </div>
        </div>
        <div>
            <div id="campo-biblioteca" class='form-control size-3'>
                <label for='idbiblioteca'>Biblioteca:</label>
                <select id='idbiblioteca' class='form-control size-3 biblioteca'>
                    <option value=""></option>
                    <?php
                    $res = $connection->query("SELECT idbiblioteca, nome FROM biblioteca ORDER BY nome");
                    $arr = $res->fetchAll(2);
                    foreach($arr as $row){
                        echo "<option value='{$row["idbiblioteca"]}'>{$row["nome"]}</option>";
					}
                    ?>
                </select>
            </div>
            <div id="campo-preco" class='form-control size-3'>
                <label id="caixa-preco" for='preco'>Preço:</label>
                <input class="preco" type='text' id='preco' />
            </div>
        </div>
        <div id="botoes">
            <button id="btn-novo" class='form-control size-2 botao' onclick="inserir_novo()">Criar Novo</button>
            <button id="btn-gravar" class='form-control size-2 botao' onclick="gravar()">Gravar</button>
            <button id="btn-cancelar" class='form-control size-2 botao' onclick="cancelar()">Cancelar</button>
            <button id="btn-deletar" class='form-control size-2 botao' onclick="deletar()">Deletar</button>
        </div>
        <footer>
            <tr>
                <td colspan="2">
                    <span>Alisson Chabaribery &reg; - 2019</span><br>
                    <span>Atividade Cadastro</span><br>
                    <span>Controlware</span><br>
                </td>
            </tr>
        </footer>
    </div>

    <div id='painel-grade'>
        <table id="grade" class="tabela" border="2">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Biblioteca</th>
                    <th>Preço</th>
                    <th>Criado em</th> 
                </tr>
            </thead>
            <tbody></tbody>
        </table>
    </div>
</body>

</html>