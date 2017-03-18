<?
	include "protege.php";
?>
<form action="index.php?id=20" method="post" enctype="multipart/form-data" name="form">
<table width="598" height="193" border="0" align="left" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF" class="noticia">
  <tr>
    <td width="598" height="30" valign="top" bgcolor="#EEEEEE" class="bordaBaixo">
			<div class="topicos">Inserir not&iacute;cia &nbsp;</div></td>
  </tr>
  <tr>
    <td height="139" align="left" valign="top" class="bordaDireita"><table width="592" height="179" border="0" align="left">
 		<tr>
 		  <td width="413" height="19" align="left" valign="middle" class="titOutros">&nbsp;&nbsp;T&Iacute;TULO da noti&Iacute;CIA</td>			
			</tr>
		<tr>
		  <td height="19" align="left" valign="top"><span class="titOutros">&nbsp;&nbsp;
          <input name="titulo" type="text" class="cx_texto" id="titulo" size="75" />
		  </span></td>
		  </tr>
		<tr>
		  <td height="19" align="left" valign="middle"><span class="titOutros">&nbsp;&nbsp;PRIMEIRO PAR&Aacute;GRAFO</span></td>
		  </tr>
		<tr>
		  <td height="19" align="left" valign="middle" class="texNoticia">&nbsp;&nbsp;
          <span class="titOutros">
          <textarea name="primeiro" cols="50" rows="7" wrap="physical" class="area" id="primeiro"></textarea>
          <br />
          </span>&nbsp;&nbsp;  (Este trecho ir&aacute; aparecer na p&aacute;gina principal e servir&aacute; de descri&ccedil;&atilde;o para o feed RSS [<a href="http://pt.wikipedia.org/wiki/RSS" target="_blank">?</a>])</td>
		  </tr>
		
		<tr>
		  <td height="19" align="left" valign="middle"><span class="titOutros">&nbsp;&nbsp;TEXTO COMPLETO</span></td>
		  </tr>
		<tr>
		  <td height="22" align="left" valign="middle"><span class="titOutros">&nbsp;&nbsp;</span>			<span class="titOutros">
		    <textarea name="texto" cols="50" rows="7" wrap="physical" class="area" id="texto"></textarea>
		    <br />
		  &nbsp;&nbsp; </span><span class="texNoticia">* Utilize 2 &quot;Enters&quot; para separar os par&aacute;grafos que comp&otilde;e a not&iacute;cia. </span></td>
	 </tr>
		<tr>
		  <td height="22" align="left" valign="middle"><span class="titOutros">&nbsp;&nbsp;IMAGEM </span></td>
		  </tr>
		<tr>
		  <td height="22" align="left" valign="middle"><span class="titOutros">&nbsp;&nbsp;</span> <span class="titOutros"> </span>
		    <input name="imagem" type="file" id="imagem" />
		    <span class="texNoticia">(Tamanho fixo de 168 x 124 em formato .jpg ou .png)</span></td>
		  </tr>
	  </table>		</td>		
  </tr>  
	<tr>
		<td height="24" align="center"><input name="Button" type="button" class="btn" value="Enviar" onclick="javascript:vNoticia();"/>
&nbsp;
<input name="Button2" type="submit" class="btn" value="Visualizar"/></td>
	</tr>
</table>
</form>