<?
	$cod = $_GET['cod'];
	$sql = "SELECT not_titulo,not_data,not_texto,not_img,not_codigo FROM noticias WHERE not_codigo = $cod LIMIT 0,1";
	$not = mysql_query($sql);
	if(mysql_num_rows($not) > 0){
?>

<table width="445" height="212" border="0" align="center" class="noticia">
  <tr>
    <td height="21" align="center" valign="top" class="titOutros"><? echo mysql_result($not,0,0); ?></td>
  </tr>
  <tr>
    <td height="15" align="center" valign="middle" class="bordaBaixo"><img src="../img/linha_grande.png" width="450" height="3" /></td>
  </tr>
  <tr>
    <td height="122" valign="top" class="borda_baixo" align="left">
		<img style="padding-right:5px;padding-bottom:5px;" src="../noticias/<? echo mysql_result($not,0,4); ?>/<? echo mysql_result($not,0,3); ?>" align="left" width="168" height="124" />
		<span class="texNoticia"><div align="justify">
		<? echo mysql_result($not,0,2); ?></div></span></td>
  </tr>    
  <tr>
    <td height="17" align="right" valign="top" class="borda_baixo"><div class="datNoticia">Enviada em <? echo mysql_result($not,0,1); ?></div></td>
  </tr>
  <tr>
    <td height="17" align="right" valign="top"><a href="index.php?id=2">Mais not&iacute;cias </a>&nbsp;</td>
  </tr>
</table>
<?
	}else{  // Fim do IF, começo do else
		echo "Notícia não encontrada!<br><a href='javascript:history.back();' class='links'>Voltar</a>";
	}
?>