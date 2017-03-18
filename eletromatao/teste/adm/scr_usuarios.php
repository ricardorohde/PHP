<?
	// Controla as ações para a tabela de categorias
	include "protege.php";
	include "../php/mysqlconecta.php";
	
	$op = $_GET['op'];
	
	if($op == 'excluir'){
		$login = base64_decode($_GET['login']);		
		
		$sql = "DELETE FROM usuarios WHERE usu_login = '$login'";
		mysql_query($sql);
		
		echo "<script> location = 'index.php?id=23'; </script>";
	}elseif($op == 'alterar'){	
		$aLogin = base64_decode($_GET['login']);
		$nome = $_POST['nome'];
		$login = $_POST['login'];
		$senha = base64_encode($_POST['senha']);
		
		$sql = "SELECT COUNT(usu_login) FROM usuarios WHERE usu_login = '$login'";
		$rs = mysql_query($sql);
		$n = mysql_result($rs,0,0);
		
		if(($n == 0) || ($login == $aLogin)){
			$sql = "UPDATE usuarios SET usu_nome = '$nome', usu_login = '$login', usu_senha = '$senha' WHERE usu_login = '$aLogin'";
			mysql_query($sql) or die(mysql_error());
		}else{
			echo "<script> alert('Já existe um usuário com este login!'); </script>";
		}
		
		echo "<script> location = 'index.php?id=23'; </script>";
	}elseif($op == 'salvar'){
	
		$nome = $_POST['nome'];
		$login = $_POST['login'];
		$senha = base64_encode($_POST['senha']);
		
		$sql = "SELECT COUNT(usu_login) FROM usuarios WHERE usu_login = $login";
		$rs = mysql_query($sql);
		$n = mysql_result($rs,0,0);
		
		if($n == 0){		
			$sql = "INSERT INTO usuarios(usu_login,usu_nome,usu_senha) VALUES('$login','$nome','$senha')";
			mysql_query($sql) or die(mysql_error());
		}else{
			echo "<script> alert('Já existe um usuário com este login!'); </script>";
		}				
		
		echo "<script> location = 'index.php?id=23'; </script>";
	}
	
		
?>