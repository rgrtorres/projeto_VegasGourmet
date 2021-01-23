<?php
$site = isset($_SERVER["HTTP_HOST"]) ? $_SERVER["HTTP_HOST"] : false;
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
					'usuario'	=>	'user',
					'senha'		=>	'senha',
					'banco'		=>	'banco'
				);
}

class Conexao {
	private $config;

	public function __construct ($config) {
		$this->config = $config;
	}

	public function Conectar() {
		$mysqli = new mysqli($this->config['servidor'], $this->config['usuario'], $this->config['senha'], $this->config['banco']);

		return $mysqli;
	}

	public function Fechar() {
		$this->Conectar()->close();
	}
}

$conexao = new Conexao($config);
?>