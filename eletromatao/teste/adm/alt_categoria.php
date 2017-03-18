<?
	include "protege.php";
	$cod = $_GET['cod'];
	$sql = "SELECT cat_nome,cat_mae FROM categorias WHERE cat_codigo = $cod";
	$rs = mysql_query($sql);
?>
<form action="scr_categorias?op=alterar&cod=<? echo $cod; ?>" method="post" enctype="multipart/form-data" name="form">
<table width="598" height="147" border="0" align="left" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF" class="noticia">
  <tr>
    <td width="598" height="30" valign="top" bgcolor="#EEEEEE" class="bordaBaixo">
			Editar categoria  &nbsp;</td>
  </tr>
  <tr>
    <td height="93" align="left" valign="top" class="bordaDireita"><table width="592" height="153" border="0" align="left">
 		<tr>
 		  <td width="413" height="19" align="left" valign="middle" class="titOutros">&nbsp;&nbsp;NOME DA CATEGORIA </td>			
			</tr>
		<tr>
		  <td height="21" align="left" valign="top"><span class="titOutros">&nbsp;&nbsp;
          <input name="nome" type="text" class="cx_texto" id="nome" value="<? echo mysql_result($rs,0,0);  ?>" size="50" />
		  </span></td>
		  </tr>
		<tr>
		  <td height="19" align="left" valign="middle"><span class="titOutros">&nbsp;&nbsp;subcategoria de</span></td>
		  </tr>
		<tr>
		  <td height="22" align="left" valign="middle" class="texNoticia"><span class="texNoticia">&nbsp;&nbsp; 
		    <select name="mae" class="combo" id="mae">
					<option id="NULL" value="NULL">Nulo</option>
					<?
						$sql = "SELECT cat_codigo,cat_nome FROM categorias WHERE cat_mae IS NULL";
						$rs2 = mysql_query($sql);
						while($cat = mysql_fetch_array($rs2)){
					?>
						<option id="<? echo $cat['cat_codigo']; ?>" value="<? echo $cat['cat_codigo']; ?>"><? echo $cat['cat_nome']; ?></option>
					<?
						}
					?>
		    </select>
				<script>
					id = "<? echo mysql_result($rs,0,1);?>";
					if(id == ''){
						id = "NULL";
					}
					document.getElementById(id).selected = true;
				</script>
		  (caso n&atilde;o tenha, mantenha o valor &quot;<strong>Nulo</strong>&quot; selecionado)</span></td>
		  </tr>
		<tr>
		  <td height="21" align="left" valign="middle" class="texNoticia"><span class="titOutros">&nbsp;&nbsp;TABELA DE PRE&Ccedil;OS </span></td>
		  </tr>
		<tr>
		  <td height="22" align="left" valign="middle" class="texNoticia">&nbsp;&nbsp;
        <input name="tabela" type="file" id="tabela" /></td>
		  </tr>
		
	  </table>		</td>		
  </tr>  
	<tr>
		<td height="24" align="center"><input name="Button" type="button" class="btn" value="Enviar" onclick="javascript:if(document.form.nome.value != ''){document.form.submit();}else{alert(' - Digite o nome');}"/></td>
	</tr>
</table>
</form>