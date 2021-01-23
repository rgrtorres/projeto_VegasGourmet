<style>
	td {
		padding:  5px;
	}
</style>
<?php
$item = $Site->POST('item', false);
$acompanhamento = $Site->POST('acompanhamento', false);
$preco = $Site->POST('preco', false);
if($inserir) {
	if($acao == "insere") {
		$conexao->conectar()->query("INSERT INTO cardapio_site (item_cardapio, acompanhamento_item_cardapio, preco_item_cardapio, categoria_item_cardapio) VALUES ('{$item}', '{$acompanhamento}', '{$preco}', 'LancheA')");

		echo "<script>alert('Adicionado com sucesso!');</script>";

	}
?>
<form action="" method="POST">
	<input type="hidden" name="acao" value="insere">
	<input type="text" class="input-normal" name="item" placeholder="Nome do Lanche" required>
	<input type="text" class="input-normal" name="acompanhamento" placeholder="acompanhamentos">
	<input type="number" class="input-normal" min="1" step="any" name="preco" placeholder="Preço" required>
	<h3>Obs: Caso não tenha acompanhamento, deixe em branco o campo <b>"Acompanhamentos"</b></h3>

	<input type="submit" class="input-submit" value="Salvar">
</form>
<?php
} else if ($editar) {
	$consulta = $conexao->conectar()->query("SELECT * FROM cardapio_site WHERE id_cardapio = '{$editar}'")->fetch_assoc();
	if($acao == 'editar') {
		$conexao->conectar()->query("UPDATE cardapio_site SET item_cardapio = '{$item}', acompanhamento_item_cardapio = '{$acompanhamento}', preco_item_cardapio = '{$preco}' WHERE id_cardapio = '{$editar}'");

		echo "<script>alert('Editado com sucesso!');</script>";
	}
?>
<form action="" method="POST">
	<input type="hidden" name="acao" value="editar">
	<input type="text" class="input-normal" name="item" placeholder="Nome do Lanche" value="<?php echo $consulta['item_cardapio']; ?>" required>
	<input type="text" class="input-normal" name="acompanhamento" placeholder="acompanhamentos" value="<?php echo $consulta['acompanhamento_item_cardapio']; ?>">
	<input type="number" class="input-normal" min="1" step="any" name="preco" placeholder="Preço" value="<?php echo $consulta['preco_item_cardapio']; ?>" required>
	<h3>Obs: Caso não tenha acompanhamento, deixe em branco o campo <b>"Acompanhamentos"</b></h3>

	<input type="submit" class="input-submit" value="Salvar">
</form>
<?php } else { ?>
<a href="?menu=<?php echo $id_menu; ?>&submenu=<?php echo $id_submenu; ?>&inserir=true">Inserir item</a>
<table width="70%">
	<tr>
		<td>Número</td>
		<td>Porção</td>
		<td>Acompanhamento</td>
		<td>Preço</td>
		<td>Ação</td>
	</tr>

	<?php
	$sql = $conexao->conectar()->query("SELECT * FROM cardapio_site WHERE categoria_item_cardapio = 'LancheA'");
	while($mostra = $sql->fetch_assoc()) {
	?>
	<tr id="find_<?php echo $mostra['id_cardapio']; ?>" rel="<?php echo $mostra['id_cardapio']; ?>">
		<td><?php echo $mostra['id_cardapio']; ?></td>
		<td><?php echo $mostra['item_cardapio']; ?></td>
		<td><?php echo $mostra['acompanhamento_item_cardapio']; ?></td>
		<td><?php echo $mostra['preco_item_cardapio']; ?></td>
		<td><a href="?menu=<?php echo $id_menu; ?>&submenu=<?php echo $id_submenu; ?>&editar=<?php echo $mostra['id_cardapio']; ?>"><i class="fas fa-edit"></i></a> <i class="fas fa-trash-alt" onclick="item.deletar(<?php echo $mostra['id_cardapio']; ?>, 'item_cardapio')" style="cursor: pointer;"></i></td>
	</tr>
	<?php } ?>
</table>
<?php } ?>