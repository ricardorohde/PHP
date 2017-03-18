<script>
var xml;
var ultimoID;
var indice = 0;
var url = "ultimas.php"; // só será usada esta na página

function ultimas(){
	document.getElementById("nFoto").innerHTML = "<img src='../fontes/img/testes/carregando.gif' />";
  removeTodos(document.getElementById(ultimoID));
	processaUrl(url, mostra);
}

function proxima(){
	indice++;
	mostra();
}

function anterior(){
	indice--;
	mostra();
}

function mostra(){
	
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
			
			var atual = xml.getElementsByTagName("noticia");
			
			if(indice == atual.length){
				indice = 0;
			}else{
				if(indice < 0){
					indice = atual.length - 1;
				}
			}									
			
			var titulo = atual[indice].getElementsByTagName("titulo")[0].firstChild.data;
			var img = atual[indice].getElementsByTagName("foto")[0].firstChild.data;
			var data = atual[indice].getElementsByTagName("data")[0].firstChild.data;
			var texto = atual[indice].getElementsByTagName("texto")[0].firstChild.data;
			var codigo = atual[indice].getElementsByTagName("cod")[0].firstChild.data;
			
			document.getElementById("nTitulo").innerHTML = titulo;
			document.getElementById("nFoto").innerHTML = "<img width='168' height='124' src='" + img + "' />";
			document.getElementById("nData").innerHTML = "Enviada em " + data;
			document.getElementById("nParagrafo").innerHTML = "<a href=index.php?id=1&cod=" + codigo + ">" + texto + "</a>";
				
		}else{
			alert("Ocorreu um problema. Por favor repita a operação.");
		}
	}
}

window.onload = ultimas;

</script>
<table width="460" height="110" border="0" align="center" cellpadding="0" cellspacing="0" class="noticia">
  <tr class="bordaBaixo">
    <td height="21" colspan="2" valign="top" bgcolor="#EEEEEE" class="bordaBaixo"><div class="topicos">&Uacute;ltimas Not&iacute;cias&nbsp;</div></td>
  </tr>
  <tr>
    <td width="179" height="124" rowspan="3" valign="middle">
		<div id='nFoto'></div>		</td>
    <td width="281" height="21" valign="middle" class="borda_baixo">
		<div class="titNoticia" id='nTitulo'></div>		</td>
  </tr>
  <tr>
    <td height="19" valign="top" class="borda_baixo">
		<div style="padding-right:5px;" align="justify" class="texNoticia" id='nParagrafo'></div>		</td>
  </tr>
  <tr>
    <td height="19" valign="middle" class="borda_baixo">
		<div class="datNoticia" id='nData'></div>		</td>
  </tr>
  <tr class="bordaBaixo">
    <td height="19" valign="middle"><a href="javascript:anterior();">&nbsp;&nbsp;&lt; Anterior</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="javascript:proxima();">Pr&oacute;xima &gt;</a></td>
    <td height="19" align="right" valign="middle"><a href="index.php?id=2">Mais</a>&nbsp;</td>
  </tr>
</table>
<table width="460" height="106" border="0" align="center" cellpadding="0" cellspacing="2" class="noticia">
  <tr>
		<?
			// Lista a última galeria postada
			$sqlGaleria = "SELECT gal_titulo,gal_descricao,gal_codigo FROM galeria ORDER BY gal_data DESC LIMIT 0,1";
			$rsGaleria = mysql_query($sqlGaleria) or die(mysql_error());
			$titGaleria = mysql_result($rsGaleria,0,0);
			$desGaleria = mysql_result($rsGaleria,0,1);
			if(strlen($titGaleria) > 12){
				$titGaleria = substr($titGaleria,0,12)."...";
			}
			if(strlen($desGaleria) > 47){
				$desGaleria = substr($desGaleria,0,47)."...";
			}
		?>
    <td height="22" colspan="2" valign="middle" bgcolor="#EEEEEE" class="borda_baixo"><div class="topicos">
      <div align="left">&nbsp;&nbsp;Galeria</div>
    </div></td>
		<?
			// Seleciona um lançamento		
		?>
    <td height="22" colspan="2" valign="middle" bgcolor="#EEEEEE" class="borda_baixo"><div class="topicos">
      <div align="left">&nbsp;&nbsp;Lan&ccedil;amentos</div>
    </div></td>
  </tr>
  
  <tr>
    <td width="84" height="65" rowspan="2" valign="top"><img src="../imagens/galerias/<? echo mysql_result($rsGaleria,0,2); ?>/pequenas/1.jpg" width="84" height="62" /></td>
    <td width="156" height="20" valign="top" class="borda_baixo">
			<span class="titOutros">
				<? echo $titGaleria; ?>			</span>		</td>
		<?
			$sqlLanc = "SELECT pro_nome,pro_img,pro_descricao,pro_codigo FROM produtos WHERE pro_lancamento = 'S' ORDER BY RAND() LIMIT 0,1";
			$rsLanc = mysql_query($sqlLanc) or die(mysql_error());
			$cod = mysql_result($rsLanc,0,3);
			$img = explode(';',mysql_result($rsLanc,0,1));
			$tot = count($img);
		 	$img = $img[rand(0,$tot - 1)];
			$nomProd = mysql_result($rsLanc,0,0);
			$desProd = mysql_result($rsLanc,0,2);
			if(strlen($nomProd) > 12){
				$nomProd = substr($nomProd,0,12)."...";
			}
			if(strlen($desProd) > 47){
				$desProd = substr($desProd,0,47)."...";
			}
		?>
    <td width="85" height="65" rowspan="2" valign="top">
			<span class="foto">
				<img src="../produtos/pequenas/<? echo $cod."_".$img; ?>" width="84" height="62" />			</span>		</td>
    <td width="145" valign="top" class="borda_baixo">
			<span class="titOutros">
				<? echo $nomProd; ?>			</span>		</td>
  </tr>
  <tr>
    <td height="18" align="left" valign="middle" class="borda_baixo">
			<span class="noticia">
				<a href="index.php?id=6">
					<? echo $desGaleria; ?>				</a>			</span>		</td>
    <td height="18" align="left" valign="middle" class="borda_baixo">
			<span class="noticia">
				<a href="index.php?id=11&cod=<? echo $cod; ?>">
					<? echo $desProd; ?>				</a>			</span>		</td>
  </tr>
  
  
  <tr>
    <td height="22" colspan="2" align="right" valign="middle" class="bordaDireita"><a href="index.php?id=12">Outras galerias</a> &nbsp;</td>
    <td height="22" colspan="2" align="right" valign="middle"><a href="?id=10">Mais Lan&ccedil;amentos</a><a href="?id=10"></a> <a href="?id=10"></a> &nbsp;</td>
  </tr>
</table>
<table width="460" height="119" border="0" align="center" cellpadding="0" cellspacing="2" class="noticia">
  <tr>
		<?
			// Lista o último evento postado
			$sqlEvento = "SELECT eve_titulo,eve_descricao,eve_codigo FROM eventos ORDER BY eve_data DESC LIMIT 0,1";
			$rsEvento = mysql_query($sqlEvento) or die(mysql_error());
			$titEvento = mysql_result($rsEvento,0,0);
			$desEvento = mysql_result($rsEvento,0,1);
			if(strlen($titEvento) > 12){
				$titEvento = substr($titEvento,0,12)."...";
			}
			if(strlen($desEvento) > 47){
				$desEvento = substr($desEvento,0,47)."...";
			}
		?>
    <td height="22" colspan="2" valign="middle" bgcolor="#EEEEEE" class="borda_baixo"><div class="topicos">
      <div align="left">&nbsp;&nbsp;Eventos</div>
    </div></td>
    <td height="22" colspan="2" valign="middle" bgcolor="#EEEEEE" class="borda_baixo"><div class="topicos">&nbsp;</div></td>
  </tr>
  <tr>
    <td width="87" height="65" rowspan="2" valign="top"><img src="../imagens/eventos/<? echo mysql_result($rsEvento,0,2); ?>/pequenas/1.jpg" width="84" height="62" /></td>
    <td width="147" height="20" valign="top" class="borda_baixo">
			<span class="titOutros">
				<? echo $titEvento; ?>	
			</span>
		</td>
    <td width="86" height="65" rowspan="2" valign="top"><img src="../img/ft_n3_p.jpg" width="84" height="62" /></td>
    <td width="140" height="20" valign="top" class="borda_baixo"><span class="titOutros">T&iacute;tulo</span></td>
  </tr>
  <tr>
    <td height="41" align="center" valign="middle" class="borda_baixo">
			<span class="noticia">
				<a href="index.php?id=8">
					<? echo $desEvento; ?>	
				</a>
			</span>
		</td>
    <td height="41" align="center" valign="middle" class="borda_baixo"><a href="#"></a></td>
  </tr>
  <tr>
    <td height="22" colspan="2" align="right" valign="middle" class="bordaDireita">
			<a href="index.php?id=13">Outros Eventos</a> &nbsp;</td>
    <td height="22" colspan="2" align="right" valign="middle"><a href="#">Outros</a> &nbsp;</td>
  </tr>
</table>