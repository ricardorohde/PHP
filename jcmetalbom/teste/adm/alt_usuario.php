<?
	include "protege.php";
	$login = base64_decode($_GET['login']);
	$sql = "SELECT * FROM usuarios WHERE usu_login = '$login'";
	$rs = mysql_query($sql);
	$usr = mysql_fetch_array($rs);
?>
<form action="scr_usuarios?op=alterar&login=<? echo $_GET['login']; ?>" method="post" enctype="multipart/form-data" name="form">
<table width="594" height="147" border="0" align="left" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF" class="noticia">
  <tr>
    <td width="594" height="30" valign="top" bgcolor="#EEEEEE" class="bordaBaixo">
			<div class="topicos">Editar usu&aacute;rio &nbsp;</div></td>
  </tr>
  <tr>
    <td height="93" align="left" valign="top" class="bordaDireita"><table width="592" height="134" border="0" align="left">
 		<tr class="titOutros">
 		  <td width="413" height="19" align="left" valign="middle" class="titOutros">&nbsp;&nbsp;LOGIN</td>			
			</tr>
		<tr>
		  <td height="21" align="left" valign="top"><span class="titOutros">&nbsp;&nbsp;
		    <input name="login" type="text" class="cx_texto" id="login" value="<? echo $usr['usu_login']; ?>" size="30" maxlength="15" />
		  </span></td>
		  </tr>
		<tr class="titOutros">
		  <td height="19" align="left" valign="middle"><span class="titOutros">&nbsp;&nbsp;SENHA</span></td>
		  </tr>
		<tr>
		  <td height="21" align="left" valign="middle" class="texNoticia"><span class="titOutros">&nbsp;&nbsp;

		    <input name="senha" type="text" class="cx_texto" id="senha" value="<? echo base64_decode($usr['usu_senha']); ?>" size="30" />
		  </span></td>
		  </tr>
		<tr>
		  <td height="19" align="left" valign="middle" class="texNoticia"><span class="titOutros">&nbsp;&nbsp;NOME</span></td>
		  </tr>
		<tr>
		  <td height="21" align="left" valign="middle" class="texNoticia"><span class="titOutros">&nbsp;&nbsp;
          <input name="nome" type="text" class="cx_texto" id="nome" value="<? echo $usr['usu_nome']; ?>" size="50" />
      </span></td>
		  </tr>
		
	  </table>		</td>		
  </tr>  
	<tr>
		<td height="24" align="center"><input name="Button" type="button" class="btn" value="Enviar" onclick="javascript:vUsuario();"/></td>
	</tr>
</table>
</form>