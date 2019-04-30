
<?php
/*
    Entrar com nome, sexo e idade de uma
    pessoa. Se a pessoa for do sexo feminino e
    tiver menos que 25 anos, imprimir nome e a
    a mensagem: ACEITA. Caso contrário,
    imprimir nome e a mensagem: NÃO ACEITA.
*/

$nome = $_GET["nome"];
$sexo = $_GET["sexo"];
$idade = $_GET["idade"];

if ($sexo == "feminino" && $idade < 25) { //feminino é o valor do botão radio em html
    echo "Olá " . $nome . "<br/> Você foi ACEITA!";
}
else  {
    echo "Olá " . $nome . "<br/> Você NÃO foi ACEITO!";
}

