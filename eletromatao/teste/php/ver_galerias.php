<?
	$sql = "SELECT gal_titulo,gal_data,gal_codigo,gal_descricao FROM galeria ORDER BY gal_data DESC LIMIT 0,8";
	$gal = mysql_query($sql);
	$n_gals = mysql_num_rows($gal);	
?>

<style type="text/css">
<!--
.style1 {font-weight: bold}
-->
</style>
<table width="452" height="107" border="0" align="center" cellpadding="1" cellspacing="0" class="noticia">
  <tr>
    <td height="22" colspan="5" valign="top" bgcolor="#EEEEEE" class="bordaBaixo"><div class="topicos">Galerias&nbsp;</div> </td>
  </tr>
	<?		
		for($i = 0; $i < $n_gals; $i += 2){			
			$seguinte = true;
			if($i + 1 == $n_gals){
				$seguinte = false;
			}
			
	?>	
  <tr>
    <td width="62" rowspan="2" align="center" valign="middle" class="bordaDireita"><img src="../imagens/galerias/<? echo mysql_result($gal,$i,2); ?>/pequenas/1.jpg" /></td>
    <td width="151" height="21" align="center" valign="middle" class="datNoticia2"><strong><? echo mysql_result($gal,$i,0); ?></strong></td>
    <td width="2" rowspan="3" align="justify" valign="top" class="datNoticia2">&nbsp;</td>
    <td width="72" rowspan="2" align="center" valign="middle" class="datNoticia2">
			<?
				if($seguinte){
			?>
					<img src="../imagens/galerias/<? echo mysql_result($gal,$i + 1,2); ?>/pequenas/1.jpg" />
			<?		
				}else{
					echo "&nbsp;";
				}
			?>		</td>
    <td width="155" align="center" valign="middle" class="datNoticia2">
			<span class="style1">
			<? 
				if($seguinte){
					echo mysql_result($gal,$i + 1,0); 
				}else{
					echo "&nbsp;";
				}
			?>
			</span> </td>
  </tr>
  <tr>
    <td height="21" align="center" valign="middle" class="datNoticia2"><? 
				$data = explode("-",mysql_result($gal,$i,1));
				echo $data[2] . "/" . $data[1] . "/" . $data[0];
			?>		</td>
    <td width="155" align="center" valign="middle" class="datNoticia2"><?
				if($seguinte){
					$data = explode("-",mysql_result($gal,$i + 1,1));
					echo $data[2] . "/" . $data[1] . "/" . $data[0];
				}else{
					echo "&nbsp;";
				}
			?>		</td>
  </tr>
  <tr>
    <td height="21" colspan="2" align="center" valign="middle" class="bordaDireita">
			<span class="datNoticia2">
				<a class="texNoticia" href="index.php?id=7&gal=<? echo mysql_result($gal,$i,2); ?>" >
					<? echo mysql_result($gal,$i,3); ?>				</a>			</span>		</td>
    <td colspan="2" align="center" valign="middle" class="datNoticia2">
			<span class="bordaDireita">
			<? 
				if($seguinte){
			?>
				<a class="texNoticia" href="index.php?id=7&gal=<? echo mysql_result($gal,$i + 1,2); ?>" >
					<? echo mysql_result($gal,$i + 1,3); ?>				</a>			</span>		</td>
			<?
				}else{
					echo "&nbsp;";
				}
			?>
  </tr>
  <tr>
    <td height="30" colspan="5" align="center" valign="middle" class="bordaDireita"><img src="../img/linha_grande.png" width="450" height="3" /></td>
  </tr>    
  <?
		} // fecha o while
	?>
</table>