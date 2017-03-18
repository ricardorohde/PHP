<?
include('mysqlconecta.php');

$id = $_GET['id'];

$sqlRepres = "SELECT * FROM TB_REPRESENTANTES WHERE REP_ID = $id";
$exeRepres = mysql_query($sqlRepres);

$nome 	  = mysql_result($exeRepres,0,1);
$endereco = mysql_result($exeRepres,0,2);
$bairro   = mysql_result($exeRepres,0,3);
$cidade   = mysql_result($exeRepres,0,4);
$estado   = mysql_result($exeRepres,0,5);
$cep	  = mysql_result($exeRepres,0,6);
$fone	  = mysql_result($exeRepres,0,7);
$email	  = mysql_result($exeRepres,0,8);
$site	  = mysql_result($exeRepres,0,9);
$imagem   = mysql_result($exeRepres,0,10);

// MONTANDO OS DETALHES DA PRIMEIRA REPRESENTAÇÃO
$dadosRepres = "
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
			</div>";

echo utf8_encode($dadosRepres);

?>
