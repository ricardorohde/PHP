<?
include('mysqlconecta.php');

$ufURL = urldecode($_GET['uf']);
$uf = $_GET['uf'];
$hora=time();

$sqlCidade = "SELECT DISTINCT REP_CIDADE FROM TB_REPRESENTANTES WHERE REP_ESTADO = '$uf' AND REP_ATIVO = 'S' ORDER BY REP_CIDADE ASC";
$exeCidade = mysql_query($sqlCidade);
$rowCidade = mysql_num_rows($exeCidade);

if($rowCidade>0){
	$listaCidade = "
		 <span class=\"txtTahoma11pxBrancoBold\">&nbsp;
		 <br />
		 LOCALIZE A REVENDA MAIS PR&Oacute;XIMA DE VOC&Ecirc;<br />
		 <br />
		 &nbsp;<br />&nbsp;
		 <br />
		 Selecione no mapa o estado e abaixo as cidades:<br />
		 <br />
            </span><select name='cmpCidade' class='BoxHome' id='cmpCidade' onchange=\"javascript:if(this.value=='vazio'){alert('- Escolha uma Cidade Válida.'); document.getElementById('divMeioRepres').style.display='none'; document.getElementById('avisoInicial').style.display='block';}else{incluiPagina('scr_lista_representacoes.php?uf=$ufURL&cdd='+this.value+'&tm=$hora#iniRepres', 'divMeioRepres'); document.getElementById('divMeioRepres').style.display='block'; document.getElementById('avisoInicial').style.display='none';}\">
				<option value='vazio'>Selecione uma Cidade</option>";
	
	while($rowCidade=mysql_fetch_array($exeCidade)){
		$cidadeAtual = $rowCidade['REP_CIDADE'];
		$cidadeAtualURL = urlencode($cidadeAtual);
		
		$listaCidade .= "
				<option value='$cidadeAtualURL'>$cidadeAtual</option>";
	}
	$listaCidade .= "</select>&nbsp;
		 <br />&nbsp;
		 <br />&nbsp;
		 <br />&nbsp;
		 <br />&nbsp;
		 <br />
		 &nbsp;<span class=\"txtTahoma11pxBranco\">As Informa&ccedil;&otilde;es constantes nesse cadastro foram fornecidas<br />
		 pelas pr&oacute;prias revendas atrav&eacute;s de suas compras</span>";
}
		 

else{
	$listaCidade="
	     <span class=\"txtTahoma11pxBrancoBold\">&nbsp;
		 <br />
		 LOCALIZE A REVENDA MAIS PR&Oacute;XIMA DE VOC&Ecirc;<br />
		 <br />
		 &nbsp;<br />&nbsp;
		 <br />
		 Selecione no mapa o estado e abaixo as cidades:<br />
		 <br />
            </span>
                <select name=\"cmpCidade\" class=\"BoxHome\" id=\"cmpCidade\">
			<option value=\"vazio\">Lista de Cidades Vazia</option>
		 </select>
		 &nbsp;
		 <br />&nbsp;
		 <br />&nbsp;
		 <br />&nbsp;
		 <br />&nbsp;
		 <br />
		 &nbsp;<span class=\"txtTahoma11pxBranco\">As Informa&ccedil;&otilde;es constantes nesse cadastro foram fornecidas<br />
		 pelas pr&oacute;prias revendas atrav&eacute;s de suas compras</span>";
}

echo utf8_encode($listaCidade);
?>