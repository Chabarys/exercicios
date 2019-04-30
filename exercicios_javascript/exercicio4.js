/*
Exercício 4
 Altere o status da janela do browser, através de JavaScript, para:
“Maio de 2010”
*/
$(document).ready(function () {
    $("#botao").click(function () {
        let date = new Date(2010, 5);
        alert(`${date.getMonth()}/${date.getFullYear()}`);
    });
});