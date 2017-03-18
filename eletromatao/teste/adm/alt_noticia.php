<?
	include "protege.php";
	$cod = $_GET['cod'];
	$sql = "SELECT * FROM noticias WHERE not_codigo = $cod LIMIT 0,1";
	$rs = mysql_query($sql);
	$not = mysql_fetch_array($rs);
?>
<form action="scr_noticias.php?op=alterar&cod=<? echo $cod; ?>" method="post" enctype="multipart/form-data" name="form">
<table width="598" height="193" border="0" align="left" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF" class="noticia">
  <tr>
    <td width="598" height="30" valign="top" bgcolor="#EEEEEE" class="bordaBaixo">
			Editar not&iacute;cia &nbsp;</td>
  </tr>
  <tr>
    <td height="139" align="left" valign="top" class="bordaDireita"><table width="592" height="203" border="0" align="left">
 		<tr>
 		  <td width="413" height="19" align="left" valign="middle" class="titOutros">&nbsp;&nbsp;T&Iacute;TULO da noti&Iacute;CIA</td>			
			</tr>
		<tr>
		  <td height="19" align="left" valign="top"><span class="titOutros">&nbsp;&nbsp;
          <input name="titulo" type="text" class="cx_texto" id="titulo" value="<? echo $not['not_titulo']; ?>" size="75" />
		  </span></td>
		  </tr>
		<tr>
		  <td height="19" align="left" valign="middle"><span class="titOutros">&nbsp;&nbsp;PRIMEIRO PAR&Aacute;GRAFO</span></td>
		  </tr>
		<tr>
		  <td height="19" align="left" valign="middle" class="texNoticia">&nbsp;&nbsp;
          <span class="titOutros">
          <textarea name="primeiro" cols="50" rows="7" class="area" id="primeiro"><? echo $not['not_primeiro_paragrafo']; ?></textarea>
          <br />
          </span>&nbsp;&nbsp;  (Este trecho ir&aacute; aparecer na p&aacute;gina principal e servir&aacute; de descri&ccedil;&atilde;o para o feed RSS [<a href="http://pt.wikipedia.org/wiki/RSS" target="_blank">?</a>])</td>
		  </tr>
		
		<tr>
		  <td height="19" align="left" valign="middle"><span class="titOutros">&nbsp;&nbsp;TEXTO COMPLETO</span></td>
		  </tr>
		<tr>
		  <td height="22" align="left" valign="middle"><span class="titOutros">&nbsp;&nbsp;</span>			<span class="titOutros">
		    <textarea name="texto" cols="50" rows="7" class="area" id="texto"><? echo $not['not_texto']; ?></textarea>
		    <br />
		  &nbsp;&nbsp; </span><span class="texNoticia">* N&atilde;o remova as marca&ccedil;&otilde;es &lt;br&gt;.</span></td>
	 </tr>
		<tr>
		  <td height="22" align="left" valign="middle"><span class="titOutros">&nbsp;&nbsp;IMAGEM </span></td>
		  </tr>
		<tr>
		  <td height="22" align="left" valign="middle"><span class="titOutros">&nbsp;&nbsp;</span> <span class="titOutros"> </span>
		    <input name="imagem" type="file" id="imagem" />
		    (<a title="Visualizar..." class="links" href="../noticias/<? echo $not['not_codigo']; ?>/<? echo $not['not_img']?>" ><? echo $not['not_img'] ?></a>)<br />
		    <span class="texNoticia"><span class="titOutros">&nbsp;&nbsp;</span> <span class="titOutros"> </span> (Tamanho fixo de 168 x 124 em formato .jpg)		    </span></td>
		  </tr>
		<tr>
		  <td height="22" align="left" valign="middle"><span class="texNoticia">&nbsp;&nbsp;&nbsp;** Campos Vazios n&atilde;o ser&atilde;o alterados. </span></td>
		  </tr>
	  </table>		</td>		
  </tr>  
	<tr>
		<td height="24" align="center"><input name="Button" type="submit" class="btn" value="Alterar"/></td>
	</tr>
</table>
</form>