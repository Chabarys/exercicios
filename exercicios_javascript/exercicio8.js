/*
Exercício 8
 Crie uma caixa de texto e um botão em html
 Ao clicar no botão, chama uma função com um parâmetro que é
o valor que está dentro da caixa de text
 A função mostra mensagens de acordo com o parâmetro da
caixa de texto
 Por exemplo, no caso de ter introduzido três, a função seria
chamado com o parâmetro 3, assim, as mensagens seriam“AIA
1”, “AIA 2” e “AIA 3”
*/
$(document).ready(function () {
    $("#botao").click(function () {
        var numero = $("#parametro").val();
        socorro(numero);
    });
});
function socorro(numero) {
    for (let i = 1; i <= numero; i++) {
        alert("AIA" + i);
    }
}
