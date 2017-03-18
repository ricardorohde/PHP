<?
	include "protege.php";
	$texto = str_replace(chr(13),'<br>',$_POST['texto']);;
?>

<table width="445" height="212" border="0" align="center" class="noticia">
  <tr>
    <td height="21" align="center" valign="top" class="titOutros"><? echo $_POST['titulo']; ?></td>
  </tr>
  <tr>
    <td height="15" align="center" valign="middle" class="bordaBaixo"><img src="../img/linha_grande.png" width="450" height="3" /></td>
  </tr>
  <tr>
    <td height="122" valign="top" class="borda_baixo" align="justify">
		<img style="padding-right:5px;padding-bottom:5px;" src="../noticias/<? echo mysql_result($not,0,4); ?>/<? echo mysql_result($not,0,3); ?>" align="left" />
		<span class="texNoticia">
		<? echo $texto; ?></span></td>
  </tr>    
  <tr>
    <td height="17" align="right" valign="top" class="borda_baixo"><div class="datNoticia">Enviada em <? echo date('d/m/Y'); ?></div></td>
  </tr>
  <tr>
    <td height="17" align="right" valign="top"><a href="javascript:history.back();">Voltar</a>&nbsp;<a href="history.back();">&nbsp;</a></td>
  </tr>
</table>