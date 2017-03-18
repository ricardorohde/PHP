<?
session_start();
session_unset();
session_destroy();

header("location: index.php");
?>
<title>.:: Logout - Painel de Controle ::.</title>