<?php
$modulo = $Site->POST('modulo', false);
$diretorio = $Site->POST('diretorio', false);
$categoria = $Site->POST('categoria', 0);
$icone = $Site->POST('icone', false);
if($editar) {
?>
<form action="" method="POST">
	<input type="hidden" name="acao" value="insere">
	<?php
	$sql = $conexao->conectar()->query("SELECT * FROM menu_acesso WHERE id_menu = '{$editar}'");
	while($mostra = $sql->fetch_assoc()) {
	?>
	<input type="text" class="input-normal" name="modulo" placeholder="Modulo" value="<?php echo $mostra['menu']; ?>">
	<input type="text" class="input-normal" name="diretorio" placeholder="Diretorio" value="<?php echo $mostra['diretorio']; ?>">
	<input type="text" class="input-normal" name="icone" placeholder="Diretorio" value="<?php echo $mostra['icone']; ?>">

	<select name="categoria" class="input-normal">
		<?php
		$sql = $conexao->conectar()->query("SELECT * FROM menu_acesso WHERE id_menupai = 0 ORDER BY menu ASC");
		while($cat = $sql->fetch_assoc()) {
			$sql2 = $conexao->conectar()->query("SELECT * FROM menu_acesso WHERE id_menupai = '{$mostra['id_menupai']}'")->fetch_assoc();
		?>
		<option value="<?php echo $cat['id_menu']; ?>" <?php if ($sql2['id_menupai'] == $cat['id_menu']) { echo "selected"; } ?>><?php echo $cat['menu']; ?></option>
		<?php } ?>
	</select>
	<input type="submit" class="input-submit" value="Salvar">
	<?php } ?>
</form>
<?php
} else if ($inserir == true) {
	if ($acao == "inserir") {
		$conexao->conectar()->query("INSERT INTO menu_acesso (menu, diretorio, id_menupai, icone) VALUES ('{$modulo}', '{$diretorio}', '{$categoria}', '{$icone}')");
		echo "<script>alert('Inserido com sucesso')</script>";
	}
?>
<form action="" method="POST">
	<input type="hidden" name="acao" value="inserir">
	<form action="">
		<input type="text" class="input-normal" name="modulo" placeholder="Modulo">
		<input type="text" class="input-normal" name="diretorio" placeholder="Diretorio">
		<input type="text" class="input-normal" name="icone" placeholder="icone">

		<select name="categoria" class="input-normal">
			<option value="0">Menu Principal</option>
			<?php
			$sql = $conexao->conectar()->query("SELECT * FROM menu_acesso WHERE id_menupai = '0' ORDER BY menu ASC");
			while($cat = $sql->fetch_assoc()) {
			?>
			<option value="<?php echo $cat['id_menu']; ?>"><?php echo $cat['menu']; ?></option>
			<?php } ?>
		</select>
		<input type="submit" class="input-submit" value="Salvar">
	</form>
</form>
<?php
} else {
?>
<div style="padding-top: 10px;">
	<a href="?menu=<?php echo $id_menu; ?>&submenu=<?php echo $id_submenu; ?>&inserir=true">Inserir módulo</a>
	<table width="70%">
		<tr>
			<td style="padding: 5px;"><center><b>Editar</b></center></td>
			<td style="padding: 5px;"><b>Menu</b></td>
			<td style="padding: 5px;"><b>Diretorio</b></td>
			<td style="padding: 5px;"><center><b>Apagar</b></center></td>
		</tr>

		<?php
		$sql = $conexao->conectar()->query("SELECT * FROM menu_acesso ORDER BY id_menupai ASC");
		while($mostra = $sql->fetch_assoc()) {
		?>
		<tr id="find_<?php echo $mostra['id_menu']; ?>" rel="<?php echo $mostra['id_menu']; ?>">
			<td style="padding: 5px;"><a href="?menu=<?php echo $id_menu; ?>&submenu=<?php echo $id_submenu; ?>&editar=<?php echo $mostra['id_menu']; ?>"><center><i class="fas fa-edit"></i></center></a></td>
			<td style="padding: 5px;"><?php echo $mostra['menu']; ?></td>
			<td style="padding: 5px;"><?php echo $mostra['diretorio']; ?></td>
			<td style="padding: 5px;" onclick="item.deletar(<?php echo $mostra['id_menu']; ?>, 'modulo')" style="cursor: pointer;"><i class="fas fa-trash-alt"></i></a></td>
		</tr>
		<?php } ?>
	</table>
</div>
<?php } ?>