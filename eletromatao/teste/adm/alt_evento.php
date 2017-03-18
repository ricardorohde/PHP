<?
	include "protege.php";
	$cod = $_GET['cod'];
	$sql = "SELECT * FROM eventos WHERE eve_codigo = $cod";
	$rs = mysql_query($sql);
	$eve = mysql_fetch_array($rs);
?>
<form action="scr_eventos?op=alterar&cod=<? echo $eve['eve_codigo']; ?>" method="post" enctype="multipart/form-data" name="form">
<table width="598" height="193" border="0" align="left" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF" class="noticia">
  <tr>
    <td width="598" height="30" valign="top" bgcolor="#EEEEEE" class="bordaBaixo">
			<div class="topicos">Editar evento &nbsp;</div></td>
  </tr>
  <tr>
    <td height="139" align="left" valign="top" class="bordaDireita"><table width="592" height="212" border="0" align="left">
 		<tr>
 		  <td width="413" height="19" align="left" valign="middle" class="titOutros">&nbsp;&nbsp;T&Iacute;TULO dO evento </td>			
			</tr>
		<tr>
		  <td height="19" align="left" valign="top"><span class="titOutros">&nbsp;&nbsp;
          <input name="titulo" type="text" class="cx_texto" id="titulo" value="<? echo $eve['eve_titulo']; ?>" size="75" />
		  </span></td>
		  </tr>
		<tr>
		  <td height="19" align="left" valign="middle"><span class="titOutros">&nbsp;&nbsp;descri&Ccedil;&Atilde;O do evento </span></td>
		  </tr>
		<tr>
		  <td height="55" align="left" valign="middle" class="texNoticia">&nbsp;&nbsp;
          <span class="titOutros">
          <textarea name="descricao" cols="35" rows="3" wrap="physical" class="area" id="descricao"><? echo $eve['eve_descricao']; ?></textarea>
          </span></td>
		  </tr>
		
		<tr>
		  <td height="19" align="left" valign="middle" class="titOutros"><span class="titOutros">&nbsp;&nbsp;total de fotos </span></td>
		  </tr>
		<tr>
		  <td height="21" align="left" valign="middle"><span class="texNoticia">&nbsp;&nbsp; <span class="titOutros"> </span></span>
		    <input name="total" type="text" class="cx_texto" id="total" value="<? echo $eve['eve_total_fotos']; ?>" size="6" /></td>
		  </tr>
		<tr>
		  <td height="19" align="left" valign="middle"><span class="titOutros">&nbsp;&nbsp;data</span></td>
		  </tr>
		<tr>
		  <td height="21" align="left" valign="middle"><span class="texNoticia">&nbsp;&nbsp;
		    <?
					 $data = explode("-",$eve['eve_data']);
					 $data = $data[2] ."/". $data[1] ."/". $data[0];
				?> 
		    <span class="titOutros"> </span></span>
		    <input name="data" type="text" class="cx_texto" id="data" value="<? echo $data; ?>" /> 
		    (dd/mm/aaaa) </td>
		  </tr>					
	  </table>		</td>		
  </tr>  
	<tr>
		<td height="24" align="center">
		<input name="Button" type="button" class="btn" value="Enviar" onclick="javascript:vEvento();"/></td>
	</tr>
</table>
</form>