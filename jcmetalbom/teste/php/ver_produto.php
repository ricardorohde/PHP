<?
	$cod = $_GET['cod'];
	$sql = "SELECT * FROM produtos WHERE pro_codigo = $cod LIMIT 0,1";
	$rs = mysql_query($sql) or die(mysql_error());
	$pro = mysql_fetch_array($rs);
?>

<table width="460" height="317" border="0" align="center" cellpadding="0" cellspacing="0" class="noticia">
  <tr>
    <td height="30" valign="top" bgcolor="#EEEEEE" class="bordaBaixo">
			<div class="topicos"><? echo $pro['pro_nome']; ?></div></td>
  </tr>
  <tr>
    <td height="67" align="center" valign="top" class="bordaDireita"><table width="460" height="221" border="0" align="center">
 		<tr>
			<td height="19" align="left" valign="middle" class="titOutros">&nbsp;&nbsp;Descri&Ccedil;&Atilde;o</td>
			</tr>
		<tr class="texNoticia">
		  <td height="21" align="left" valign="top"><div align="justify">&nbsp;&nbsp;&nbsp;&nbsp;<? echo $pro['pro_descricao']; ?></div></td>
    	</tr>
		<?
			if($pro['pro_especificacoes'] != ''){
		?>
		<tr>
		  <td height="19" align="left" valign="middle"><span class="titOutros">&nbsp;&nbsp;ESPECIFICA&Ccedil;&Otilde;ES</span></td>
	  </tr>
		<tr class="texNoticia">
		  <td height="26" align="left" valign="middle"><div align="justify">&nbsp;&nbsp;&nbsp;&nbsp;<? echo $pro['pro_especificacoes']; ?></div></td>
	  </tr>
		<?
			} // Fecha o IF
		?>
		<tr>
		  <td height="19" align="left" valign="middle"><span class="titOutros">&nbsp;&nbsp;FOTOS</span></td>
		  </tr>
		<tr class="texNoticia">
		  <td height="19" align="center" valign="middle">
				<?
					$imgs = explode(';',$pro['pro_img']);
					for($i = 0; $i < count($imgs); $i++){						
						$imgP = '../produtos/pequenas/'.$cod."_".$imgs[$i];
						$imgG = '../produtos/grandes/'.$cod."_".$imgs[$i];
						$tamanho = getimagesize($imgG);
						if((file_exists($imgP)) && (file_exists($imgG)) ){
				?>
	<script>
		var largura = 0;
		var altura = 0;
		if(navigator.appName.split(" ")[0] == "Microsoft"){
			largura = 16;
			altura = 4;
		}
	</script>			
	<a href="javascript:janela('img_produto.php?foto=<? echo $imgG; ?>',largura + <? echo $tamanho[0] + 7; ?>,altura + <? echo $tamanho[1] + 36; ?>);">
					<img width="84" height="62" src="<? echo $imgG; ?>" border="0" />				</a>
				<?
						} // Fecha i IF
					} // Fecha o FOR
				?>			</td>
		  </tr>
		<?
			if($pro['pro_preco'] != 0){
		?>	
			<tr class="texNoticia">
			  <td height="19" align="left" valign="middle"><span class="titOutros">&nbsp;&nbsp;PRE&Ccedil;O</span></td>
		  </tr>
			<tr class="texNoticia">
			  <td height="19" align="left" valign="middle">
					<?
						echo "&nbsp;&nbsp;&nbsp;&nbsp;R$ ".number_format($pro['pro_preco'],2,",",".");
					?>
				</td>
		  </tr>
		<?
			}
		?>
		<tr class="texNoticia">
		  <td height="19" align="left" valign="middle"><span class="titOutros">&nbsp;&nbsp;RELACIONADOS</span></td>
		  </tr>
		<tr class="texNoticia">
			<?
				$cat = $pro['cat_codigo'];
			?>
		  <td height="19" align="left" valign="middle">
				&nbsp;&nbsp;&bull;&nbsp; <a href="index.php?id=5&amp;cat=<? echo $cat ?>">Mesma categoria</a></td>
		  </tr>
	  </table>		</td>		
  </tr>  
</table>
<blockquote>&nbsp;</blockquote>
