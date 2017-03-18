<?
	// ARQUIVO QUE IRÁ ORGANIZAR AS NOTÍCIAS EM UM XML PARA QUE APAREÇA NO QUADRO DE ÚLTIMAS NOTÍCIAS
	
	include "mysqlconecta.php";	
	header("Content-type: text/xml");
	
	$sql = "SELECT not_codigo,not_titulo,not_primeiro_paragrafo,not_img,not_data FROM noticias ORDER BY not_data DESC,not_hora DESC LIMIT 0,5";
	$rs = mysql_query($sql);
	
	$topo = "<ultimas>";
	$corpo = '';
	
	while($noticias = mysql_fetch_array($rs)){
	
		$cod = $noticias['not_codigo'];
		$tit = $noticias['not_titulo'];
		if(strlen($tit) > 20){
			$tit = substr($tit,0,20)."...";
		}
		$pri = $noticias['not_primeiro_paragrafo'];
		if(strlen($pri) > 180){
			$pri = substr($pri,0,180)."...";
		}
		$img = $noticias['not_img'];
		$dat = explode("-",$noticias['not_data']);
		$dat = $dat[2]."/".$dat[1]."/".$dat[0];
	
		$corpo .= "<noticia>
						 		<cod>".$cod."</cod>
								<titulo>".$tit."</titulo>
								<texto>".$pri."</texto>
								<foto>../noticias/".$cod."/".$img."</foto>
								<data>".$dat."</data>
							 </noticia>";
	}
	
	$rodape = "</ultimas>";
	
	$xml = $topo.$corpo.$rodape;
	
	echo utf8_encode($xml);

?>