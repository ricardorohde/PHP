<?
$erro = base64_decode($_GET['info']);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>.:: Login - Painel de Controle ::.</title>
<link href="../js_css/estilos.css" rel="stylesheet" type="text/css">
<!--<script language="javascript" type="text/javascript" src="../js_css/ajax.js"></script>-->
<script language="javascript" type="text/javascript" src="js_css/scr.js"></script>
</head>

<body background="../img/fundoDegrade.jpg">
<table width="750" border="0" cellspacing="0" cellpadding="0" bgcolor="#000099" align="center">
  <tr>
    <td colspan="2" align="center">
	<table width="750" border="0" cellspacing="1" cellpadding="0">
	  <tr bgcolor="#FFFFFF">
		<td align="center"><img src="../img/topo.jpg" width="750" height="63" /></td>
	  </tr>
	  <tr bgcolor="#FFFFFF">
		<td align="center" valign="middle" height="100">
<form id="form_login" name="form_login" method="post" action="verifica.php">
  <span class="avisoInicial"><? if($erro != ""){echo $erro."<br />&nbsp;<br />&nbsp;";}?></span>
  <span class="txtTahoma11pxPreto">Usu&aacute;rio:</span> 
  <input name="user" type="text" id="user" class="BoxHome" /><span class="txtTahoma11pxPreto">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Senha: </span>
  <input name="pass" type="password" id="pass" class="BoxHome" />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input name="ok" type="submit" class="ButHome" id="ok" value="OK" /><? echo $permissao; ?>
</form></td>
		</tr>
	  <tr bgcolor="#FFFFFF">
		<td align="center" class="rodape">ELETRO MAT&Atilde;O LTDA - Mat&atilde;o - S&atilde;o Paulo - Brasil - 55(16) 3382-4450 / 3382-9248<br />
		  Comercial: comercial@eletromatao.com.br - Vendas: metalbom@eletromatao.com.br
		  </td>
	  </tr>
	</table>
	</td>
  </tr>
</table>
<div align="center" id="divDesenvolvimento"><a href="http://www.sysnetwork.com.br" class="desenv">Desenvolvido por <b>Sysnetwork</b></a></div>
</body>
</html>
