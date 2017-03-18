<?
	$sql = "SELECT gal_titulo,gal_data,gal_codigo FROM galeria ORDER BY gal_data ASC LIMIT 0,30";
	$gal = mysql_query($sql);
?>
<table width="460" height="45" border="0" align="center" cellpadding="0" cellspacing="0" class="noticia">
  <tr>
    <td height="22" colspan="2" valign="top" bgcolor="#EEEEEE" class="bordaBaixo"><div class="topicos">Galerias mais antigas </div> </td>
  </tr>
	<?
		while($gl = mysql_fetch_array($gal)){		
	?>
  <tr>
    <td width="69" height="18" align="center" valign="middle" class="bordaDireita">
			<strong class="datNoticia2">
				<? 
					$data = explode('-',$gl['gal_data']);
					echo $data[2] ."/". $data[1] ."/". $data[0];
				?>
			</strong>		</td>
    <td width="364" align="justify" valign="middle" class="datNoticia2">
			<a href="index.php?id=7&gal=<? echo $gl['gal_codigo']; ?>" >
			<? 
					if(strlen($gl['gal_titulo']) > 60){
						echo substr($gl['gal_titulo'],0,60)."...";
					}else{
						echo $gl['gal_titulo'];
					} 
			?>
			</a>		</td>
  </tr>    
  <?
		} // fecha o while
	?>
</table>
