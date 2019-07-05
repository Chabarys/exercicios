<?php

$nome = filter_input(INPUT_GET, "nomeLivro", FILTER_SANITIZE_STRING);
$idbiblioteca = $_GET["idBiblioteca"];
$precoLivro = $_GET["precoLivro"];

session_start();

$precoLivro = value_number($precoLivro); 

$connection = connection();

$result = $connection->query("SELECT MAX(idlivro) FROM livro");
$idLivro = $result->fetchColumn() + 1; 

$result = $connection->query("INSERT INTO  livro (idlivro, nome, preco, idbiblioteca) VALUES ({$idLivro}, '{$nomeLivro}', {$precoLivro}, {$idbiBlioteca})");
if($result === false){
    $erro = $connection->errorInfo(); 
    json_error($erro[2]);
}

json_success(array(
    "idlivro" => $idLivro
)); 