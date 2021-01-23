<aside class="conteudo local">
	<div class="container-address">
		<div class="address">Av. Ayrton Senna da Silva, 15 A - Itararé, São Vicente - SP, 11320-200, Brasil</div>

		<div class="maps"></div>
	</div>
</aside>

<aside class="conteudo contato">
	<div class="content">
		<div class="texto">
			<h1>Deseja fazer pedido?</h1>
			<h2>Faça seu pedido através de nossas redes sociais.</h2>

			<div style="margin-top:3px;"><img src="assets/img/icon-whatsapp.png" height="17" width="17" style="position: relative; top: 2px;"> <a href="https://wa.me/5513982121061?"><i>13 97403-4361</i></a></div>
			<div style="margin-top:3px;"><img src="assets/img/icon-facebook.png" height="17" width="17" style="position: relative; top: 3px;"> <a href="https://www.facebook.com/HbgVegasGourmet/?ref=br_rs" target="_blank"><i>Hamburgueria Vegas Gourmet</i></a></div>
			<div style="margin-top:3px;"><img src="assets/img/icon-instagram.png" height="17" width="17" style="position: relative; top: 3px;"> <a href="https://www.instagram.com/vegasgourmet/?hl=pt-br" target="blank"><i>@VegasGourmet</i></a></div>
			<div style="margin-top:3px;"><img src="assets/img/icon-email.png" height="17" width="17" style="position: relative; top: 3px;"> <a href="mailto:contato@vegasgourmet.com.br" target="_top"><i>contato@vegasgourmet.com.br</i></a></div>

			<h2 style="padding: 10px 0px;">Link Direto Whatsapp</h2>
			<div style="margin: 5px 0px;">
				<img src="assets/img/qr-code.png" height="100" width="100" style="border-radius: 5px;">
			</div>

			<h2>Funcionamos de Terça a Domingo<br>19h até 01h da manhã</h2>

		</div>

		<?php
		$acao = $Site->POST('acao', false);
		if($acao == "contato") {
			$nome = $Site->POST('nome', false);
			$email = $Site->POST('email', false);
			$telefone = $Site->POST('telefone', false);
			$mensagem = $Site->POST('mensagem', false);
			$conexao->Conectar()->query("INSERT INTO contato_site (nome_contato, telefone_contato, email_contato, msg_contato, data_contato) VALUES ('{$nome}', '{$telefone}', '{$email}', '{$mensagem}', NOW())");

			echo "<script>alert('Obrigado por entrar em contato!');</script>";

			$conexao->Fechar();
		}
		?>
		<form action="" method="POST" style="margin-top: 18px;">
			<input type="hidden" name="acao" value="contato">
			<h1>Contate-nos</h1>
			<h3>Caso haja alguma sugestões, reclamações entre outros, utilize nosso campo de contato abaixo, lembrando que pode usar nossas redes sociais também!</h3>
			<input type="text" name="nome" placeholder="Nome" required />
			<input type="tel" name="telefone" placeholder="Telefone" required />
			<input type="email" name="email" placeholder="E-mail" required />
			<textarea name="mensagem" placeholder="Insira seu texto aqui" required></textarea>
			<input type="submit" value="Enviar!">
		</form>
	</div>
</aside>