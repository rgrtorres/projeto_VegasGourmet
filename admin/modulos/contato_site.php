<style>
	td { padding: 5px; }
</style>

<table width="70%">
	<tr>
		<td><b>Nome</b></td>
		<td><b>Telefone</b></td>
		<td><b>Email</b></td>
		<td><b>Data</b></td>
	</tr>

	<?php
	$sql = $conexao->conectar()->query("SELECT * FROM contato_site");
	while($mostra = $sql->fetch_assoc()) {
	?>
	<tr>
		<td><?php echo $mostra['nome_contato']; ?></td>
		<td><?php echo $mostra['telefone_contato']; ?></td>
		<td><?php echo $mostra['email_contato']; ?></td>
		<td><?php echo date('d/m/Y', strtotime($mostra['data_contato'])); ?></td>
		<td onclick="alert('<?php echo $mostra['msg_contato']; ?>');" style="cursor:pointer;">Ler mensagem</td>
	</tr>
	<?php } ?>
</table>