<?php

require("../def/function.php"); 

$nomeLivro =  $_REQUEST["nomeLivro"];
$idbiblioteca = $_REQUEST["idBiblioteca"];
$precoLivro = $_REQUEST["precoLivro"];

session_start();

$precoLivro = value_number($precoLivro); 

$connection = connection();

$result = $connection->query("SELECT MAX(idlivro) FROM livro");
$idLivro = $result->fetchColumn() + 1; 

$result = $connection->query("INSERT INTO livro (idlivro, nome, preco, idbiblioteca) VALUES ({$idLivro}, '{$nomeLivro}', {$precoLivro}, {$idBiblioteca})");
if($result === false){
    $erro = $connection->errorInfo(); 
    json_error($erro[2]);
}

json_success(array(
    "idlivro" => $idLivro
)); 

