<div style="padding: 10px 5px">
	<form action="" method="POST" enctype="multipart/form-data">
		<input type="hidden" name="acao" value="mudar_senha">
		<input type="password" class="input-normal" name="senha_antiga" placeholder="Senha Antiga">
		<input type="password" class="input-normal" name="senha_nova" placeholder="Nova Senha">
		<input type="password" class="input-normal" name="senha_nova_r" placeholder="Repita nova Senha">

		<input type="submit" class="input-submit" value="ALTERAR SENHA">
	</form>
</div>

<?php
if($acao == "mudar_senha") {
	$senha_atual = isset($_POST['senha_antiga']) ? sha1($_POST['senha_antiga']) : false;
	$senha_nova = isset($_POST['senha_nova']) ? sha1($_POST['senha_nova']) : false;
	$senha_nova_r = isset($_POST['senha_nova_r']) ? sha1($_POST['senha_nova_r']) : false;

	$sql = $conexao->conectar()->query("SELECT * FROM usuarios_painel WHERE id_usuario_painel = '{$id_usuario}'")->fetch_assoc();
	if($sql['senha_painel'] == $senha_atual) {
		if ( $senha_nova != $senha_nova_r ) {
			echo "<script>alert('As senhas novas não conferem!');</script>";
		} else {
			$conexao->conectar()->query("UPDATE usuarios_painel SET senha_painel = '{$senha_nova}' WHERE id_usuario_painel = '{$id_usuario}'");
			echo "<script>alert('Senha alterada com sucesso, você será deslogado por segurança!'); window.location.reload();</script>";
			session_destroy();
		}
	} else {
		echo "<script>alert('Senha atual está incorreta!');</script>";
	}
}
?>