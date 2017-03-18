<?
	$ft = explode("/",$_GET['foto']);
	$ft = $ft[count($ft) - 4]."/".$ft[count($ft) - 3]."/".$ft[count($ft) - 2]."/".$ft[count($ft) - 1];
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
<link href="../css_js/estilos.css" rel="stylesheet" type="text/css" />
<script src="../css_js/ajax.js"></script>
<script src="../css_js/scr.js"></script>
<script>
var xml = '';
function envia(formulario){
	document.getElementById('resposta').innerHTML = 'Enviando...';
	ajaxProcess(formulario,resultado);
}

function resultado(){
	if(isAjax()){			
		var text = requestObject.responseText;
		if (text.indexOf("<") != -1){
			try{
				xml = requestObject.responseXML;
			}catch(e){
				try{
					xml = requestObject.responseXmL;
				}catch(e){
					alert("Browser não suporta ajax.");
				}
			}
			resposta = xml.getElementsByTagName("resposta")[0].firstChild.data;
			document.getElementById('resposta').innerHTML = resposta;
		}else{
			document.getElementById('resposta').innerHTML = "Erro inesperado, tente novamente!";
		}
	}
}

</script>
</head>
<body>
<form action="scr_envia_foto.php" method="post" name="form">
<input type="hidden" name="foto" value="<? echo $ft;?>" />
<table width="449" height="117" border="0">
  <tr>
    <td width="443" height="21" align="center" class="titOutros">Enviar imagem </td>
  </tr>
  <tr>
    <td height="21" align="center"><img width="443" height="327" src="<?	echo $_GET['foto']; ?>" /></td>
    </tr>
  <tr>
    <td height="21" align="center"><table width="443" border="0">
      <tr>
        <td width="154" height="21" align="right" class="texNoticia">Seu Nome:&nbsp;&nbsp;</td>
        <td width="279"><input name="nome_de" type="text" class="cx_texto" id="nome_de" size="45" /></td>
      </tr>
      <tr>
        <td height="21" align="right" class="texNoticia">Seu Email:&nbsp;&nbsp; </td>
        <td><input name="email_de" type="text" class="cx_texto" id="email_de" size="45" /></td>
      </tr>
      <tr>
        <td height="21" align="right" class="texNoticia">Nome do destinat&aacute;rio:&nbsp;&nbsp; </td>
        <td><input name="nome_para" type="text" class="cx_texto" id="nome_para" size="45" /></td>
      </tr>
      <tr>
        <td height="21" align="right" class="texNoticia">Email do destinat&aacute;rio:&nbsp;&nbsp; </td>
        <td><input name="email_para" type="text" class="cx_texto" id="email_para" size="45" /></td>
      </tr>      
    </table></td>
  </tr>
  <tr>
    <td height="21" align="center"><input name="Submit" type="button" class="btn" value="Enviar" onclick="envia(document.form);" /></td>
    </tr>
  <tr>
    <td height="21" align="center">
			<div align="center" id="resposta" class="saudacao"></div>
		</td>
  </tr>
</table>
</form>
</body>
</html>