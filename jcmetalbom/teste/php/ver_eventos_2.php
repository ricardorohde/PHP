<?
	$sql = "SELECT eve_titulo,eve_data,eve_codigo FROM eventos ORDER BY eve_data ASC LIMIT 0,30";
	$eve = mysql_query($sql) or die(mysql_error());
?>
<table width="460" height="45" border="0" align="center" cellpadding="0" cellspacing="0" class="noticia">
  <tr>
    <td height="22" colspan="2" valign="top" bgcolor="#EEEEEE" class="bordaBaixo"><div class="topicos">Eventos mais antigos </div> </td>
  </tr>
	<?
		while($ev = mysql_fetch_array($eve)){		
	?>
  <tr>
    <td width="69" height="18" align="center" valign="middle" class="bordaDireita">
			<strong class="datNoticia2">
				<? 
					$data = explode('-',$ev['eve_data']);
					echo $data[2] ."/". $data[1] ."/". $data[0];
				?>
			</strong>		</td>
    <td width="364" align="justify" valign="middle" class="datNoticia2">
			<a href="index.php?id=9&eve=<? echo $ev['eve_codigo']; ?>" >
			<? 
					if(strlen($ev['eve_titulo']) > 60){
						echo substr($ev['eve_titulo'],0,60)."...";
					}else{
						echo $ev['eve_titulo'];
					} 
			?>
			</a>		</td>
  </tr>    
  <?
		} // fecha o while
	?>
</table>
