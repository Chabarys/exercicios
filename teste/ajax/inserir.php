<?php

include_once ("../def/function.php");

$id = $_REQUEST["idlivro"];	
$livro = $_REQUEST["livro"];
$biblioteca = $_REQUEST["biblioteca"];
$preco = $_REQUEST["preco"];
$criadoem = $_REQUEST["criadoem"];

$connection = connection();

/*echo "livro: $livro";
echo "biblioteca: $biblioteca";
echo "preco: $preco";*/

$result = $connection->query("INSERT INTO livro (idlivro, nome, biblioteca, preco, criadoem) VALUES ($idlivro, '$livro', '$biblioteca', $preco, $criadoem)");

