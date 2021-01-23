<?php
session_start();
if($_SESSION['usuario'] == true) {
	unset($_SESSION['usuario']);
	header("location: ../login.php");
}
?>