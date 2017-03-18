<?
	$msg = $_GET['msg'];
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<!-- saved from url=(0014)about:internet -->
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Painel de Controle - Loja Virtual</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<style type="text/css">
td img {
	display: block;
}
.cx_texto{
	height: 17px;
	width: 164px;
	border: #000033 1px solid;
	font-size: 15px; 
	font-family: "Times New Roman", Times, serif; 
	color: #000000; 
}
.texto {
	font-size: 13px;
	font-weight: bold;
	font-family: "Times New Roman", Times, serif;
}
.titulo {
	font-size: 14px; 
	font-family: "Times New Roman", Times, serif;
	color: #000000; 
}
body {
	background-color: #FEFEFF;
}
.borda{
	border-top: #000033 1px solid;
	border-bottom: #000033 1px solid;
}
.btn{
	border: #000033 1px solid;
	height: 19px;
	width: 50px;
	background: #FEFEFF;
	font-size: 13px; 
	font-family: "Times New Roman", Times, serif;
	font-weight: bold;
	color: #000000; 
}
.btn:hover{
	border: #000033 1px dashed;
	height: 19px;
	width: 50px;
	background: #FEFEFF;
	font-size: 13px; 
	font-family: "Times New Roman", Times, serif; 
	font-weight: bold;
	color: #000000; 
}
</style>
<!--Fireworks 8 Dreamweaver 8 target.  Created Mon Oct 02 14:04:40 GMT-0300 (Hora oficial do Brasil) 2006-->
</head>
<body><br />
<form id="form" name="form" method="post" action="verifica.php?acao=login">
<input type="hidden" name="url" value="<? echo $_GET['url']; ?>" id="url" />
<table width="164" border="0" align="center" cellspacing="0" bgcolor="#FFFFFF">
  <tr>
    <td height="22" colspan="2" align="center" class="titulo">
			<strong>
			<? 
				switch($msg){
					case 1:
						echo "Acesso negado.<br>Faça Login.";
						break;
					case 2:
						echo "Usuário não encontrado.";
						break;
					case 3:
						echo "Usuário e senha não conferem.";
						break;
				}
			?>
			</strong>		</td>
  </tr>
  <tr>
   <td width="164" height="22" colspan="2" align="center" class="titulo">Login - Painel de Controle </td>
  </tr>
  <tr>
    <td height="2"><img name="linha" src="../img/layout/linha.jpg" width="164" height="2" border="0" id="linha" alt="" /></td>
  </tr>
  <tr>
    <td align="left" height="2"></td>
  </tr>
  
  <tr>
    <td height="2" align="left" class="texto"></td>
  </tr>
  <tr>
    <td align="left" class="texto">Usuário</td>
  </tr>
  <tr>
    <td align="left"><input name="usuario" type="text" class="cx_texto" id="usuario" /></td>
  </tr>
  <tr>
    <td height="5" align="left" class="texto"></td>
  </tr>
  <tr>
    <td align="left" class="texto">Senha</td>
  </tr>
  <tr>
    <td align="left"><input name="senha" type="password" class="cx_texto" id="senha" /></td>
  </tr>
  <tr>
    <td height="5" align="center"></td>
  </tr>
  <tr>
    <td align="center"><input name="Submit" type="submit" class="btn" value="Ok" /></td>
  </tr>
</table>
<br />
</form>
</body>
</html>
