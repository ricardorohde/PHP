<?
include('mysqlconecta.php');

$sqlUF = "SELECT DISTINCT REP_ESTADO FROM TB_REPRESENTANTES WHERE REP_ATIVO = 'S' ORDER BY REP_ESTADO ASC";
$exeUF = mysql_query($sqlUF);
while($rowUF=mysql_fetch_array($exeUF)){
	$atualUF = $rowUF['REP_ESTADO'];
	$atualUFURL = urlencode($atualUF);
	
	$contUF .= "
			<option value='".$atualUFURL."'>".$atualUF."</option>";
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>.:: Listagem de Revendas ::.</title>
<link href="../js_css/estilos.css" rel="stylesheet" type="text/css">
<script language="javascript" type="text/javascript" src="../js_css/ajax.js"></script>
<!--<script language="javascript" type="text/javascript" src="js_css/scr.js"></script>-->
<script src="Scripts/AC_RunActiveContent.js" type="text/javascript"></script>
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
		<td align="center" valign="middle"><div id="divMeioRepres" style="display:none;">
		<table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td width="35%" align="center" valign="top" style="padding-left:3px; padding-right:3px;">
		 <!--<div id="divSeparador" style="height:8px;"></div>
		 <div id="divCidades"><span class="txtTahoma11pxPretoBold">
		 Cidade:&nbsp;&nbsp;&nbsp;</span><select name="cmpCidade" class="BoxHome" id="cmpCidade">
			<option value="vazio">Selecione uma Cidade</option>
		 </select></div>
		 <div id="divSeparador" style="height:8px;"></div>
		 <div id="divSeparador" style="height:1px; background-color:#000099"></div>
		 <div id="divSeparador" style="height:8px;"></div>-->
		 <div id="divListaRepres" align="center">&nbsp;</div></td>
            <td width="65%" align="center" valign="middle" style="border:1px #000099 solid; padding:3px;"><div id="divGeralRepres"></div></td>
          </tr>
        </table></div>
		<div id="avisoInicial" align="center"><img src="../img/img1.jpg" /></div></td>
		</tr>
		
	  <!-- | -->
	  <tr bgcolor="#FFFFFF">
		<td align="center" valign="middle" style="padding:3px;"><table width="100%" height="100%" border="0" cellspacing="0" cellpadding="0">
          <tr bgcolor="#3B58A4">
            <td align="center" width="50%"><!--<span class="txtTahoma11pxPretoBold">Estado:&nbsp;&nbsp;&nbsp;</span>
		  <select name="cmpEstado" class="BoxHome" id="cmpEstado" onchange="javascript:if(this.value=='vazio'){alert('- Escolha um Estado Válido'); document.getElementById('cmpCidade').disabled=true; document.getElementById('divMeioRepres').style.display='none'; document.getElementById('avisoInicial').style.display='block';}else{incluiPagina('scr_mostra_cidades.php?uf='+this.value+'&tm=<?=time();?>', 'divCidades');}">
			<option value="vazio" selected="selected">Selecione um Estado</option>
			<?=$contUF?>
		  </select>-->
              <script type="text/javascript">
AC_FL_RunContent( 'codebase','http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=7,0,19,0','width','370','height','355','src','../flash/mapaBR','quality','high','pluginspage','http://www.macromedia.com/go/getflashplayer','movie','../flash/mapaBR' ); //end AC code
</script><noscript><object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=7,0,19,0" width="370" height="355">
                <param name="movie" value="../flash/mapaBR.swf" />
                <param name="quality" value="high" />
                <embed src="../flash/mapaBR.swf" quality="high" pluginspage="http://www.macromedia.com/go/getflashplayer" type="application/x-shockwave-flash" width="370" height="355"></embed>
              </object></noscript></td>
            <td align="center" width="50%" valign="top"><div id="divCidades"><span class="txtTahoma11pxBrancoBold">&nbsp;
		 <br />
		 LOCALIZE A REVENDA MAIS PR&Oacute;XIMA DE VOC&Ecirc;<br />
		 <br />
		 &nbsp;<br />&nbsp;
		 <br />
		 Selecione no mapa o estado e abaixo as cidades:<br />
		 <br />
            </span>
                <select name="cmpCidade" class="BoxHome" id="cmpCidade">
			<option value="vazio">Selecione uma Cidade</option>
		 </select>
		 &nbsp;
		 <br />&nbsp;
		 <br />&nbsp;
		 <br />&nbsp;
		 <br />&nbsp;
		 <br />
		 &nbsp;<span class="txtTahoma11pxBranco">As Informa&ccedil;&otilde;es constantes nesse cadastro foram fornecidas<br />
		 pelas pr&oacute;prias revendas atrav&eacute;s de duas compras</span></div></td>
          </tr>
        </table></td>
	  </tr>
	  <!-- | -->
	  <tr bgcolor="#FFFFFF">
		<td align="center" class="rodape">ELETRO MAT&Atilde;O LTDA - Mat&atilde;o - S&atilde;o Paulo - Brasil - 55(16) 3382-4450 / 3382-9248<br />
		  Comercial: comercial@eletromatao.com.br - Vendas: metalbom@eletromatao.com.br
		  </td>
	  </tr>
	</table>
	</td>
  </tr>
</table>
<div align="center" id="divDesenvolvimento"><a href="http://www.sysnetwork.com.br" target="_blank" class="desenv">Desenvolvido por <b>Sysnetwork</b></a></div>
</body>
</html>