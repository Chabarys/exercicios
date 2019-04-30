<html>
<head>
    <meta charset="UTF-8">
    <title>Exercício 3</title>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.js"></script>

<script>
function enviar(){
    $.ajax({
        url: "recebimento.php",
        data: {
            valor1 : $("#valor1").val(),
            valor2 : $("#valor2").val(),
            valor3 : $("#valor3").val(),
            valor4 : $("#valor4").val()
        },
        success: function(result){
            $("#retorno").val(result);
        },
    });
}
</script>
</head>
<body>
    <div>
    <input id="valor1" type="text">
    <input id="valor2" type="text">
    <input id="valor3" type="text">
    <input id="valor4" type="text">
    <span onclick="enviar()">Enviar para o PHP</span>
    </div>
    <div id="retorno">
    </div>
</body>
</html>