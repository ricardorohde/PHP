<?
	include "protege.php";
	$pag = $_GET['pag'];
	$limite = 14;
	if(($pag == '') || ($pag == 1) || ($pag == 0)){
		$min = 0;
	}else{
		$min = $limite * ($pag - 1);
	}
	$sql = "SELECT gal_titulo,gal_data,gal_codigo FROM galeria ORDER BY gal_data DESC LIMIT $min,$limite";
	$gal = mysql_query($sql);
?>
<script>
function excluir(cod){
	if(confirm('Deseja realmente excluir esta galeria?')){
		location = "scr_galerias.php?op=excluir&cod=" + cod;
	}
}
</script>
<table width="598" height="66" border="0" align="left" cellpadding="0" cellspacing="0" class="noticia">
  <tr>
    <td height="22" colspan="3" valign="top" bgcolor="#EEEEEE" class="bordaBaixo"><div class="topicos">Lista de galerias &nbsp;</div> </td>
  </tr>	
  <tr>
    <th width="85" height="22" align="center" valign="middle" class="datNoticia2">DATA</th>
    <th width="343" align="center" valign="middle" class="datNoticia2">T&Iacute;TULO</th>
    <th width="170" align="center" valign="middle" class="datNoticia2">OP&Ccedil;&Otilde;ES</th>
  </tr>
	<?
		while($gl = mysql_fetch_array($gal)){		
	?>
  <tr>
    <td height="22" align="center" valign="middle" class="bordaDireita"><strong class="datNoticia2">
      <? 
					$data = explode('-',$gl[1]);
					echo $data[2] ."/". $data[1] ."/". $data[0];
				?>
    </strong></td>
    <td align="justify" valign="middle" class="datNoticia2">
		<a target="_blank" href="../php/index.php?id=7&gal=<? echo $gl[2]; ?>" >
      <? 
					if(strlen($gl[0]) > 60){
						echo substr($gl[0],0,60)."...";
					}else{
						echo $gl[0];
					} 
			?>
    </a></td>
    <td align="center" valign="middle" class="datNoticia2">
			<a class="links" href="index.php?id=10&amp;cod=<? echo $gl[2]; ?>">
				<img src="../img/exchange.png" border="0" alt="Editar" title="Editar" />			</a>
			<a class="links" href="javascript:excluir(<? echo $gl[2]; ?>);">
				<img src="../img/delete.png" border="0" alt="Excluir" title="Excluir" />			</a>		</td>
  </tr>    
  <?
		} // fecha o while
	?>
	<tr>
    <td height="22" colspan="3" align="center" valign="middle" class="bordaDireita">
			<?
				$sql = "SELECT * FROM galeria";
				$rs = mysql_query($sql);
				$total = mysql_num_rows($rs);
				$num = explode('.',$total  / $limite);
				$int = $num[0];
				if($total % $limite != 0){
					$int += 1;
				}
				for($i = 0; $i < $int; $i++){
				
					echo "<a href='index.php?id=15&pag=".($i + 1)."'>".($i + 1)."</a>";
					if(($i + 1) != $int){
						echo " &bull; ";
					}
				}
			?>
		</td>
  </tr>
</table>