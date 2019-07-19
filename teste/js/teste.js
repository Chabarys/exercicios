$(document).ready(function(){
	$("idlivro").focus();
});

function inserir(){
	$.ajax({
		url: "../ajax/inserir.php",
		data: {
			idlivro: $("#idlivro"),
			livro: $("#livro"),
			biblioteca: $("#biblioteca"),
			preco: $("#preco"),
			criadoem: $("#criadoem")
		},
		success: function(){
			
		}
	})
}