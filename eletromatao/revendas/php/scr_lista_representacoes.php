<?
include('mysqlconecta.php');

$ufURL = $_GET['uf'];
$uf = urldecode($ufURL);

$cddURL = $_GET['cdd'];
$cdd = urldecode($cddURL);

// INICIANDO A FORMAÇÃO DA TABELA QUE EXIBIRÁ AS REPRESENTAÇÕES FILTRADAS PELO ESTADO E PELA CIDADE
$tabelaRepres = "
		<table width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\">
          <tr>
            <td width=\"35%\" align=\"center\" valign=\"top\" style=\"padding-left:3px; padding-right:3px;\"><div id=\"divListaRepres\" align=\"center\">";

$sqlNomes = "SELECT REP_ID, REP_NOME FROM TB_REPRESENTANTES WHERE REP_ESTADO = '$uf' AND REP_CIDADE = '$cdd' AND REP_ATIVO = 'S' ORDER BY REP_NOME ASC";
$exeNomes = mysql_query($sqlNomes);

// CONTEÚDO DO "MENU" QUE LISTA AS REPRESENTAÇÕES PELO NOME
$divisor = "<div id='separaOpcoes' style='height:3px;'></div>";
$idColor=1;

$opcoesRepres=$divisor;
while($rowNomes=mysql_fetch_array($exeNomes)){
	(($idColor%2)==0)?($cor = "E4E4E4"):($cor = "EEEEEE");
	$idColor++;
	
	if(strlen($rowNomes['REP_NOME'])>30)
		$nomeRepres = substr($rowNomes['REP_NOME'],0,26)."...";
	else
		$nomeRepres = $rowNomes['REP_NOME'];
	
	$idRepres = $rowNomes['REP_ID'];
	if($primeiroID == "")
		$primeiroID = $rowNomes['REP_ID'];
	
	$opcoesRepres .= "<div id='opcaoRepres' class='opcaoRepres' style='background-color:#$cor;' onclick=\"javascript:incluiPagina('scr_detalha_representacao.php?id=$idRepres&tm=$hora', 'divGeralRepres');\" heigth='30' title='".$rowNomes['REP_NOME']."'>$nomeRepres</div>".$divisor;
}

$tabelaRepres .= $opcoesRepres."</div></td>
            <td width=\"65%\" align=\"center\" valign=\"middle\" style=\"border:1px #000099 solid; padding:3px;\"><div id=\"divGeralRepres\">";
			
// CONTEÚDO "GERAL" DA PRIMEIRA OPÇÃO LISTATA DO MENU
$sqlPrimeiro = "SELECT * FROM TB_REPRESENTANTES WHERE REP_ID = $primeiroID";
$exePrimeiro = mysql_query($sqlPrimeiro);
$nome 	  = mysql_result($exePrimeiro,0,1);
$endereco = mysql_result($exePrimeiro,0,2);
$bairro   = mysql_result($exePrimeiro,0,3);
$cidade   = mysql_result($exePrimeiro,0,4);
$estado   = mysql_result($exePrimeiro,0,5);
$cep	  = mysql_result($exePrimeiro,0,6);
$fone	  = mysql_result($exePrimeiro,0,7);
$email	  = mysql_result($exePrimeiro,0,8);
$site	  = mysql_result($exePrimeiro,0,9);
$imagem   = mysql_result($exePrimeiro,0,10);
$imagem   = $imagem.".jpg";

// MONTANDO OS DETALHES DA PRIMEIRA REPRESENTAÇÃO
$tabelaRepres .= "
              <div id=\"divImgFachada\"><img src=\"../fachadas/$imagem\" /></div>
              <div class=\"txtTahoma12pxPretoBold\" id=\"divNomeRepres\" style=\"padding:5px;\">$nome</div>
			  <div id=\"divDivisorDetalhes\" style=\"height:1px; background-color:#999999\"><!----></div>
			  <div class=\"txtTahoma12pxPreto\" id=\"divEnderecoRepres\" style=\"padding:3px;\">$endereco</div>
			  <div id=\"divDivisorDetalhes\" style=\"height:1px; background-color:#999999\"><!----></div>
			  <div class=\"txtTahoma12pxPreto\" id=\"divBairroRepres\" style=\"padding:3px;\">$bairro - $cidade - $estado - $cep</div>
			  <div id=\"divDivisorDetalhes\" style=\"height:1px; background-color:#999999\"><!----></div>
			  <div class=\"txtTahoma12pxPreto\" id=\"divFoneRepres\" style=\"padding:3px;\">$fone - $email</div>
			  <div id=\"divDivisorDetalhes\" style=\"height:1px; background-color:#999999\"><!----></div>
			  <div class=\"txtTahoma12pxPreto\" id=\"divSiteRepres\" style=\"padding:3px;\"><a href='$site' target='_blank' class=\"txtTahoma12pxPreto\">$site</a></div>
			</div></td>
          </tr>
        </table>";

echo utf8_encode($tabelaRepres);
?>