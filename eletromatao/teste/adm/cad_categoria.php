<?
	include "protege.php";
?>
<form action="scr_categorias?op=salvar" method="post" enctype="multipart/form-data" name="form">
<table width="594" height="147" border="0" align="left" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF" class="noticia">
  <tr>
    <td width="594" height="30" valign="top" bgcolor="#EEEEEE" class="bordaBaixo">
			<div class="topicos">Inserir categoria &nbsp;</div></td>
  </tr>
  <tr>
    <td height="93" align="left" valign="top" class="bordaDireita"><table width="592" height="153" border="0" align="left">
 		<tr>
 		  <td width="413" height="19" align="left" valign="middle" class="titOutros">&nbsp;&nbsp;NOME DA CATEGORIA </td>			
			</tr>
		<tr>
		  <td height="21" align="left" valign="top"><span class="titOutros">&nbsp;&nbsp;
          <input name="nome" type="text" class="cx_texto" id="nome" size="50" />
		  </span></td>
		  </tr>
		<tr>
		  <td height="19" align="left" valign="middle"><span class="titOutros">&nbsp;&nbsp;subcategoria de</span></td>
		  </tr>
		<tr>
		  <td height="22" align="left" valign="middle" class="texNoticia"><span class="texNoticia">&nbsp;&nbsp; 
		    <select name="mae" class="combo" id="mae">
					<option value="NULL">Nulo</option>
					<?
						$sql = "SELECT cat_codigo,cat_nome FROM categorias WHERE cat_mae IS NULL";
						$rs = mysql_query($sql);
						while($cat = mysql_fetch_array($rs)){
					?>
						<option value="<? echo $cat['cat_codigo']; ?>"><? echo $cat['cat_nome']; ?></option>
					<?
						}
					?>
		    </select>
		  (caso n&atilde;o tenha, mantenha o valor &quot;<strong>Nulo</strong>&quot; selecionado)</span></td>
		  </tr>
		<tr>
		  <td height="21" align="left" valign="middle" class="texNoticia"><span class="titOutros">&nbsp;&nbsp;TABELA DE PRE&Ccedil;OS  </span></td>
		  </tr>
		<tr>
		  <td height="26" align="left" valign="middle" class="texNoticia">&nbsp;&nbsp; <input name="tabela" type="file" id="tabela"  /></td>
		  </tr>
		
	  </table>		</td>		
  </tr>  
	<tr>
		<td height="24" align="center"><input name="Button" type="button" class="btn" value="Enviar" onclick="javascript:if(document.form.nome.value != ''){document.form.submit();}else{alert(' - Digite o nome');}"/></td>
	</tr>
</table>
</form>