<?
include('protege.php');
include('mysqlconecta.php');

$repres = $_POST['cmpRepres'];

$sqlExcluir = "DELETE FROM TB_REPRESENTANTES WHERE REP_ID = $repres";
$exeExcluir = mysql_query($sqlExcluir);
$total = mysql_affected_rows();

if($total == 1){
	echo "<script language='javascript'>alert ('Exclusão Feita com Sucesso!'); location='index.php?id=1';</script>";
}
else{
	echo "<script language='javascript'>alert ('Problemas na Exclusão. Tente Novamente Mais Tarde!'); location='index.php?id=1';</script>";
}/**/

?>
