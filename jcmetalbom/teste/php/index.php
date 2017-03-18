<?
	include "mysqlconecta.php";

	$sqlConf = "SELECT conf_banner_topo,conf_banner_lateral FROM configuracoes";
	$rsConf = mysql_query($sqlConf);		
	
	$pagina = array("inicial.php", // ---------------------------------------------------> ID = 0 {FIXO NO MENU HOME}
	                "ler_noticia.php", // -----------------------------------------------> ID = 1 
									"ver_noticias.php", // ----------------------------------------------> ID = 2 
									"empresa.php", // ---------------------------------------------------> ID = 3 {FIXO NO MENU EMPRESA}
									"contato.php", // ---------------------------------------------------> ID = 4 {FIXO NO MENU CONTATO}
									"lista_produtos.php", // --------------------------------------------> ID = 5 
									"ver_galerias.php", // ----------------------------------------------> ID = 6
									"galeria.php", // ---------------------------------------------------> ID = 7
									"ver_eventos.php", // -----------------------------------------------> ID = 8
									"evento.php", // ----------------------------------------------------> ID = 9
									"lancamentos.php", // -----------------------------------------------> ID = 10
									"ver_produto.php", // -----------------------------------------------> ID = 11
									"ver_galerias_2.php", // --------------------------------------------> ID = 12
									"ver_eventos_2.php" // ----------------------------------------------> ID = 13
									);	
	
	$id = $_GET['id'];
	if($id == ''){
		$id = 0;
	}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>::: Casa Musical :::</title>
<script src="../Scripts/AC_RunActiveContent.js" type="text/javascript"></script>
<script src="../css_js/scr.js" type="text/javascript"></script>
<script src="../css_js/ajax.js" type="text/javascript"></script>
<!--<link rel="alternate" type="application/rss+xml" title="Casa Musical - Notícias" href="../rss/news.xml">-->
<link rel="alternate" type="application/atom+xml" title="Casa Musical - Notícias" href="../rss/news.xml">
<link href="../css_js/estilos.css" rel="stylesheet" type="text/css" />
</head>

<body>
<table width="764" border="0" align="center" cellpadding="1">
  
  <tr>
    <td width="760" height="517" valign="top" bgcolor="#000000"><table width="760" border="0" cellpadding="0" cellspacing="0">
      <tr>
        <td colspan="5" align="center" valign="top" bgcolor="#FFFFFF" class="saudacao"><script type="text/javascript">
AC_FL_RunContent( 'codebase','http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=7,0,19,0','width','760','height','100','src','<? echo mysql_result($rsConf,0,0); ?>','quality','high','pluginspage','http://www.macromedia.com/go/getflashplayer','movie','../flash/b2' ); //end AC code
</script><noscript><object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=7,0,19,0" width="760" height="100">
          <param name="movie" value="<? echo mysql_result($rsConf,0,0); ?>" />
          <param name="quality" value="high" />
          <embed src="<? echo mysql_result($rsConf,0,0); ?>" quality="high" pluginspage="http://www.macromedia.com/go/getflashplayer" type="application/x-shockwave-flash" width="760" height="100"></embed>
        </object></noscript></td>
      </tr>
      <tr>
        <td colspan="5" align="center" valign="top" bgcolor="#FFFFFF" class="saudacao">
					<? 
						include_once "inc/meses.php";
					
						/*$hora = date("H");
						
						if(($hora >= 0) && ($hora < '12')){
							$tempo = "Bom dia";
						}elseif(($hora >= 12) && ($hora < 18)){
							$tempo = "Boa tarde";
						}else{
							$tempo = "Boa noite";
						}*/
												
						$dia = date("d");
						$mes = date("m");
						$ano = date("Y");
						$mes = nomeMesCompleto($mes);
						
						$saudacao = "Matão, ".$dia." de ".$mes." de ".$ano.".";
						echo $saudacao;
					?>				</td>
        </tr>
      <tr>
        <td height="5" colspan="5" align="center" valign="top" bgcolor="#FFFFFF"><img src="../img/linha_grande.png" width="750" height="3" /></td>
        </tr>
      <tr>
        <td width="162" height="490" valign="top" bgcolor="#FFFFFF" class="borda_padrao">
				<br />
				<ul class="item">
          <li class="topo"><a href="index.php?id=0">Home</a></li>
          <li><a href="index.php?id=3">Empresa</a></li>
          <?
						$sqlMenu = "SELECT men_codigo,men_nome,cat_codigo FROM menu WHERE men_pai IS NULL ORDER BY men_ordem";
						$rsMenu = mysql_query($sqlMenu);
						
						while($itens = mysql_fetch_array($rsMenu)){
							$rotulo = $itens['men_nome'];
							$cat = $itens['cat_codigo'];
							$cod = $itens['men_codigo'];
							
							$sqlSubMenu = "SELECT men_nome,cat_codigo FROM menu WHERE men_pai = ".$cod." ORDER BY men_ordem";
							$rsSubMenu = mysql_query($sqlSubMenu);
							$linhas = mysql_num_rows($rsSubMenu);
							
							if($linhas == 0){
					?>
								<li><a href="index.php?id=5&cat=<? echo $cat; ?>"><? echo $rotulo; ?></a> </li>
					<?
							}else{    // Fecha o if($linhas == 0) e abre o else
					?>							
								<li><a href="javascript:alternaDiv('sub_<? echo $cod; ?>')"><? echo $rotulo; ?></a> </li>							
									<div id="sub_<? echo $cod; ?>" style="display:none">
										<ul class="sub_item">
					<?									
											while($subItem = mysql_fetch_array($rsSubMenu)){
												$subRotulo = $subItem['men_nome'];
												$subCat = $subItem['cat_codigo'];
												$subCod = $subItem['men_codigo'];
					?>	
												<li><a href="index.php?id=5&cat=<? echo $subCat; ?>"><? echo $subRotulo; ?></a> </li>
					<?
											} // Fecha o while do subItem
					?>
										</ul>
									</div>
					<?						
							} // Fecha o else de if($linhas == 0)
					?>
					<? 
						} // Fecha o while do menu
					?>
          <li><a href="index.php?id=4">Contato</a></li>
        </ul></td>
        <td width="3" valign="top" bgcolor="#FFFFFF" class="borda_padrao"><img src="../img/linhaV_grande.png" width="3" height="486" /></td>
        <td width="460" height="490" align="center" valign="top" bgcolor="#FFFFFF">
					<? 
						include $pagina[$id];
					?></td>
        <td width="3" valign="top" bgcolor="#FFFFFF"><img src="../img/linhaV_grande.png" width="3" height="486" /></td>
        <td width="132" align="center" valign="top" bgcolor="#FFFFFF">
				<?
					$banner = mysql_result($rsConf,0,1);
					$array = explode(".",$banner);
					$ext = $array[count($array) - 1];
					if($ext == "swf"){ // VERIFICA SE O BANNER É FLASH OU NÃO
				?>
					<script type="text/javascript">
AC_FL_RunContent( 'codebase','http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=7,0,19,0','width','760','height','100','src','<? echo $banner; ?>','quality','high','pluginspage','http://www.macromedia.com/go/getflashplayer','movie','../flash/b2' ); //end AC code
</script><noscript><object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=7,0,19,0" width="760" height="100">
          <param name="movie" value="<? echo $banner; ?>" />
          <param name="quality" value="high" />
          <embed src="<? echo $banner; ?>" quality="high" pluginspage="http://www.macromedia.com/go/getflashplayer" type="application/x-shockwave-flash" width="760" height="100"></embed>
        </object></noscript>
				<?
					}else{
				?>
						<img src="<? echo $banner; ?>" width="128" height="486" />
				<?
					}
				?>
				</td>
      </tr>            
    </table></td>
  </tr>
</table>
<div align="center"><a href="http://www.sysnetwork.com.br" class="links">Desenvolvido por SySNetwork</a> </div>
</body>
</html>