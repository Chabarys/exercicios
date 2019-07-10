<?php

require("../def/function.php");

$idLivro = $_GET["idLivro"];
$nomeLivro = $_GET["nomeLivro"];
$idBiblioteca = $_GET["idBiblioteca"];
$precoLivro = $_GET["precoLivro"];

$precoLivro = value_number($precoLivro);

$connection = connection();

$result = $connection->query("UPDATE livro SET nome = '{$nomeLivro}', idbiblioteca = '{$idBiblioteca}', preco = '{$precoLivro}' WHERE idlivro = {$idLivro}");

if ($result) {
    json_success(array(
        "idlivro" => $idLivro
    ));
} else {
    $erro = $connection->errorInfo();
    json_error($erro[2]);
}
