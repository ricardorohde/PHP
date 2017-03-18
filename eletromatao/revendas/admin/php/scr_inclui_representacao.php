<?
include('protege.php');
include('mysqlconecta.php');

$nome = $_POST['cmpNome'];
$endereco = $_POST['cmpEndereco'];
$bairro = $_POST['cmpBairro'];
$cidade = $_POST['cmpCidade'];
$estado = $_POST['cmpEstado'];
$fone = $_POST['cmpFone'];
$email = $_POST['cmpEmail'];
$site = $_POST['cmpSite'];
$nomeImg = $_POST['cmpNomeImg'];
$cep = $_POST['cmpCEP'];

$sqlIncluir = "INSERT INTO TB_REPRESENTANTES VALUES (0, '$nome', '$endereco', '$bairro', '$cidade', '$estado', '$cep', '$fone', '$email', '$site', '$nomeImg', 'S')"; //echo $sqlIncluir;
$exeIncluir = mysql_query($sqlIncluir);
$total = mysql_affected_rows();

if($total == 1){
	echo "<script language='javascript'>alert ('Inclusão Feita com Sucesso!'); location='index.php?id=0';</script>";
}
else{
	echo "<script language='javascript'>alert ('Problemas na Inclusão. Tente Novamente Mais Tarde!'); location='index.php?id=0';</script>";
}/**/

?>