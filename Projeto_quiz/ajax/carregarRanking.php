<?php

require("../def/function.php");

$connection = connection();

// Variável '$query' recebera todas as instruções abaixo
$query = "SELECT * FROM ranking ORDER BY pontos DESC LIMIT 10";
$res = $connection->query($query);
$arr = $res->fetchAll(2);

$tbody = "";
foreach($arr as $i => $row) {
	$posicao = $i + 1;

	if($row["pontos"] < 30) {
		$nivel = "Estagiario";
	}elseif($row["pontos"] < 50) {
		$nivel = "Junior";
	}elseif($row["pontos"] < 70) {
		$nivel = "Pleno";
	}else{
		$nivel = "Senior";
	}

	$tbody .= "<tr>";
	$tbody .= "<td>{$posicao}</td>";
	$tbody .= "<td>{$row["nome"]}</td>";
	$tbody .= "<td>{$row["pontos"]}</td>";
	$tbody .= "<td>{$nivel}</td>";
	$tbody .= "</tr>";
}

echo json_encode(array(
	"tbody" => $tbody
));
