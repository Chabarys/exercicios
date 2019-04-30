<?php

require("../../def/function.php"); // mesma coisa que o 'include'

$connection = connection();

$query = implode(" ", [ // Variável '$query' recebera todas as instruções abaixo
    "SELECT livro.*, biblioteca.nome AS biblioteca", 
    "FROM livro",
    "INNER JOIN biblioteca ON (livro.idbiblioteca = biblioteca.idbiblioteca)",
    "ORDER BY idlivro"
]);

$result = $connection->query($query);
$arr = $result->fetchAll(2);
/* 'fetchAll' é um retorno em forma de array, no caso ele retorna todas as informações dos dados desse arrya, 
* por isso passamos 2 como parametro, para especificar qual informação queremos
*/ 
json_success($arr);