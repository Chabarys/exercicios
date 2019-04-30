<?php
/*
        A biblioteca de uma universidade deseja fazer
        um algoritmo que leia o nome do livro que
        será emprestado, o tipo de usuário (professor
        ou aluno) e possa imprimir um recibo
        conforme mostrado a seguir. Considerar que
        o professor tem 10 dias para devolver o livro
        o aluno somente 3 dias.
    */

$livro = "asdffhgas";//$_GET["livro"];
$usuario = "ProFessor";//$_GET["usuario"];
$data_atual = "01/01/2019";

$usuario = strtolower($usuario);

$data_atual = implode("-", array_reverse(explode("/", $data_atual)));
$time = strtotime($data_atual);

$data = date('d-m-y');
if ($usuario == "professor") {
    $data_devolucao = date("d/m/Y", strtotime("+10 days", $time));
    echo ucfirst($usuario).": Livro: $livro <br/> ";
    echo "Prazo de devolução 10 dias a partir do dia: $data_devolucao";
} elseif ($usuario == "estudante") {
    $data_devolucao = date("d/m/Y", strtotime("+3 days", $time));
    echo "$usuario:  <br/> Livro: $livro <br/> ";
    echo "Prazo de devolução 3 dias a partir do dia: $data_devolucao";
}

