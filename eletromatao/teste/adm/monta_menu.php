<?
	include "protege.php";
	$erro = $_GET['erro'];

	$sql = "SELECT * FROM configuracoes LIMIT 0,1";
	$rs = mysql_query($sql);
	$conf = mysql_fetch_array($rs);
?>
<form action="scr_menus.php?op=salvar" method="post" name="form">
<table width="598" height="193" border="0" align="left" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF" class="noticia">
  <tr>
    <td width="598" height="30" valign="top" bgcolor="#EEEEEE" class="bordaBaixo">
			<div class="topicos">Montagem do Menu (Apresenta&ccedil;&atilde;o de Produtos)&nbsp;</div></td>
  </tr>
  <tr>
    <td height="139" align="left" valign="top" class="bordaDireita"><table width="592" height="137" border="0" align="left">
 		<tr>
 		  <td width="413" height="19" align="left" valign="middle" class="titOutros">&nbsp;&nbsp;R&Oacute;TULO DO ITEM</td>			
			</tr>
		<tr>
		  <td height="19" align="left" valign="top"><span class="titOutros">&nbsp;&nbsp;
          <input name="rotulo" type="text" class="cx_texto" id="rotulo" />
      </span></td>
		  </tr>
		<tr>
		  <td height="19" align="left" valign="middle"><span class="titOutros">&nbsp;&nbsp;SUB-ITEM DE</span></td>
		  </tr>
		<tr>
		  <td height="19" align="left" valign="middle"><span class="texNoticia">&nbsp;&nbsp;
          <select name="mestre" class="combo" id="mestre">
						<option value="NULL" selected="selected">Nulo</option>
						<?
							$sql = "SELECT men_codigo,men_nome FROM menu WHERE men_pai IS NULL";
							$rs = mysql_query($sql);
							while($men = mysql_fetch_array($rs)){
						?>
								<option value="<? echo $men['men_codigo']; ?>"><? echo $men['men_nome']; ?></option>
						<?
							}
						?>
          </select> 
          (caso n&atilde;o tenha, mantenha o valor &quot;<strong>Nulo</strong>&quot; selecionado)</span></td>
		  </tr>
		
		
		<tr>
		  <td height="19" align="left" valign="middle"><span class="titOutros">&nbsp;&nbsp;CATEGORIA DE REFER&Ecirc;NCIA</span></td>
		  </tr>
		<tr>
		  <td height="22" align="left" valign="middle"><span class="titOutros">&nbsp;&nbsp; </span> 
				<select name="categoria" class="combo" id="categoria">
					<?
						$sql = "SELECT * FROM categorias ORDER BY cat_codigo";
						$rs = mysql_query($sql);
						while($cat = mysql_fetch_array($rs)){
							$cod = $cat['cat_codigo'];
							if($cat['cat_mae'] == ''){
								$sql = "SELECT cat_codigo,cat_nome FROM categorias WHERE cat_mae = $cod";
								$rs2 = mysql_query($sql);
								if(mysql_num_rows($rs2) > 0){
									echo "<option value='".$cat['cat_codigo']."'>".$cat['cat_nome']."</option>";
									while($filhas = mysql_fetch_array($rs2)){
										echo "<option value='".$filhas['cat_codigo']."'>".$filhas['cat_nome']."</option>";
									}
								}else{
									echo "<option value='".$cat['cat_codigo']."'>".$cat['cat_nome']."</option>";
								}								
							}
						}
					?>
			  </select>			</td>
	 </tr>
	  </table>		</td>		
  </tr>  
	<tr>
		<td height="24" align="center"><input name="Submit" type="submit" class="btn" value="Enviar"/>
&nbsp;
<input name="Button2" type="button" class="btn" value="Visualizar" onclick="javascript:janela('pre_menu.php',180,500);"/>
&nbsp;
<input name="Button22" type="button" class="btn" value="Ordenar" onclick="javascript:janela('ordena_menu.php',500,600);"/></td>
	</tr>
</table>
</form>