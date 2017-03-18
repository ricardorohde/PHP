<?
	include "protege.php";
	$erro = $_GET['erro'];

	$sql = "SELECT * FROM configuracoes LIMIT 0,1";
	$rs = mysql_query($sql);
	$conf = mysql_fetch_array($rs);
?>
<form action="scr_alt_conf.php" method="post" enctype="multipart/form-data" name="form">
<table width="598" height="243" border="0" align="left" cellpadding="0" cellspacing="0" class="noticia">
  <tr>
    <td width="598" height="30" valign="top" bgcolor="#EEEEEE" class="bordaBaixo">
			<div class="topicos">Configura&ccedil;&otilde;es&nbsp;</div></td>
  </tr>
  <tr>
    <td height="190" align="left" valign="top" class="bordaDireita"><table width="595" height="221" border="0" align="left">
 		<tr>
			<td height="19" align="left" valign="middle" class="titOutros">&nbsp;&nbsp;EMAIL DE CONTATO </td>
			</tr>
		<tr class="texNoticia">
		  <td height="21" align="left" valign="top"><div align="justify">&nbsp;
		    <input name="email" type="text" class="cx_texto" id="email" value="<? echo $conf['conf_contato']; ?>" size="60" />
		  </div></td>
    	</tr>
		<tr>
		  <td height="19" align="left" valign="middle"><span class="titOutros">&nbsp;&nbsp;Banner dO topo do site </span></td>
		  </tr>
		<tr class="texNoticia">
		  <td height="26" align="left" valign="middle">
				<div align="justify">&nbsp; 
				  <input name="banner_topo" type="file" id="banner_topo" />
				(<a href="<? echo $conf['conf_banner_topo'] ?>" target="_blank" title="Visualizar..."><? echo $conf['conf_banner_topo'] ?></a>)</div>			</td>
		  </tr>
		<tr>
		  <td height="19" align="left" valign="middle"><span class="titOutros">&nbsp;&nbsp;BANNER DA LATERAL DO SITE </span></td>
		  </tr>
		<tr class="texNoticia">
		  <td height="19" align="center" valign="middle"><div align="justify">&nbsp;				  
		    <input name="banner_lateral" type="file" id="banner_lateral" />
		    (<a href="<? echo $conf['conf_banner_lateral'] ?>" target="_blank" title="Visualizar..."><? echo $conf['conf_banner_lateral'] ?></a>)
		  </div></td>
		  </tr>
		<tr class="texNoticia">
		  <td height="19" align="left" valign="middle"><span class="titOutros">&nbsp;&nbsp;M&Aacute;XIMO DE ITENS NO FEED RSS (<a href="http://pt.wikipedia.org/wiki/RSS" target="_blank">?</a>) </span></td>
		  </tr>
		<tr class="texNoticia">
		  <td height="19" align="left" valign="middle">&nbsp;
        <input name="max_rss" type="text" class="cx_texto" id="max_rss" value="<? echo $conf['conf_num_itens_rss']; ?>" size="5" />
(0 - 99) 
		<? 
			if($erro == 1){
				echo "<font color='#CC0000'>";
				echo "<-- Este valor deve estar entre 0 e 99.";
				echo "</font>";
			}
		?>		 </td>
		  </tr>
		<tr class="texNoticia">
		  <td height="19" align="left" valign="middle">* Se os campos estiverem vazios, ser&atilde;o mantidos os valores atuais. </td>
		  </tr>
		<tr class="texNoticia">
		  <td height="19" align="left" valign="middle">* Link para ftp <a class="links" href="ftp://ftpcasamusical@ftp.casamusical.com.br">ftp://ftpcasamusical@ftp.casamusical.com.br</a></td>
		  </tr>
	  </table>		</td>		
  </tr>  
	<tr>
		<td height="23" align="center"><input name="Button" type="button" class="btn" value="Enviar" onclick="javascript:vConf();"/></td>
	</tr>  
</table>
</form>

