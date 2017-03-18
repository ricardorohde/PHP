<?
	// PROTEGE CONTRA ACESSO NÃO AUTORIZADO
	session_start();
	if(!isset($_SESSION['login'])){
		header("Location: login.php?msg=1");
	}
?>