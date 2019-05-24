function carregarLogin(){
	$.ajax({
		url: "../ajax/carregarLogin.php",
		dataType: "json",
		data: {
			email: $("#inputEmail").val(),
			senha: $("#inputPassword").val()
		},
		success: function(result){
			switch (result.status) {
                case 0:
					window.location.assign("paginaEmBranco.php");
                    break;
                case 2:
                    alert(result.message);
                    break;
            }
		}	
	});
}	

function validarLogin() {
	if($("#inputEmail").val().trim() == "" || $("#inputPassword").val().trim() == "") {
		alert("É obrigatório preencher seu email e senha!");
		return false;
	}
	carregarLogin();
}
