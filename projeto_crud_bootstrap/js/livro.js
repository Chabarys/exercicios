$(document).ready(function() { 
    //_status(0);
	$("#idLivro").focus();
});

function teste(){
	$("#nomeLivro").html("oi");
}

/*
if (status === undefined) {
	 _status;
}else {
	_status = status;
	switch (status) {
		case 0:
			$("#btnCriarNovo").attr("disabled", false);
			$("#btnGravar").attr("disabled", true);
			$("#btnCancelar").attr("disabled", true);
			$("#btnDeletar").attr("disabled", true);
			$("#idLivro").attr("disabled", false);
			$("#criadoEm").attr("disabled", true);
			$("#nomeLivro").attr("disabled", true);
			$("#nomeBiblioteca").attr("disabled", true);
			$("#precoLivro").attr("disabled", true);
		case 1:
			$("#btnCriarNovo").attr("disabled", true);
			$("#btnGravar").attr("disabled", false);
			$("#btnCancelar").attr("disabled", false);
			$("#btnDeletar").attr("disabled", true);
			$("#idLivro").attr("disabled", true);
			$("#criadoEm").attr("disabled", true);
			$("#nomeLivro").attr("disabled", false);
			$("#nomeBiblioteca").attr("disabled", false);
			$("#precoLivro").attr("disabled", false);
		case 2:
			$("#btnCriarNovo").attr("disabled", true);
			$("#btnGravar").attr("disabled", false);
			$("#btnCancelar").attr("disabeld", false);
			$("#btnDeletar").attr("disabled", false);
			$("#idLivro").attr("disabled", true);
			$("#criadoEm").attr("disabled", true);
			$("#nomeLivro").attr("disabled", false);
			$("#nomeBiblioteca").attr("disabled", false);
			$("#precoLivro").attr("disabled", false);
	}
}
*/