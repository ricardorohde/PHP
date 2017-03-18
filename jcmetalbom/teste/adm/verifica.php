<?
	include "../php/mysqlconecta.php";
	
	$acao = $_GET['acao'];
	
	if($acao == 'login'){
		$usr = $_POST['usuario'];
		$snh = base64_encode($_POST['senha']);
	
		$sql = "SELECT COUNT(usu_login) FROM usuarios WHERE usu_login = '$usr' AND usu_senha = '$snh' LIMIT 0,1";

		$rs = mysql_query($sql) or die(mysql_error());
		$tot = mysql_result($rs,0,0);	
	
		if($tot == 0){
			echo "<script> location = 'login.php?msg=3'; </script>";
		}else{
			session_start();
			$_SESSION['login'] = $usr;
			echo "<script> location = 'index.php'; </script>";
		}	
	}elseif($acao == 'logout'){
		session_start();
		session_unset();
		session_destroy();
		echo "<script> location = 'login.php'; </script>";
	}
?>