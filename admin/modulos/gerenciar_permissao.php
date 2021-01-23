<style>
	td {
		 padding: 5px;
	}
</style>
<?php
$acao = $Site->POST('acao', false);
$id_funcao = $Site->POST('id_funcao', 0);
$id_modulo = $Site->POST('id_modulo', 0);

if($editar == true) {
	if ($inserir == true) {
		if($acao == "inserir") {
			$sqlConfere = $conexao->conectar()->query("SELECT * FROM permissao_acesso WHERE id_menu = '{$id_modulo}' AND id_funcao = '{$id_funcao}'");
			if ($sqlConfere->num_rows > 0) {
				echo "<script>alert('Essa permissão já foi dada anteriormente!');</script>";
			} else {
				$conexao->conectar()->query("INSERT INTO permissao_acesso (id_menu, id_funcao) VALUES ('{$id_modulo}', '{$id_funcao}')");
				echo "<script>alert('Inserido com sucesso');</script>";
			}
		}
?>
<form action="" method="POST">
	<input type="hidden" name="acao" value="inserir">
	<select name="id_modulo" class="input-normal">
		<?php
		$sqlMenu = $conexao->conectar()->query("SELECT * FROM menu_acesso");
		while($menu = $sqlMenu->fetch_assoc()) {
		?>
		<option value="<?php echo $menu['id_menu']; ?>" selected><?php echo $menu['menu']; ?></option>
		<?php } ?>
	</select>

	<select name="id_funcao" class="input-normal">
		<?php
		$sqlNivel = $conexao->conectar()->query("SELECT * FROM funcoes_painel WHERE id_funcao = '{$editar}'");
		while($funcao = $sqlNivel->fetch_assoc()) {
		?>
		<option value="<?php echo $funcao['id_funcao']; ?>" selected><?php echo $funcao['nome_funcao']; ?></option>
		<?php } ?>
	</select>
	<input type="submit" class="input-submit" value="Salvar">
</form>
<?php
} else {
?>
<a href="?menu=<?php echo $id_menu; ?>&submenu=<?php echo $id_submenu; ?>&editar=<?php echo $editar; ?>&inserir=true">Inserir Permissão</a><br>
<table width="70%">
	<tr>
		<td>ID Permissão</td>
		<td>Menu</td>
		<td>Ação</td>
	</tr>

	<?php
	$sql = $conexao->conectar()->query("SELECT * FROM permissao_acesso a, menu_acesso b WHERE a.id_menu = b.id_menu AND a.id_funcao = '{$editar}' ORDER BY id_permissao ASC");
	while($permissao = $sql->fetch_assoc()) {
	?>
	<tr id="find_<?php echo $permissao['id_permissao']; ?>" rel="<?php echo $permissao['id_permissao']; ?>">
		<td><?php echo $permissao['id_permissao']; ?></td>
		<td><?php echo $permissao['menu']; ?></td>
		<td><i class="fas fa-trash-alt" onClick="item.deletar(<?php echo $permissao['id_permissao']; ?>, 'permissao')" style="cursor:pointer"></i></a></td>
	</tr>
	<?php } ?>
</table>
<?php
}} else {
?>
<div style="padding-top: 10px;">
	Escolha qual Função deseja editar as permissões.
	<table width="70%">
		<tr>
			<td>ID Função</td>
			<td>Função</td>
			<td>Ação</td>
		</tr>

		<?php
		$sql = $conexao->conectar()->query("SELECT * FROM funcoes_painel ORDER BY nome_funcao ASC");
		while($funcao = $sql->fetch_assoc()) {
		?>
		<tr id="find_<?php echo $mostra['id_funcao']; ?>" rel="<?php echo $mostra['id_funcao']; ?>">
			<td><?php echo $funcao['id_funcao']; ?></td>
			<td><?php echo $funcao['nome_funcao']; ?></td>
			<td><a href="?menu=<?php echo $id_menu; ?>&submenu=<?php echo $id_submenu; ?>&editar=<?php echo $funcao['id_funcao']; ?>"><i class="fas fa-edit"></i></a></td>
		</tr>
		<?php } ?>
	</table>
</div>
<?php } ?>