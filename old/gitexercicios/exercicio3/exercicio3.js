// apagado o vetor unico, para dois vetores, dos menores e dos maiores
let maioresValores = [];
let menoresValores = [];

function calcularMaiorValor(valores){
    let maiorValor;
    maiorValor = valores[0];
    for(let indice=0; indice<valores.length; indice++){ 
        if(valores[indice]>maiorValor){
            maiorValor = valores[indice];
        }
    }
    return maiorValor; 
}
function calcularMenorValor(valores){
    // Se valor1 for o menor de todos...
    let menorValor = valores[0];
    for(let indice=0; indice<valores.length; indice++){ 
        if(valores[indice]<menorValor){
            menorValor = valores[indice];
        }
    }
    return menorValor; 
}
//Nome mudado de menor para Menores
function mostraMenores(menoresValores){
    // este não precisa reverter, porque já vem na ordem crescente, do menor para o maior    
    let ordenaEmOrdemCrescente = menoresValores.sort();
    //mostra os menores
    document.getElementById("resultado").value = menoresValores;
}
//nome mudade de maior para Maiores
function mostrarMaiores(maioresValores){ 
    let ordenaEmOrdemCrescente = maioresValores.sort();
    let inverteParaDecrescente = maioresValores.reverse();
    document.getElementById("resultado").value = maioresValores;   
}
function guardarValores(){
    document.querySelector("form").addEventListener("submit",function(d){
        d.preventDefault()
        let valor1 = document.getElementById("valor1").value;
        let valor2 = document.getElementById("valor2").value;
        let valor3 = document.getElementById("valor3").value;
        console.log("oiiiii");
        //Array com os valores das caixas, para verificar qual o maior.
        let valoresCaixas = [valor1,valor2,valor3];
        let maiorValor = calcularMaiorValor(valoresCaixas);
        let menorValor = calcularMenorValor(valoresCaixas);
        //Adiciona o maior Valor para a lista de maiores Valores, assim como o menor para a lista de menores Valores
        maioresValores.push(maiorValor);
        menoresValores.push(menorValor);
    })
}
guardarValores();
function clicaNoBotaoRadioMaior(){
        let radioMaioresValores = document.getElementById("radio-maior");
        radioMaioresValores.addEventListener("click", function(){
            // renomeado De mostrarMaior para mostrar Maiores
            // recebendo como parametro aquele array de maiores valores que tu preenche ao clicar em enviar
            mostrarMaiores(maioresValores);
        })
}
function clicaNoBotaoRadioMenor(){     
        document.getElementById("radio-menor").addEventListener("click", function(){
            // renomeado De mostrarMenor para mostrar Menores
            // recebendo como parametro aquele array de maiores valores que tu preenche ao clicar em enviar
            mostraMenores(menoresValores);
        })
}
clicaNoBotaoRadioMaior();
clicaNoBotaoRadioMenor();

document.getElementById("reiniciar").addEventListener("click", function(){
    document.getElementById("valor1").value = "";
    document.getElementById("valor2").value = "";
    document.getElementById("valor3").value = "";
    document.getElementById("resultado").value = "";
})