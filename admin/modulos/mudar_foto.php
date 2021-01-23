<div style="padding: 10px 5px">
	<form action="" method="POST" enctype="multipart/form-data">
		<input type="hidden" name="acao" value="insere">
		<input type="file" name="arquivo">

		<input type="submit" class="input-submit" value="ALTERAR FOTO">
	</form>
</div>

<?php

if($acao == "insere") {
	$usuario = isset($_SESSION['id_usuario']) ? $_SESSION['id_usuario'] : 0;
	$data = time();

	if(!is_dir('../assets/img/uploads/')) {
		mkdir(__DIR__.'../../../assets/img/uploads/', 0777, true);
	}

	date_default_timezone_set("Brazil/East");
	$ext = strtolower(substr($_FILES['arquivo']['name'], -4));
	$novo_nome = md5($_FILES['arquivo']['name']).$ext;
	$dir = '../assets/img/uploads/';
	$arquivo = $novo_nome;
	move_uploaded_file($_FILES['arquivo']['tmp_name'], $dir.$novo_nome);

	echo $arquivo;

	$conexao->conectar()->query("UPDATE usuarios_painel SET avatar_painel = '{$arquivo}' WHERE id_usuario_painel = '{$usuario}'");

	echo "<script>alert('Alterado com sucesso');</script>";
}
?>