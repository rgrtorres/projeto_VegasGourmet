<?php
include '../../app/config.php';
$conexao = new Conexao($config);
$deletar = isset($_POST['evento']) ? $_POST['evento'] : false;
$id = (int) isset($_POST['id']) ? $_POST['id'] : 0;
$resultado = null;

if($deletar == 'permissao') {
	$conexao->conectar()->query("DELETE FROM permissao_acesso WHERE id_permissao = '{$id}'");
	$resultado = "deletado";
} else if ($deletar == 'modulo') {
	$conexao->conectar()->query("DELETE FROM menu_acesso WHERE id_menu = '{$id}'");
	$conexao->conectar()->query("DELETE FROM permissao_acesso WHERE id_menu = '{$id}'");
	$resultado = "deletado";
} else if ($deletar == "usuario_painel") {
	$conexao->conectar()->query("DELETE FROM usuarios_painel WHERE id_usuario_painel = '{$id}'");
	$resultado = "deletado";
} else if ($deletar == "item_cardapio") {
	$conexao->conectar()->query("DELETE FROM cardapio_site WHERE id_cardapio = '{$id}'");
	$resultado = "deletado";
}

echo $resultado;
?>