<?
	include "mysqlconecta.php";
	$sql = "SELECT * FROM menu ORDER BY men_ordem";
	$rs = mysql_query($sql);
	while($cat = mysql_fetch_array($rs)){
		$cod = $cat['men_codigo'];
		if($cat['men_pai'] == ''){
			$sql2 = "SELECT men_codigo,men_nome,men_ordem FROM menu WHERE men_pai = $cod ORDER BY men_ordem";
			$rs2 = mysql_query($sql2);
			if(mysql_num_rows($rs2) > 0){
				echo "GRUPO: ".$cat['men_nome']."<BR>";
				while($filhas = mysql_fetch_array($rs2)){
					echo "  *  ".$filhas['men_nome']."<BR>";
				}
				echo "FIM"."<BR>";
			}								
		}else{									
			echo $cat['men_nome']."<BR>";
		}
	}
?>
