<?php
session_start();
require 'app/config.php';
if(isset($_SESSION['usuario']) == true) {
	HEADER("location:index.php");
} else {
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="UTF-8">
	<title>Painel Admin</title>
	<link rel="stylesheet" href="assets/css/login.css?<?php echo filemtime('assets/css/login.css'); ?>">
	<link rel="stylesheet" href="assets/css/font-face.css?<?php echo filemtime('assets/css/login.css'); ?>">
</head>

<body>
	<section class="login">
		<div class="title">PAINEL ADMIN</div>

		<form action="" method="POST" id="logar">
			<fieldset class="input">
				<div class="base-icon">
					<div class="icon user"></div>
				</div>

				<select name="usuario" id="input-login">
					<option value="">--------------</option>
					<?php
					$sql = $conexao->conectar()->query("SELECT * FROM usuarios_painel");
					while($mostra = $sql->fetch_assoc()) {
					?>
					<option value="<?php echo $mostra['usuario_painel']; ?>"><?php echo $mostra['usuario_painel']; ?></option>
					<?php } ?>
				</select>
			</fieldset>

			<fieldset class="input">
				<div class="base-icon">
					<div class="icon pass"></div>
				</div>

				<input type="password" name="senha" id="input-password" placeholder="***********">
			</fieldset>

			<input type="submit" value="">
		</form>
	</section>

	<script src="assets/js/jquery-3.3.1.min.js"></script>
	<script src="assets/js/script.js"></script>
</body>
</html>
<?php } ?>