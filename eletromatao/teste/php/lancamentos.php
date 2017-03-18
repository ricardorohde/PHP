<table width="460" height="97" border="0" align="center" cellpadding="0" cellspacing="0" class="noticia">
  <tr>
    <td height="30" valign="top" bgcolor="#EEEEEE" class="bordaBaixo">
			<div class="topicos">
			Lan&ccedil;amentos&nbsp;			</div> 
		</td>
  </tr>
  <tr>
    <td height="67" align="center" valign="top" class="bordaDireita">
		<?
		
			$pag = $_GET['pag'];
		
			$limite = 4;
			($pag == '') ? ($inicial = 0) : ($inicial = ($pag - 1) * $limite);
			
			$sqlTotal = "SELECT COUNT(pro_codigo) FROM produtos WHERE pro_lancamento = 'S'";
			$rsTotal = mysql_query($sqlTotal);
			$total = mysql_result($rsTotal,0,0);
			
			$num = explode(".",$total / $limite);
			$int = $num[0];
			
			if($total % $limite != 0){
				$int++;
			}
			
			$sqlPro = "SELECT pro_codigo,pro_nome,pro_descricao,pro_img FROM produtos WHERE pro_lancamento = 'S' LIMIT $inicial,$limite";
			$rsPro = @mysql_query($sqlPro);
			if(mysql_num_rows($rsPro) > 0){
				while($pro = @mysql_fetch_array($rsPro)){
				 $nome = $pro['pro_nome'];
				 $cod =	$pro['pro_codigo'];
				 $desc = $pro['pro_descricao'];
				 $img = explode(';',$pro['pro_img']);
				 $tot = count($img);
				 $img = $img[rand(0,$tot - 1)];
		?>
		<table height="86" border="0" align="center">
 		<tr>
			<td width="84" height="78" rowspan="2" align="center" valign="middle">
				<img width="84" height="62" src="../produtos/pequenas/<? echo $cod."_".$img; ?>" /></td>
			<td width="363" height="21" align="center" class="titOutros">
				<? 
					echo $nome;
				?>
			</td>
	  </tr>
		<tr>
    	<td height="44" align="left" valign="top" class="texNoticia">
				<a href="index.php?id=11&cod=<? echo $cod; ?>">
					<? echo $desc; ?>
				</a>
			</td>
	  </tr>
		<tr>
		  <td height="13" colspan="2" align="center" valign="middle"><img src="../img/linha_grande.png" width="450" height="3" /></td>
		  </tr>
	  </table>
		<?
				} // Fecha o While
		?>
		</td>		
  </tr>  
	<tr>
		<td align="center">		
			<?
				if($int != 1){
					for($i = 0; $i < $int; $i++){
						echo "<a href=index.php?id=10&pag=".($i + 1).">";
						echo $i + 1;
						echo "</a>";
						if(!($i == $int - 1)){
							echo "&nbsp;&bull;&nbsp;";
						}
					}
				}
			}else{
				if(($pag != '')){
					echo "Página não encontrada!<br><a class='links' href='javascript:history.back()'>Voltar</a>";
				}else{
					echo "Não foram encontrados produtos nesta categoria!<br><a class='links' href='javascript:history.back()'>Voltar</a>";
				}
			}
			?>
		</td>
	</tr>  
</table>