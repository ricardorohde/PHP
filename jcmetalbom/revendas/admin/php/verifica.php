<?
session_start();

include('mysqlconecta.php');

$user = $_POST['user'];
$pass = base64_encode($_POST['pass']);

$sqlUser = "SELECT ACE_USER, ACE_PASS FROM TB_ACESSO WHERE ACE_USER = '$user' AND ACE_ATIVO = 'S'";
$exeUser = mysql_query($sqlUser);
$rowUser = mysql_num_rows($exeUser);

if($rowUser>0){
	$usuario = mysql_result($exeUser,0,0);
	$senha = mysql_result($exeUser,0,1);
	
	if($user == $usuario && $pass == $senha){
		session_register("K16Gsjhq_Il241");
		$K16Gsjhq_Il241 = "usr=".$usuario."psw=".$senha;
		header("location: index.php");
	}
	else if($user == $usuario && $pass != $senha){
		$erro = base64_encode("- Senha Incorreta.");
		header("location: login.php?info=$erro");
	}
}
else{
	$erro = base64_encode("- Usuário Inexistente ou Inativo.");
	header("location: login.php?info=$erro");
}



/*
$usuario = "reinaldo";
$senha = "1234";

if($user == $usuario && $pass == $senha){
	session_start();
	session_register("K16Gsjhq_Il241");
	$K16Gsjhq_Il241 = "usr=".$usuario."psw=".$senha;
	header("location: index.php");
}
elseif($user != $usuario && $pass == $senha){
	$erro = base64_encode("- Usuário Incorreto.");
	header("location: login.php?info=$erro");
}
elseif($user == $usuario && $pass != $senha){
	$erro = base64_encode("- Senha Incorreta.");
	header("location: login.php?info=$erro");
}
elseif($user != $usuario && $pass != $senha){
	$erro = base64_encode("- Usuário e Senha Incorretos.");
	header("location: login.php?info=$erro");
}*/
?>
