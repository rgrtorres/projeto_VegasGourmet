<?php
session_start();
include '../../app/config.php';
include '../function/User.php';
$conexao = new Conexao($config);
$tipo = $Site->POST('tipo', false);
$resultado = null;
switch ($tipo) {
	case 'logar':
		$usuario = $Site->POST('usuario', false);
		$senha = $Site->POST('senha', false);
		$sql = $conexao->conectar()->query("SELECT * FROM usuarios_painel WHERE usuario_painel = '{$usuario}' AND senha_painel = sha1('{$senha}') AND status_usuario_painel = 'Ativo'");
		$mostra = $sql->fetch_assoc();
		$conta = $sql->num_rows;

		if($conta > 0) {
			$_SESSION['usuario'] = $usuario;
			$_SESSION['id_usuario'] = $mostra['id_usuario_painel'];
			$resultado = "logado";
		} else {
			$resultado = "falha";
		}
	break;

	default:
		exit('Você não tem permissão para estar aqui!');
	break;
}

echo $resultado;
?>