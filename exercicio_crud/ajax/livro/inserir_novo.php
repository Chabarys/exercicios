<?php

require("../../def/function.php"); // Mesma coisa que 'include'

$nome = $_GET["nome"];
$idbiblioteca = $_GET["idbiblioteca"];
$preco = $_GET["preco"];

$preco = value_number($preco); // Função para transformar numero do formato brasileiro para formato de sistema

$connection = connection();

// 'select max' retorna o maior valor da coluna escolhida (idlivro)
$result = $connection->query("SELECT MAX(idlivro) FROM livro");
$idlivro = $result->fetchColumn() + 1; // retorna o número de colunas + 1 coluna

$result = $connection->query("INSERT INTO  livro (idlivro, nome, preco, idbiblioteca) VALUES ({$idlivro}, '{$nome}', {$preco}, {$idbiblioteca})");
if($result === false){
    $erro = $connection->errorInfo(); // caso de erro, ele executa a função 'errorInfo()'
    json_error($erro[2]);
}

json_success(array(
    "idlivro" => $idlivro
)); 