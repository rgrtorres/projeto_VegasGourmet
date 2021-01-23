<?php
ob_start('ob_gzhandler');
include 'assets/config/conexao.php';
include 'admin/assets/function/User.php';
$pagina = $Site->GET('pagina', 'inicio');
date_default_timezone_set('America/Sao_Paulo');
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="UTF-8">
	<meta name="copyrights" content="Hamburgueria Vegas Gourmet">
	<meta name="theme-color" content="#000000">
	<meta name="msapplication-navbutton-color" content="#000000">
	<meta name="apple-mobile-web-app-status-bar-style" content="#000000">
	<meta name="viewport" content="width=device-width, initical-scale=1">
	<meta name="description" content="Hamburgueria Vegas Gourmet, situada em São Vicente, na Baixada Santista, temos os melhor Hamburgueres artesanais e tradicionais do baixada">
	<meta name="keywords" content="lanche, hamburgue, artesanal, tradicional, comida, fritas, baixa santista, praia, quiosque, sao vicente, bebidas">
	<meta name="robots" content="INDEX, FALLOW">
	<title>Hamburgueria Vegas Gourmet</title>
	<link rel="shortcut icon" type="image/x-icon" href="./favicon.ico">
	<link rel="stylesheet" href="assets/css/style.css?edite=<?php echo filemtime('assets/css/style.css'); ?>">
</head>

<body>
	<div class="creditos">
		<div class="desenvolvedor">
			<div class="fechar">X</div>
			<h1>Desenvolvido por:</h1>
			<div class="author">Renan Gustavo Rocha Torres</div>
			<div class="author">Lúcio Soares Laranjeira</div>
			<div class="author">João Vitor de Magalhães</div>
			<div class="author">Matheus Figueira Nascimento Guilherme</div>
			<div class="author">Alexandre Oliveira Lopes</div>
		</div>
	</div>

	<header>
		<div class="menu-base">
			<div class="base">
				<a href="?pagina=inicio"><div class="icon home"></div></a>
			</div>

			<div class="base">
				<a href="?pagina=cardapio"><div class="icon cardapio"></div></a>
			</div>

			<div class="base">
				<a href="?pagina=contato"><div class="icon contato"></div></a>
			</div>
		</div>

		<div class="escuro"></div>
		<div id="logo"></div>

		<menu class="estilo">
			<ul class="menu">
				<li class="item <?php if ($pagina == 'inicio' || empty($pagina)) { echo 'ativo'; } ?>">
					<a href="?pagina=inicio">INÍCIO</a>
				</li>
				<li class="item <?php if ($pagina == 'cardapio') { echo 'ativo'; } ?>">
					<a href="?pagina=cardapio">CARDÁPIO</a>
				</li>
				<li class="item <?php if ($pagina == 'contato') { echo 'ativo'; } ?>">
					<a href="?pagina=contato">CONTATO</a>
				</li>
			</ul>
		</menu>
	</header>

	<?php
	if ($pagina == "" || empty($pagina)) {
		include "assets/paginas/inicio.php";
	} else if (file_exists('assets/paginas/'.$pagina.'.php')) {
		include 'assets/paginas/'.$pagina.'.php';
	} else {
		"<h2>Página não encontrada!</h2>";
	}
	?>
	
	<footer>
		<div class="text">
			Todos os direitos reservados à Hamburgueria Vegas Gourmet- Copyright 2019 - <span class="ativaModal" style="cursor: pointer;">Desenvolvedores</span>
		</div>
	</footer>

	<script src="assets/js/jquery.min.js"></script>
	<script src="assets/js/jquery.nicescroll.min.js"></script>
	<script>
		$(document).ready(function(){
			$('.creditos').hide();
			$('.ativaModal').click(function(){
				$('.creditos').fadeIn(400);
			});

			$('.fechar').click(function(){
				$('.creditos').fadeOut(400);
			});

			var larguraTela = screen.width;
			var div = document.querySelector('#mapaG');
			if(larguraTela >= 600) {
				$('.maps').html('<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3645.678710362603!2d-46.36991168555873!3d-23.971798884480624!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x94ce1cc9651fbe87%3A0xf9c5cb5b69034549!2sAv.+Ayrton+Senna+da+Silva%2C+15+A+-+Itarar%C3%A9%2C+S%C3%A3o+Vicente+-+SP%2C+11320-200!5e0!3m2!1spt-BR!2sbr!4v1546710601014" width="700" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>');
			} else {
				$('.maps').html('<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3645.678710362603!2d-46.36991168555873!3d-23.971798884480624!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x94ce1cc9651fbe87%3A0xf9c5cb5b69034549!2sAv.+Ayrton+Senna+da+Silva%2C+15+A+-+Itarar%C3%A9%2C+S%C3%A3o+Vicente+-+SP%2C+11320-200!5e0!3m2!1spt-BR!2sbr!4v1546710601014" width="100%" height="300" frameborder="0" style="border:0" allowfullscreen></iframe>');
			}
			$("html").niceScroll();
		});
	</script>

	<!-- BEGIN JIVOSITE CODE {literal} -->
	<script type='text/javascript'>
	(function(){ var widget_id = 'mNiQeCe780';var d=document;var w=window;function l(){
	  var s = document.createElement('script'); s.type = 'text/javascript'; s.async = true;
	  s.src = '//code.jivosite.com/script/widget/'+widget_id
	    ; var ss = document.getElementsByTagName('script')[0]; ss.parentNode.insertBefore(s, ss);}
	  if(d.readyState=='complete'){l();}else{if(w.attachEvent){w.attachEvent('onload',l);}
	  else{w.addEventListener('load',l,false);}}})();
	</script>
	<!-- {/literal} END JIVOSITE CODE -->

</body>
</html>