<?
	include "protege.php";
?>

<form action="scr_produtos?op=salvar" method="post" enctype="multipart/form-data" name="form">
<table width="594" height="147" border="0" align="left" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF" class="noticia">
  <tr>
    <td width="594" height="30" valign="top" bgcolor="#EEEEEE" class="bordaBaixo">
			<div class="topicos">Inserir produto &nbsp;</div></td>
  </tr>
  <tr>
    <td height="93" align="left" valign="top" class="bordaDireita"><table width="592" height="485" border="0" align="left">
 		<tr>
 		  <td height="19" colspan="2" align="left" valign="middle" class="titOutros">&nbsp;&nbsp;NOME DO PRODUTO * </td>			
			</tr>
		<tr>
		  <td height="21" colspan="2" align="left" valign="top"><span class="titOutros">&nbsp;&nbsp;
          <input name="nome" type="text" class="cx_texto" id="nome" size="50" />
		  </span></td>
		  </tr>
		<tr>
		  <td height="19" colspan="2" align="left" valign="middle"><span class="titOutros">&nbsp;&nbsp;CATEGORIA DO PRODUTO * </span></td>
		  </tr>
		<tr>
		  <td height="22" colspan="2" align="left" valign="middle" class="texNoticia"><span class="texNoticia">&nbsp;&nbsp; 
		    <select name="categoria" class="combo" id="categoria">		      
					<?
						$sql = "SELECT cat_codigo,cat_nome FROM categorias WHERE cat_mae IS NULL";
						$rs = mysql_query($sql);
						while($cat = mysql_fetch_array($rs)){
							$cod = $cat['cat_codigo'];
							$nome = $cat['cat_nome'];
							$sql = "SELECT cat_codigo,cat_nome FROM categorias WHERE cat_mae = $cod";
							$rs2 = mysql_query($sql);
							if(mysql_num_rows($rs2) > 0){
								echo "<optgroup label='$nome'>";
								while($catF = mysql_fetch_array($rs2)){
					?>								
									<option value="<? echo $catF['cat_codigo']; ?>"><? echo $catF['cat_nome']; ?></option>
					<?
								} // Fecha o While $catF
							echo "</optgroup>";
							}else{
					?>
						<option value="<? echo $cat['cat_codigo']; ?>"><? echo $cat['cat_nome']; ?></option>
					<?					
							}
						}
					?>
		    </select>
		  </span></td>
		  </tr>
		<tr>
		  <td height="19" colspan="2" align="left" valign="middle" class="texNoticia"><span class="titOutros">&nbsp;&nbsp;Pre&ccedil;o</span></td>
		  </tr>
		<tr>
		  <td height="19" colspan="2" align="left" valign="middle" class="texNoticia"><span class="titOutros">
		    &nbsp;&nbsp;
<input name="preco" type="text" class="cx_texto" id="preco" size="10" />
		  </span></td>
		  </tr>
		
		<tr>
		  <td height="19" colspan="2" align="left" valign="middle" class="texNoticia"><span class="titOutros">&nbsp;&nbsp;lan&Ccedil;amento</span></td>
		  </tr>
		<tr>
		  <td height="19" colspan="2" align="left" valign="middle" class="texNoticia">&nbsp;&nbsp;
        <input name="lancamento" type="checkbox" id="lancamento" value="checkbox" /></td>
		  </tr>
		<tr>
		  <td height="19" colspan="2" align="left" valign="middle" class="texNoticia"><span class="titOutros">&nbsp;&nbsp;DESCRI&Ccedil;&Atilde;O</span></td>
		  </tr>
		<tr>
		  <td height="22" colspan="2" align="left" valign="middle" class="texNoticia">&nbsp;&nbsp; <textarea name="descricao" cols="40" rows="3" class="area" id="descricao"></textarea></td>
		  </tr>
		<tr>
		  <td height="19" colspan="2" align="left" valign="middle" class="texNoticia"><span class="titOutros">&nbsp;&nbsp;ESPECIFICA&Ccedil;&Otilde;ES</span></td>
		  </tr>
		<tr>
		  <td height="22" colspan="2" align="left" valign="middle" class="texNoticia">&nbsp;&nbsp; <textarea name="especificacao" cols="40" rows="3" class="area" id="especificacao"></textarea>
		    <br />
		    &nbsp;&nbsp; Utilize para detalhes sobre o produto. </td>
		  </tr>
		<tr>
		  <td height="19" colspan="2" align="left" valign="middle" class="texNoticia"><span class="titOutros">&nbsp;&nbsp;escolha de uma a tr&Ecirc;S imagens para este produto</span></td>
		  </tr>
		<tr>
		  <th height="22" align="center" valign="middle" class="texNoticia">PEQUENAS (84 x 62 - FIXO) </th>
		  <th align="center" valign="middle" class="texNoticia">GRANDES (500 x 500 - M&Aacute;XIMO)</th>
		  </tr>
		<tr>
		  <td width="288" height="22" align="left" valign="middle" class="texNoticia">&nbsp;&nbsp;
		    <input name="img1_p" type="file" id="img1_p" onchange="(this.value == '') ? (document.getElementById('img2_p').disabled = true) : (document.getElementById('img2_p').disabled = false);" /></td>
		  <td width="294" align="left" valign="middle" class="texNoticia">&nbsp;&nbsp;
<input name="img1_g" type="file" id="img1_g" onchange="(this.value == '') ? (document.getElementById('img2_g').disabled = true) : (document.getElementById('img2_g').disabled = false);" /></td>
		</tr>
		<tr>
		  <td height="22" align="left" valign="middle" class="texNoticia">&nbsp;&nbsp;
		    <input disabled="disabled" name="img2_p" type="file" id="img2_p" onchange="(this.value == '') ? (document.getElementById('img3_p').disabled = true) : (document.getElementById('img3_p').disabled = false);" /></td>
		  <td height="22" align="left" valign="middle" class="texNoticia">&nbsp;&nbsp;
<input disabled="disabled" name="img2_g" type="file" id="img2_g" onchange="(this.value == '') ? (document.getElementById('img3_g').disabled = true) : (document.getElementById('img3_g').disabled = false);" /></td>
		</tr>
		<tr>
		  <td height="22" align="left" valign="middle" class="texNoticia">&nbsp;&nbsp;
		    <input disabled="disabled" name="img3_p" type="file" id="img3_p" /></td>
		  <td height="22" align="left" valign="middle" class="texNoticia">&nbsp;&nbsp;
<input disabled="disabled" name="img3_g" type="file" id="img3_g"  /></td>
		</tr>
		<tr>
		  <td height="19" colspan="2" align="left" valign="middle" class="texNoticia"><strong>&nbsp;&nbsp; * Campos obrigat&oacute;rios </strong></td>
		  </tr>
		
	  </table>		</td>		
  </tr>  
	<tr>
		<td height="24" align="center"><input name="Button" type="button" class="btn" value="Enviar" onclick="vProduto();"/></td>
	</tr>
</table>
</form>