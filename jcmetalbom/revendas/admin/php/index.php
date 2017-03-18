<?
include('protege.php');
//include('mysqlconecta.php');

$pg=array("pg_incluir.php", "pg_excluir.php");

$id=$_GET['id'];
($id=="")?($id=0):($id=$id);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>.:: Painel de Controle - Revendas ::.</title>
<link href="../js_css/estilos.css" rel="stylesheet" type="text/css">
<script language="javascript" type="text/javascript" src="../js_css/ajax.js"></script>
<script language="javascript" type="text/javascript" src="../js_css/scr.js"></script>
</head>

<body background="../img/fundoDegrade.jpg">
<table width="750" border="0" cellspacing="0" cellpadding="0" bgcolor="#000099" align="center">
  <tr>
    <td colspan="2" align="center">
	<table width="750" border="0" cellspacing="1" cellpadding="0">
	  <tr bgcolor="#FFFFFF">
		<td colspan="3" align="center"><img src="../img/topo.jpg" width="750" height="63" /></td>
	  </tr>
	  <tr bgcolor="#FFFFFF">
		<td width="250" height="20" align="center" valign="middle" bgcolor="#D7DEE3"><a href="?id=0" class="menuAdm">Incluir Revenda</a></td>
	    <td width="249" align="center" valign="middle" bgcolor="#D7DEE3"><a href="?id=1" class="menuAdm">Excluir Revenda</a></td>
	    <td width="249" align="center" valign="middle" bgcolor="#D7DEE3"><a href="logout.php" class="menuAdm">Logout</a></td>
	  </tr>
	  <tr bgcolor="#FFFFFF">
	    <td height="20" colspan="3" align="center" valign="middle" class="txtTahoma11pxPreto"><div id="divGeral"><? include $pg[$id]; ?></div></td>
	    </tr>
	  <tr bgcolor="#FFFFFF">
		<td colspan="3" align="center" class="rodape">ELETRO MAT&Atilde;O LTDA - Mat&atilde;o - S&atilde;o Paulo - Brasil - 55(16) 3382-4450 / 3382-9248<br />
		  Comercial: comercial@eletromatao.com.br - Vendas: metalbom@eletromatao.com.br</td>
	  </tr>
	</table>
	</td>
  </tr>
</table>
<div align="center" id="divDesenvolvimento"><a href="http://www.sysnetwork.com.br" class="desenv">Desenvolvido por <b>Sysnetwork</b></a></div>
</body>
</html>