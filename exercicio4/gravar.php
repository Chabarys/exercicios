<?php

session_start();

//$valor1 = $_GET["valor1"];
//$valor2 = $_GET["valor2"];
//$valor3 = $_GET["valor3"];

include("conexao.php");
$query = "INSERT"
$res = $con->query("SELECT * FROM numero");
$arr = $res->fetchAll(2);
echo "<pre>";
print_r($arr);
echo "</pre>";
$-
//$_SESSION["valores"][] = [$valor1, $valor2, $valor3];

