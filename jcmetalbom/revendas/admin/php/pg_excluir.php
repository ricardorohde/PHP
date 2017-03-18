<?
include('protege.php');
include('mysqlconecta.php');

$sqlSeleciona = "SELECT * FROM TB_REPRESENTANTES ORDER BY REP_ESTADO ASC, REP_CIDADE ASC, REP_NOME ASC";
$exeSeleciona = mysql_query($sqlSeleciona) or die(mysql_error());
$ttl = mysql_num_rows($exeSeleciona);

$controleUF = 0;
while($row = mysql_fetch_array($exeSeleciona)){
	//$cod = $row[''];
	$cod = $row['REP_ID'];
	$nome = $row['REP_NOME'];
	$cidade = $row['REP_CIDADE'];
	$estado = $row['REP_ESTADO'];
	
	$exibicao = "(".$cidade.") ".$nome;
	
	$atualUF = $estado;
	
	if($atualUF!=$ultimoUF){
		if($controleUF==0){
			$listaRepres .= "<optgroup id='$estado' label='$estado'>";
		}
		else{
			$listaRepres .= "</optgroup><optgroup id='$estado' label='$estado'>";
		}
	}
	
	$listaRepres .= "
      <option value='$cod'>$exibicao</option>";
	  
	$ultimoUF = $estado;
	$controleUF++;
}
$listaRepres .= "</optgroup>";
?>
<link href="../js_css/estilos.css" rel="stylesheet" type="text/css">
<form name="formExcluir" id="formExcluir" method="post" action="" style="padding-top:50px; padding-bottom:50px;">
<table width="80%" border="0" cellspacing="1" cellpadding="0" bgcolor="#CCCCCC">
  <tr>
    <td width="30%" id="optMenuAdm" bgcolor="#FFFFFF" align="right">Escolha uma Representa&ccedil;&atilde;o:</td>
    <td width="70%" id="optMenuAdm" bgcolor="#FFFFFF"><select name="cmpRepres" class="BoxHome" id="cmpRepres">
	<option value='vazio' selected="true">Selecione uma Representa&ccedil;&atilde;o</option><?=$listaRepres?>
      </select></td>
  </tr>
  <tr>
    <td colspan="2" align="right" bgcolor="#FFFFFF" id="optMenuAdm"><input name="excluir" type="button" class="ButHome" id="excluir" value="Excluir" onClick="javascript:verifExclusao();">      &nbsp;&nbsp;&nbsp;&nbsp;</td>
	</tr>
</table>
</form>
