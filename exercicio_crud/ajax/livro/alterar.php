<?php
// Ajax que altera o banco de dados pelo site
require("../../def/function.php");

$idlivro = $_GET["idlivro"];
$nome = $_GET["nome"];
$biblioteca = $_GET["idbiblioteca"];
$preco = $_GET["preco"];

$preco = value_number($preco);

$connection = connection();

$result = $connection->query("UPDATE livro SET nome = '{$nome}', idbiblioteca = '{$biblioteca}', preco = '{$preco}' WHERE idlivro = {$idlivro}");

if ($result) {
    json_success(array(
        "idlivro" => $idlivro
    ));
} else {
    $erro = $connection->errorInfo();
    json_error($erro[2]);
}
