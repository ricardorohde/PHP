<?
	include "protege.php";
	$cod = $_GET['cod'];
	$sql = "SELECT * FROM produtos WHERE pro_codigo = $cod LIMIT 0,1";
	$rs = mysql_query($sql);
	$pro = mysql_fetch_array($rs);
?>
<form action="scr_produtos?op=alterar&cod=<? echo $cod; ?>" method="post" enctype="multipart/form-data" name="form">
<input type="hidden" name="cImg" value="<? echo $pro['pro_img']; ?>" />
<table width="594" height="147" border="0" align="left" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF" class="noticia">
  <tr>
    <td width="594" height="30" valign="top" bgcolor="#EEEEEE" class="bordaBaixo">
			<div class="topicos">Editar produto &nbsp;</div></td>
  </tr>
  <tr>
    <td height="93" align="left" valign="top" class="bordaDireita"><table width="592" height="496" border="0" align="left">
 		<tr>
 		  <td height="19" colspan="2" align="left" valign="middle" class="titOutros">&nbsp;&nbsp;NOME DO PRODUTO * </td>			
			</tr>
		<tr>
		  <td height="21" colspan="2" align="left" valign="top"><span class="titOutros">&nbsp;&nbsp;
          <input name="nome" type="text" class="cx_texto" id="nome" value="<? echo $pro['pro_nome']; ?>" size="50" />
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
							$codCat = $cat['cat_codigo'];
							$nome = $cat['cat_nome'];
							$sql = "SELECT cat_codigo,cat_nome FROM categorias WHERE cat_mae = $codCat";
							$rs2 = mysql_query($sql);
							if(mysql_num_rows($rs2) > 0){
								echo "<optgroup label='$nome'>";
								while($catF = mysql_fetch_array($rs2)){
					?>								
				<option id="<? echo $catF['cat_codigo']; ?>" value="<? echo $catF['cat_codigo']; ?>"><? echo $catF['cat_nome']; ?></option>
					<?
								} // Fecha o While $catF
							echo "</optgroup>";
							}else{
					?>
						<option id="<? echo $cat['cat_codigo']; ?>" value="<? echo $cat['cat_codigo']; ?>"><? echo $cat['cat_nome']; ?></option>
					<?					
							}
						}
					?>
		    </select>
				<script>
					document.getElementById("<? echo $pro['cat_codigo']; ?>").selected = true;
				</script>
		  </span></td>
		  </tr>
		<tr>
		  <td height="19" colspan="2" align="left" valign="middle" class="texNoticia"><span class="titOutros">&nbsp;&nbsp;Pre&ccedil;o</span></td>
		  </tr>
		<tr>
		  <td height="19" colspan="2" align="left" valign="middle" class="texNoticia"><span class="titOutros">&nbsp;&nbsp;

		    <input name="preco" type="text" class="cx_texto" id="preco" value="<? echo $pro['pro_preco']; ?>" size="10" />
		  </span></td>
		  </tr>
		
		<tr>
		  <td height="19" colspan="2" align="left" valign="middle" class="texNoticia"><span class="titOutros">&nbsp;&nbsp;Lan&Ccedil;amento</span></td>
		  </tr>
		<tr>
		  <td height="19" colspan="2" align="left" valign="middle" class="texNoticia">&nbsp;&nbsp;
        <? 
					if($pro['pro_lancamento'] == 'S'){
						$checked = "checked='checked'";
					}
				?>
        <input name="lancamento" <? echo $checked; ?> type="checkbox" id="lancamento" value="checkbox" /></td>
		  </tr>
		<tr>
		  <td height="19" colspan="2" align="left" valign="middle" class="texNoticia"><span class="titOutros">&nbsp;&nbsp;DESCRI&Ccedil;&Atilde;O</span></td>
		  </tr>
		<tr>
		  <td height="22" colspan="2" align="left" valign="middle" class="texNoticia">&nbsp;&nbsp; <textarea name="descricao" cols="40" rows="3" class="area" id="descricao"><? echo $pro['pro_descricao']; ?></textarea></td>
		  </tr>
		
		<tr>
		  <td height="19" colspan="2" align="left" valign="middle" class="texNoticia"><span class="titOutros">&nbsp;&nbsp;ESPECIFICA&Ccedil;&Otilde;ES</span></td>
		  </tr>
		<tr>
		  <td height="19" colspan="2" align="left" valign="middle" class="texNoticia">&nbsp;&nbsp;
        <textarea name="especificacao" cols="40" rows="3" class="area" id="especificacao"><? echo str_replace("<br>",chr(13),$pro['pro_especificacoes']); ?></textarea></td>
		  </tr>
		<tr>
		  <td height="19" colspan="2" align="left" valign="middle" class="texNoticia"><span class="titOutros">&nbsp;&nbsp;escolha de uma a tr&Ecirc;S imagens para este produto**</span></td>
		  </tr>
		<tr>
		  <th height="22" align="center" valign="middle" class="texNoticia">PEQUENAS (84 x 62 - FIXO) </th>
		  <th align="center" valign="middle" class="texNoticia">GRANDES (500 x 500 - M&Aacute;XIMO)</th>
		  </tr>
		<tr>
		  <td width="291" height="22" align="left" valign="middle" class="texNoticia">&nbsp;&nbsp;
		    <input name="img1_p" type="file" id="img1_p" onchange="(this.value == '') ? (document.getElementById('img2_p').disabled = true) : (document.getElementById('img2_p').disabled = false);" /></td>
		  <td width="291" align="left" valign="middle" class="texNoticia">&nbsp;&nbsp;
<input name="img1_g" type="file" id="img1_g" onchange="(this.value == '') ? (document.getElementById('img2_g').disabled = true) : (document.getElementById('img2_g').disabled = false);" /></td>
		</tr>
		<?
			$imgs = explode(';',$pro['pro_img']);
		?>
		<tr>
		  <td height="22" align="left" valign="middle" class="texNoticia">
				&nbsp;&nbsp;				
				(<a href="../produtos/pequenas/<? if($imgs[0] != ''){ echo $cod."_".$imgs[0];}	?>"><? if($imgs[0] != ''){ echo $cod."_".$imgs[0];}	?></a>)			</td>
		  <td height="22" align="left" valign="middle" class="texNoticia">
				&nbsp;&nbsp;
				(<a href="../produtos/grandes/<? if($imgs[0] != ''){ echo $cod."_".$imgs[0];}	?>"><? if($imgs[0] != ''){ echo $cod."_".$imgs[0];}	?></a>)			</td>				
		  </tr>
		<tr>
		  <td height="22" align="left" valign="middle" class="texNoticia">&nbsp;&nbsp;
		    <input name="img2_p" type="file" id="img2_p" /></td>
		  <td height="22" align="left" valign="middle" class="texNoticia">&nbsp;&nbsp;
<input name="img2_g" type="file" id="img2_g" /></td>
		</tr>
		<tr>
		  <td height="22" align="left" valign="middle" class="texNoticia">&nbsp;&nbsp;				
				(<a href="../produtos/pequenas/<? if($imgs[1] != ''){ echo $cod."_".$imgs[1];}	?>"><? if($imgs[1] != ''){ echo $cod."_".$imgs[1];}	?></a>) </td>
		  <td height="22" align="left" valign="middle" class="texNoticia">&nbsp;&nbsp;
				(<a href="../produtos/grandes/<? if($imgs[1] != ''){ echo $cod."_".$imgs[1];}	?>"><? if($imgs[1] != ''){ echo $cod."_".$imgs[1];}	?></a>) </td>
		  </tr>
		<tr>
		  <td height="22" align="left" valign="middle" class="texNoticia">&nbsp;&nbsp;
		    <input  name="img3_p" type="file" id="img3_p" /></td>
		  <td height="22" align="left" valign="middle" class="texNoticia">&nbsp;&nbsp;
<input name="img3_g" type="file" id="img3_g" /></td>
		</tr>
		<tr>
		  <td height="19" align="left" valign="middle" class="texNoticia">&nbsp;&nbsp;				
				(<a href="../produtos/pequenas/<? if($imgs[2] != ''){ echo $cod."_".$imgs[2];}	?>"><? if($imgs[2] != ''){ echo $cod."_".$imgs[2];}	?></a>) </td>
		  <td height="19" align="left" valign="middle" class="texNoticia">&nbsp;&nbsp;
				(<a href="../produtos/grandes/<? if($imgs[2] != ''){ echo $cod."_".$imgs[2];}	?>"><? if($imgs[2] != ''){ echo $cod."_".$imgs[2];}	?></a>) </td>
		</tr>
		<tr>
		  <td height="19" colspan="2" align="left" valign="middle" class="texNoticia"><strong>&nbsp;&nbsp; * Campos obrigat&oacute;rios </strong></td>
		  </tr>
		<tr>
		  <td height="19" colspan="2" align="left" valign="middle" class="texNoticia"><strong>&nbsp;&nbsp; ** Deixe em branco caso n&atilde;o for alterar</strong> </td>
		  </tr>
		
	  </table>		</td>		
  </tr>  
	<tr>
		<td height="24" align="center"><input name="Button" type="submit" class="btn" value="Enviar"/></td>
	</tr>
</table>
</form>