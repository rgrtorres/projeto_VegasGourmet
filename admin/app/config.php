<?php
$site = $_SERVER["HTTP_HOST"];
$config = null;

if ($site == "localhost") {
	$config = array(
					'servidor'	=>	'localhost',
				  	'usuario'	=>	'root',
				  	'senha'		=>	'vertrigo',
				  	'banco'		=>	'vegas'
				  );
} else {
	$config = array(
					'servidor'	=>	'localhost',
					'usuario'	=>	'agen5751_vegasbd',
					'senha'		=>	'LvmFRO_zGV?G',
					'banco'		=>	'agen5751_vegas'
				);
}

class Conexao {
	private $config;

	public function __construct ($config) {
		$this->config = $config;
	}

	public function conectar() {
		$mysqli = new mysqli($this->config['servidor'], $this->config['usuario'], $this->config['senha'], $this->config['banco']);

		return $mysqli;
	}

	public function fechar() {
		$this->conectar()->close();
	}
}

$conexao = new Conexao($config);
?>