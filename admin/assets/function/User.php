<?php
class Site {

	public function anti_injection($string) {
		$string = strip_tags($string);
		$string = htmlspecialchars($string);
		$string = addslashes($string);
		$string = str_ireplace("SELECT","",$string);
		$string = str_ireplace("FROM","",$string);
		$string = str_ireplace("WHERE","",$string);
		$string = str_ireplace("INSERT","",$string);
		$string = str_ireplace("UPDATE","",$string);
		$string = str_ireplace("DELETE","",$string);
		$string = str_ireplace("DROP","",$string);
		$string = str_ireplace("DATABASE","",$string);
		$string = str_ireplace("USE","",$string);

		return $string;
	}

	public function POST ($string, $retorno) {
		return $this->anti_injection(isset($_POST[$string]) ? $_POST[$string] : $retorno);
	}

	public function GET ($string, $retorno) {
		return $this->anti_injection(isset($_GET[$string]) ? $_GET[$string] : $retorno);
	}
}

$Site = new Site();
?>