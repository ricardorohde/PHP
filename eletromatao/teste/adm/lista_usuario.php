<?
	include "protege.php";
	$pag = $_GET['pag'];
	$limite = 14;
	if(($pag == '') || ($pag == 1) || ($pag == 0)){
		$min = 0;
	}else{
		$min = $limite * ($pag - 1);
	}
	$sql = "SELECT usu_nome,usu_login FROM usuarios ORDER BY usu_nome DESC LIMIT $min,$limite";
	$usr = mysql_query($sql);
?>
<script>
function excluir(cod){
	if(confirm('Deseja realmente excluir este usuario?')){
		location = "scr_usuarios.php?op=excluir&login=" + cod;
	}
}
</script>
<table width="598" height="88" border="0" align="left" cellpadding="0" cellspacing="0" class="noticia">
  <tr>
    <td height="22" colspan="3" valign="top" bgcolor="#EEEEEE" class="bordaBaixo"><div class="topicos">Lista de usu&aacute;rios &nbsp;</div> </td>
  </tr>	
  <tr>
    <th width="130" height="22" align="center" valign="middle" class="datNoticia2">LOGIN</th>
    <th width="341" align="center" valign="middle" class="datNoticia2">NOME</th>
    <th width="127" align="center" valign="middle" class="datNoticia2">OP&Ccedil;&Otilde;ES</th>
  </tr>
	<?
		while($us = mysql_fetch_array($usr)){		
	?>
  <tr>
    <td height="22" align="center" valign="middle" class="bordaDireita"><strong class="datNoticia2">
      <? 
				echo $us[1];		
			?>
    </strong></td>
    <td align="center" valign="middle" class="datNoticia2">
      <strong>
      <? 
				echo $us[0];
			?>
      </strong></td>
    <td align="center" valign="middle" class="datNoticia2">
			<a class="links" href="index.php?id=22&amp;login=<? echo base64_encode($us[1]); ?>">
				<img src="../img/exchange.png" border="0" alt="Editar" title="Editar" />			</a>
			<a class="links" href="javascript:excluir('<? echo base64_encode($us[1]); ?>');">
				<img src="../img/delete.png" border="0" alt="Excluir" title="Excluir" />			</a>		</td>
  </tr>   
  <?
		} // fecha o while
	?>
	  <tr>
    <td height="22" colspan="3" align="center" valign="middle" class="bordaDireita">
			<?
				$sql = "SELECT * FROM usuarios";
				$rs = mysql_query($sql);
				$total = mysql_num_rows($rs);
				$num = explode('.',$total  / $limite);
				$int = $num[0];
				if($total % $limite != 0){
					$int += 1;
				}
				for($i = 0; $i < $int; $i++){
				
					echo "<a href='index.php?id=23&pag=".($i + 1)."'>".($i + 1)."</a>";
					if(($i + 1) != $int){
						echo " &bull; ";
					}
				}
			?>
		</td>
  </tr> 
</table>
