<?php
session_start();
$id_usuario = isset($_SESSION['id_usuario']) ? $_SESSION['id_usuario'] : false;
require 'app/config.php';
include 'assets/function/User.php';

// MENU URL
$id_menu = $Site->GET('menu', 0);
$id_submenu = $Site->GET('submenu', 0);

//Nome Página Atual
$SQLpagina = $conexao->conectar()->query("SELECT * FROM menu_acesso WHERE id_menu = '{$id_submenu}'");
$PegaPagina = $SQLpagina->fetch_assoc();
$pagina = $PegaPagina['menu'];

//Atalhos
$editar = $Site->GET('editar', false);
$inserir = $Site->GET('inserir', false);
$acao = $Site->POST('acao', false);

if(isset($_SESSION['usuario']) == false) {
	HEADER("location:login.php");
} else {
	$funcaoUsuario = $conexao->conectar()->query("SELECT id_funcao FROM usuarios_funcoes WHERE id_usuario_funcao = {$id_usuario}")->fetch_assoc();
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Painel Admin - Renan</title>
	<link rel="stylesheet" href="assets/css/geral.css?<?php echo filemtime('assets/css/geral.css'); ?>">
	<link rel="stylesheet" href="assets/css/font-face.css?<?php echo filemtime('assets/css/font-face.css'); ?>">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
</head>

<body>
	<header class="header">
		<?php
		$sql = $conexao->conectar()->query("SELECT avatar_painel FROM usuarios_painel WHERE id_usuario_painel = '{$id_usuario}'")->fetch_assoc();
		?>
		<div class="photo-user pull left" style="background: url('../assets/img/uploads/<?php echo $sql['avatar_painel']; ?>'); background-size: cover;"></div>
		<div class="welcome pull left">Bem-vindo, <b><?php echo $_SESSION['usuario']; ?></b></div>
		<div class="exit pull right"><a href="modulos/sair.php">SAIR</a></div>
	</header>
	
	<div id="menu" class="menu pull left">
		<ul class="menu">
			<li class="item"><a href="index.php"><div class="name"><div class="fas fa-home"></div> Página Inicial</div></a></li>

			<?php
			$sql = $conexao->conectar()->query("SELECT * FROM menu_acesso a, permissao_acesso b WHERE b.id_funcao = '{$funcaoUsuario['id_funcao']}' AND a.ativo = 'Ativo' AND a.id_menupai = 0 AND a.id_menu = b.id_menu");
			while($mostra = $sql->fetch_assoc()) {
			?>
			<li class="item"><a href="#"><div class="name"><div class="<?php echo $mostra['icone']; ?>"></div> <?php echo $mostra['menu']; ?></div></a>
				<ul class="submenu">
					<?php
					$sql2 = $conexao->conectar()->query("SELECT * FROM menu_acesso a, permissao_acesso b WHERE b.id_funcao = '{$funcaoUsuario['id_funcao']}' AND a.ativo = 'Ativo' AND a.id_menupai = '{$mostra['id_menu']}' AND a.id_menu = b.id_menu");
					while($submenu = $sql2->fetch_assoc()) {
					?>
					<li class="list"><a href="?menu=<?php echo $submenu['id_menupai']; ?>&submenu=<?php echo $submenu['id_menu']; ?>"><div class="pull left" style="heigth: 25px; width: 22px;"><i class="<?php echo $submenu['icone']; ?>"></i></div> <?php echo $submenu['menu']; ?></a></li>
				<?php } ?>
				</ul>
			</li>
			<?php } ?>
		</ul>
	</div>

	<div id="conteudo" class="content">
		<?php
		$site = $Site->GET('menu', 0);
		$sql = $conexao->conectar()->query("SELECT * FROM menu_acesso a, permissao_acesso b WHERE a.id_menupai = '{$id_menu}' AND a.id_menu = '{$id_submenu}' AND b.id_menu = a.id_menu");
		$encontra = $sql->num_rows;
		if ($encontra > 0) {
			$mostra = $sql->fetch_assoc();
			echo "<div class='title'>$pagina</div>";
			include("modulos/{$mostra['diretorio']}");
		} else if ($site == false) {
			echo "<div class='title'>Página Inicial</div>";
			include("modulos/inicio.php");
		}else {
			echo "<div class='title'>ERROR 404</div>";
			echo "<div style='padding-top: 10px;'>Está página não existe ou você não tem permissão!!</div>";
		}
		?>
	</div>

	<script src="assets/js/jquery-3.3.1.min.js"></script>
	<script src="assets/js/script.js?edit=<?php echo filemtime('assets/js/script.js'); ?>"></script>
</body>
</html>
<?php } ?>