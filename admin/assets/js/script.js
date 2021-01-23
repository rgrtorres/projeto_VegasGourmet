var login = {
	logar: function() {
		var		usuario	= $('#input-login').val(),
				senha	= $('#input-password').val(),
				tipo	= 'logar';
		$.ajax ({
			url: 'assets/ajax/login.php',
			type: 'POST',
			data: { 'usuario' : usuario, 'senha' : senha, 'tipo' : tipo },
			success:function(resultado) {
				if ( resultado == "logado" ) {
					window.location.reload();
				} else if ( resultado == "falha" ) {
					alert('Dados incorretos!');
				} else {
					alert('Falha no servidor!');
				}
			}
		});
	}
}

var item = {
	deletar: function(id, evento){
		var confirma = confirm('Tem certeza que deseja deletar esse item?');
		if(confirma == true) {
			$.ajax({
				url: 'assets/ajax/deletar.php',
				type: 'POST',
				data: {id : id, evento : evento},
				success:function (resultado) {
					if(resultado == "deletado") {
						var tabela = $('#find_'+id);
						alert('Deletado com sucesso');

						if(tabela.attr('rel') == id) {
							tabela.remove();
						}
					}
				}
			});
		}
	}
}

$(document).ready(function(){
	$("#logar").submit(function(){
		login.logar();
		return false;
	});

	//MENU
	var monitor = screen.width;
	var menu = (246 / monitor) * 100;
	document.getElementById('menu').style.width = menu  + '%';

	//Conteudo
	var conteudo = 100 - menu;
	document.getElementById('conteudo').style.width = conteudo  + '%';
	document.getElementById('conteudo').style.left = menu  + '%';

});