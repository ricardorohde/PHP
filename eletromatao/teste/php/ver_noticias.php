<?
	$cod = $_GET['cod'];
	$sql = "SELECT not_titulo,not_data,not_codigo FROM noticias ORDER BY not_data DESC,not_hora DESC LIMIT 0,30";
	$not = mysql_query($sql);
?>



<table width="460" height="45" border="0" align="center" cellpadding="0" cellspacing="0" class="noticia">
  <tr>
    <td height="22" colspan="2" valign="top" bgcolor="#EEEEEE" class="bordaBaixo"><div class="topicos">Not&iacute;cias&nbsp;</div> </td>
  </tr>
	<?
		while($nt = mysql_fetch_array($not)){		
	?>
  <tr>
    <td width="69" height="18" align="center" valign="top" class="bordaDireita">
			<strong class="datNoticia2">
				<? 
					$data = explode('-',$nt[1]);
					echo $data[2] ."/". $data[1] ."/". $data[0];
				?>
			</strong>			</td>
    <td width="364" align="left" valign="top" class="datNoticia2">
			<a href="index.php?id=1&cod=<? echo $nt[2]; ?>" >
			<? 
					if(strlen($nt[0]) > 60){
						echo substr($nt[0],0,60)."...";
					}else{
						echo $nt[0];
					} 
			?>
			</a>		</td>
  </tr>    
  <?
		} // fecha o while
	?>
</table>
