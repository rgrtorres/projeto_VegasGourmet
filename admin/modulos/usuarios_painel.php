<style>
	td { padding: 5px 5px; }
</style>
<?php
if($inserir) {
	if($acao == "inserir") {
		$idFuncao = $Site->POST('id_funcao', 0);
		$usuario = $Site->POST('usuario', false);
		$senha = $Site->POST('senha', false);

		$conta = $conexao->conectar()->query("SELECT * FROM usuarios_painel WHERE usuario_painel = '{$usuario}'");
		if($conta->num_rows > 0) {
			echo "<script>alert('Usuário já existe');</script>";
		} else {

			$conexao->conectar()->query("INSERT INTO usuarios_painel (usuario_painel, senha_painel) VALUES ('{$usuario}', sha1('{$senha}'))");
			$user = $conexao->conectar()->query("SELECT * FROM usuarios_painel WHERE usuario_painel = '{$usuario}'")->fetch_assoc();
			$conexao->conectar()->query("INSERT INTO usuarios_funcoes (id_funcao, id_usuario) VALUES ('{$idFuncao}', '{$user['id_usuario_painel']}')");
			echo "<script>alert('Usuário cadastrado com sucesso!');</script>";
		}
	}
?>
<form action="" method="POST">
	<input type="hidden" name="acao" value="inserir">
	<input type="text" name="usuario" class="input-normal" placeholder="Nome do Usuário" required>
	<input type="password" name="senha" class="input-normal" placeholder="Senha do usuário" required>

	<select name="id_funcao" class="input-normal">
		<?php
		$sql = $conexao->conectar()->query("SELECT * FROM funcoes_painel");
		while($mostra = $sql->fetch_assoc()) {
		?>
		<option value="<?php echo $mostra['id_funcao'] ?>"><?php echo $mostra['nome_funcao']; ?></option>
		<?php } ?>
	</select>

	<input type="submit" class="input-submit" value="Inserir Usuário">
</form>
<?php
} else if ($editar) {
	if($acao == "editar") {
		$usuario = $Site->POST('usuario', false);
		$funcao = $Site->POST('id_funcao', 0);
		$status_usuario = $Site->POST('status_usuario', false);

		$conexao->conectar()->query("UPDATE usuarios_painel SET usuario_painel = '{$usuario}', status_usuario_painel = '{$status_usuario}' WHERE id_usuario_painel = '{$editar}'");
		$conexao->conectar()->query("UPDATE usuarios_funcoes SET id_funcao = '{$funcao}' WHERE id_usuario = '{$editar}'");
		echo "<script>alert('Editado com sucesso!');</script>";
	}
?>
<form action="" method="POST">
	<?php
	$sql = $conexao->conectar()->query("SELECT * FROM usuarios_painel WHERE id_usuario_painel = '{$editar}'");
	while($mostra = $sql->fetch_assoc()) {
	?>
	<input type="hidden" name="acao" value="editar">
	Nome de usuário:
	<input type="text" name="usuario" class="input-normal" placeholder="Nome do Usuário" value="<?php echo $mostra['usuario_painel']; ?>" required>

	Função:
	<select name="id_funcao" class="input-normal">
		<?php
		$sqlF = $conexao->conectar()->query("SELECT * FROM funcoes_painel ORDER BY nome_funcao ASC");
		while($mostraF = $sqlF->fetch_assoc()) {
			$sqlF2 = $conexao->conectar()->query("SELECT * FROM funcoes_painel a, usuarios_funcoes b WHERE b.id_usuario = '{$mostra['id_usuario_painel']}'")->fetch_assoc();
		?>
		<option value="<?php echo $mostraF['id_funcao'] ?>" <?php if ($mostraF['id_funcao'] == $sqlF2['id_funcao']) { echo "selected"; } ?>><?php echo $mostraF['nome_funcao']; ?></option>
		<?php } ?>
	</select>

	Status:
	<select name="status_usuario" class="input-normal">
		<option value="Ativo" <?php if($mostra['status_usuario_painel'] == "Ativo") { echo "selected"; } ?>>Ativo</option>
		<option value="Inativo" <?php if($mostra['status_usuario_painel'] == "Inativo") { echo "selected"; } ?>>Inativo</option>
	</select>

	<input type="submit" class="input-submit" value="Editar Usuário">
	<?php } ?>
</form>

<div class="title">Alterar Senha</div>
<?php
if($acao == "alterar_senha") {
	$senha = $Site->POST('senha', false);

	$conexao->conectar()->query("UPDATE usuarios_painel SET senha_painel = sha1('{$senha}') WHERE id_usuario_painel = '{$editar}'");
	echo "<script>alert('Senha editada com sucesso!');</script>";
}
?>
<form action="" method="POST">
	<input type="hidden" name="acao" value="alterar_senha">
	<input type="password" name="senha" class="input-normal" placeholder="Insira aqui a nova senha!" required>
	<input type="submit" class="input-submit" value="Alterar Senha">
</form>
<?php } else { ?>
<div style="padding-top: 10px;">
	<a href="?menu=<?php echo $id_menu; ?>&submenu=<?php echo $id_submenu; ?>&inserir=true">Inserir Usuário</a>
	<table width="70%">
		<tr>
			<td>ID Usuário</td>
			<td>Usuário</td>
			<td>Função</td>
			<td>Status</td>
			<td>Ação</td>
		</tr>

		<?php
		$sql = $conexao->conectar()->query("SELECT * FROM usuarios_painel");
		while($mostra = $sql->fetch_assoc()) {
			$sqlfuncao = $conexao->conectar()->query("SELECT * FROM funcoes_painel a, usuarios_funcoes b WHERE b.id_usuario = '{$mostra['id_usuario_painel']}' AND b.id_funcao = a.id_funcao");
			$funcao = $sqlfuncao->fetch_assoc();
		?>
		<tr id="find_<?php echo $mostra['id_usuario_painel']; ?>" rel="<?php echo $mostra['id_usuario_painel']; ?>">
			<td><?php echo $mostra['id_usuario_painel']; ?></td>
			<td><?php echo $mostra['usuario_painel']; ?></td>
			<td><?php echo $funcao['nome_funcao']; ?></td>
			<td><?php echo $mostra['status_usuario_painel']; ?></td>
			<td><a href="?menu=<?php echo $id_menu; ?>&submenu=<?php echo $id_submenu; ?>&editar=<?php echo $mostra['id_usuario_painel']; ?>"><i class="fas fa-edit"></i></a> <i class="fas fa-trash-alt" onclick="item.deletar(<?php echo $mostra['id_usuario_painel']; ?>, 'usuario_painel')" style="cursor: pointer;"></i></td>
		</tr>
		<?php } ?>
	</table>
</div>
<?php } ?>