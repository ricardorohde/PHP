<?
	include "protege.php";
	$pag = $_GET['pag'];
	$limite = 14;
	if(($pag == '') || ($pag == 1) || ($pag == 0)){
		$min = 0;
	}else{
		$min = $limite * ($pag - 1);
	}
	$sql = "SELECT pro_codigo,pro_nome FROM produtos ORDER BY pro_nome LIMIT $min,$limite";
	$pro = mysql_query($sql);
?>
<script>function excluir(cod){
	if(confirm('Deseja realmente excluir este produto?')){
		location = "scr_produtos.php?op=excluir&cod=" + cod;
	}
}
</script>
<table width="598" height="70" border="0" align="left" cellpadding="0" cellspacing="0" class="noticia">
  <tr>
    <td height="22" colspan="2" valign="top" bgcolor="#EEEEEE" class="bordaBaixo"><div class="topicos">Lista de produtos&nbsp;&nbsp;</div></td>
  </tr>
  <tr>
    <th height="22" align="center" valign="middle" class="borda_baixo">PRODUTO</th>
    <th width="170" align="center" valign="middle" class="borda_baixo">OP&Ccedil;&Otilde;ES</th>
  </tr>
  <?			
				
				while($pr = mysql_fetch_array($pro)){
	?>
  <tr>
    <td height="26" align="center" valign="middle" class="bordaDireita"><strong class="datNoticia2">
		<a class="links" target="_blank" href="../php/index.php?id=11&cod=<? echo $pr['pro_codigo'];?>">
		 <? echo $pr['pro_nome']; ?></a></strong></td>
    <td align="center" valign="middle" class="datNoticia2">
			<a class="links" href="index.php?id=12&cod=<? echo $pr['pro_codigo']; ?>"> <img src="../img/exchange.png" border="0" alt="Editar" title="Editar" /> </a> <a class="links" href="javascript:excluir(<? echo $pr['pro_codigo']; ?>);"> <img src="../img/delete.png" border="0" alt="Excluir" title="Excluir" /> </a> </td>
  </tr>
  <?
				} // fecha o while
	?>
	<tr>
    <td height="22" colspan="3" align="center" valign="middle" class="bordaDireita">
			<?
				$sql = "SELECT * FROM produtos";
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
