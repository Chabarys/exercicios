/*
Exercício 2
 Crie um botão em um ficheiro html, que ao ser clicado aparece
um número aleatório entre 0 e 50
*/
$(document).ready(function () {
    $("#botao").click(function () {
        alert(Math.floor(Math.random() * 50));
    });
});


