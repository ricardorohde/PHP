<?
	include "protege.php";
	$pag = $_GET['pag'];
	$limite = 5;
	if(($pag == '') || ($pag == 1) || ($pag == 0)){
		$min = 0;
	}else{
		$min = $limite * ($pag - 1);
	}	
	$sql = "SELECT * FROM categorias WHERE cat_mae IS NULL ORDER BY cat_nome LIMIT $min,$limite";
	$cat = mysql_query($sql);
?>
<link href="../css_js/estilos.css" rel="stylesheet" type="text/css" /> <!-- DELETAR ESTA LINHA DEPOIS -->

<script>
function excluir(cod){
	if(confirm('Deseja realmente excluir esta categoria?')){
		location = "scr_categorias.php?op=excluir&cod=" + cod;
	}
}
</script>
<table width="598" height="132" border="0" align="left" cellpadding="0" cellspacing="0" class="noticia">
  <tr>
    <td height="22" colspan="2" valign="top" bgcolor="#EEEEEE" class="bordaBaixo"><div class="topicos">Lista de categorias &nbsp;</div> </td>
  </tr>	
  <tr>
    <th height="22" align="center" valign="middle" class="borda_baixo">CATEGORIA</th>
    <th width="170" align="center" valign="middle" class="borda_baixo">OP&Ccedil;&Otilde;ES</th>
  </tr>
	<?
		while($ct = mysql_fetch_array($cat)){	
			$cod = $ct['cat_codigo'];	
			$sql = "SELECT * FROM categorias WHERE cat_mae = $cod";
			$rs = mysql_query($sql);
			if(mysql_num_rows($rs) > 0){
	?>
		<tr bgcolor="#EEEEEE">
			    <td height="22" align="center" valign="middle" class="bordaDireita"><strong class="datNoticia2">
				    <? echo $ct['cat_nome']; ?></strong></td>
			    <td align="center" valign="middle" class="datNoticia2">
						<a class="links" href="index.php?id=11&cod=<? echo $ct['cat_codigo']; ?>">
							<img src="../img/exchange.png" border="0" alt="Editar" title="Editar" />			</a>
							------					</td>
  </tr>   
	<?			
				
				while($ctF = mysql_fetch_array($rs)){
	?>
  <tr>
    <td height="22" align="center" valign="middle" class="bordaDireita"><strong class="datNoticia2">
    <? echo $ctF['cat_nome']; ?></strong></td>
			    <td align="center" valign="middle" class="datNoticia2">
						<a class="links" href="index.php?id=11&cod=<? echo $ctF['cat_codigo']; ?>">
							<img src="../img/exchange.png" border="0" alt="Editar" title="Editar" />			</a>
						<a class="links" href="javascript:excluir(<? echo $ctF['cat_codigo']; ?>);">
							<img src="../img/delete.png" border="0" alt="Excluir" title="Excluir" />			</a>		</td>
  			</tr>    
  <?
				} // fecha o while
			}else{
	?>
		<tr bgcolor="#EEEEEE">
			    <td height="22" align="center" valign="middle" class="bordaDireita"><strong class="datNoticia2">
				    <? echo $ct['cat_nome']; ?></strong></td>
			    <td align="center" valign="middle" class="datNoticia2">
						<a class="links" href="index.php?id=11&cod=<? echo $ct['cat_codigo']; ?>">
							<img src="../img/exchange.png" border="0" alt="Editar" title="Editar" />			</a>
						<a class="links" href="javascript:excluir(<? echo $ct['cat_codigo']; ?>);">
							<img src="../img/delete.png" border="0" alt="Excluir" title="Excluir" />			</a>		</td>
	</tr>			
	<?			
			} // Fecha o If-Else
		} // Fecha o While
	?>
	<tr>
	  <td height="22" colspan="2" align="center" valign="middle" class="bordaDireita">
			<?
				$sql = "SELECT * FROM categorias WHERE cat_mae IS NULL";
				$rs = mysql_query($sql);
				$total = mysql_num_rows($rs);
				$num = explode('.',$total  / $limite);
				$int = $num[0];
				if($total % $limite != 0){
					$int += 1;
				}
				for($i = 0; $i < $int; $i++){
					echo "<a href='index.php?id=17&pag=".($i + 1)."'>".($i + 1)."</a>";
					if(($i + 1) != $int){
						echo " &bull; ";
					}
				}
			?>			
		</td>
  </tr>  
</table>
