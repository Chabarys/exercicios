<?php

require("../../def/function.php"); // Mesma coisa que 'include'

$nome = filter_input(INPUT_GET, "nome", FILTER_SANITIZE_STRING);
$idbiblioteca = $_GET["idbiblioteca"];
$preco = $_GET["preco"];

session_start();
$_SESSION["oi"] = "bom dia";

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