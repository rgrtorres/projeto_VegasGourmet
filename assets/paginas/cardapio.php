<aside class="conteudo pagina-cardapio">
	<div class="cardapio-base">
		<div class="side ladol">
			<div class="lanche">
				<div class="categoria-logo tradicionais"></div>
				<ol>
					<?php
					$sql = $conexao->Conectar()->query("SELECT * FROM cardapio_site WHERE categoria_item_cardapio = 'LancheT'");
					while($mostra = $sql->fetch_assoc()) {
					?>
					<li>
						<div class="produto">
							<div class="pull left numeracao"><?php echo $mostra['id_cardapio']; ?></div>
							<div class="pull left nome-produto"> - <?php echo $mostra['item_cardapio']; ?></div>
						</div>

						<div class="pull right preco">R$ <?php echo $mostra['preco_item_cardapio']; ?></div>

						<div class="descricao"><?php echo $mostra['acompanhamento_item_cardapio']; ?></div>
					</li>
					<?php } ?>
				</ol>
			</div>

			<div class="lanche">
				<div class="categoria-logo artesanais"></div>
				<ol>
					<?php
					$sql = $conexao->Conectar()->query("SELECT * FROM cardapio_site WHERE categoria_item_cardapio = 'LancheA'");
					while($mostra = $sql->fetch_assoc()) {
					?>
					<li>
						<div class="produto">
							<div class="numeracao"><?php echo $mostra['id_cardapio']; ?></div>
							<div class="nome-produto"> - <?php echo $mostra['item_cardapio']; ?></div>
						</div>

						<div class="preco">R$ <?php echo $mostra['preco_item_cardapio']; ?></div>

						<div class="descricao"><?php echo $mostra['acompanhamento_item_cardapio']; ?></div>
					</li>
					<?php } ?>
				</ol>
			</div>
		</div>

		<div class="side lador">
			<div class="lanche">
				<div class="categoria-logo porcoes"></div>
				<ol>
					<?php
					$sql = $conexao->Conectar()->query("SELECT * FROM cardapio_site WHERE categoria_item_cardapio = 'Porcao'");
					while($mostra = $sql->fetch_assoc()) {
					?>
					<li>
						<div class="produto">
							<div class="pull left numeracao"><?php echo $mostra['id_cardapio']; ?></div>
							<div class="pull left nome-produto"> - <?php echo $mostra['item_cardapio']; ?></div>
						</div>

						<div class="pull right preco">R$ <?php echo $mostra['preco_item_cardapio']; ?></div>

						<div class="descricao"><?php echo $mostra['acompanhamento_item_cardapio']; ?></div>
					</li>
					<?php } ?>
				</ol>
			</div>

			<div class="lanche">
				<div class="categoria-logo bebidas"></div>
				<ol>
					<?php
					$sql = $conexao->Conectar()->query("SELECT * FROM cardapio_site WHERE categoria_item_cardapio = 'Bebida'");
					while($mostra = $sql->fetch_assoc()) {
					?>
					<li>
						<div class="produto">
							<div class="pull left nome-produto"><?php echo $mostra['item_cardapio']; ?></div>
						</div>

						<div class="pull right preco">R$ <?php echo $mostra['preco_item_cardapio']; ?></div>

						<div class="descricao"><?php echo $mostra['acompanhamento_item_cardapio']; ?></div>
					</li>
					<?php } ?>
				</ol>
			</div>
		</div>
	</div>
</aside>