<style>
	td {
		 padding: 5px;
	}
</style>
<?php
$funcao = $Site->POST('funcao', false);
if ($inserir == true) {
	if($acao == "inserir") {
		$conexao->conectar()->query("INSERT INTO funcoes_painel (nome_funcao) VALUES ('{$funcao}')");
		echo "<script>alert('Inserido com sucesso');</script>";
	}
?>
<form action="" method="POST">
	<input type="hidden" name="acao" value="inserir">
	<input type="text" name="funcao" placeholder="Nome da função" class="input-normal" required>
	<input type="submit" class="input-submit" value="Inserir">
</form>
<?php
} else if ($editar) {
	$sql = $conexao->conectar()->query("SELECT * FROM funcoes_painel WHERE id_funcao = '{$editar}'");
	$mostra = $sql->fetch_assoc();

	if($acao == "editar") {
		$conexao->conectar()->query("UPDATE funcoes_painel SET nome_funcao = '{$funcao}' WHERE id_funcao = '{$editar}'");
		echo "<script>alert('Editado com sucesso');</script>";
	}
?>
<form action="" method="POST">
	<input type="hidden" name="acao" value="editar">
	<input type="text" name="funcao" placeholder="Nome da função" class="input-normal" value="<?php echo $mostra['nome_funcao']; ?>" required>
	<input type="submit" class="input-submit" value="Editar">
</form>
<?php } else { ?>
<div style="padding-top: 10px;">
		<a href="?menu=<?php echo $id_menu; ?>&submenu=<?php echo $id_submenu; ?>&inserir=true">Inserir Função</a>
	<table width="70%">
		<tr>
			<td>ID Função</td>
			<td>Função</td>
			<td>Ação</td>
		</tr>

		<?php
		$sql = $conexao->conectar()->query("SELECT * FROM funcoes_painel");
		while($mostra = $sql->fetch_assoc()) {
		?>
		<tr id="find_<?php echo $mostra['id_funcao']; ?>" rel="<?php echo $mostra['id_funcao']; ?>">
			<td><?php echo $mostra['id_funcao']; ?></td>
			<td><?php echo $mostra['nome_funcao']; ?></td>
			<td><a href="?menu=<?php echo $id_menu; ?>&submenu=<?php echo $id_submenu; ?>&editar=<?php echo $mostra['id_funcao']; ?>"><i class="fas fa-edit"></i></a> <i class="fas fa-trash-alt"  onclick="item.deletar(<?php echo $mostra['id_funcao']; ?>, 'funcao')" style="cursor: pointer;"></i></td>
		</tr>
		<?php } ?>
	</table>
</div>
<?php } ?>