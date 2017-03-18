<?
	// Gera feed RSS para a sessão notícias
	
//	include "../../php/mysqlconecta.php";
		
	$sql = "SELECT conf_num_itens_rss FROM configuracoes LIMIT 0,1";
	$rs = mysql_query($sql);
	$limite = mysql_result($rs,0,0);
	
	$topo = "<?xml version='1.0' encoding='iso-8859-1'?>";
	
	$cabecalho = "<rss version='2.0'>
	              	<channel>
										<title>Casa Musical - Notícias</title>
										<link>http://www.casamusical.com.br/</link><!-- ALTERAR PARA A URL DA CASA MUSICAL -->
										<description>Casa Musical</description>
										<language>pt-br</language>";
										
	$sql = "SELECT not_titulo,not_codigo,not_primeiro_paragrafo FROM noticias ORDER BY not_data DESC,not_hora DESC LIMIT 0,$limite";
	$rs = mysql_query($sql);
	
	$corpo = '';
	
	while($not = mysql_fetch_array($rs)){

		$corpo .= "<item>
		           	 <title>".$not['not_titulo']."</title>
								 <link>http://www.casamusical.com.br/php/index.php?id=1&amp;cod=".$not['not_codigo']."</link>
								 <description>".$not['not_primeiro_paragrafo']."</description>
							 </item>";		
	}
	
	$rodape = "</channel>
	           </rss>";
						 
	$xml = $topo.$cabecalho.$corpo.$rodape;
			
	$fp = fopen("../rss/news.xml","w");
	fwrite($fp,$xml);
	fclose($fp);
	chmod("../rss/news.xml",0666);									
?>