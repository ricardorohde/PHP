<?		
	function mostraThumb($arquivo){
		if($arquivo != '-'){
			$nome = explode('/',$arquivo);
			$link = "../imagens/".$nome[2]."/".$nome[3]."/grandes/".$nome[count($nome) - 1];
			$thumb  = "<a href='img.php?foto=".$link."' target='foto' onclick='atual = \"$link\";'>";
			$thumb .= "<img src='".$arquivo."' width='84' height='62' border='0'/>";
			$thumb .= "</a>";
		}else{
			$thumb = "&nbsp;";
		}
		return $thumb;
	}
	
	$limite = 10;
	$eve = $_GET['eve'];
	
	$sql = "SELECT eve_total_fotos FROM eventos WHERE eve_codigo = ".$eve;
	$rs = @mysql_query($sql);
	$total = @mysql_result($rs,0,0);
	
	$num = explode(".",$total / $limite);
	$int = $num[0];
	
	if($total % $limite != 0){
		$int += 1;
	}
	
	$pag = $_GET['pag'];
	
	if(($pag == 1) || ($pag == '')){
		$ini = 0;
	}else{
		$ini = ($pag - 1) * $limite;
	}
	
	if($ini < $total){				
		$fotos = array();	
		$diretorio = "../imagens/eventos/".$eve."/pequenas/";
		$i == 0;
		for($i = $ini; $i < $ini + $limite; $i++){
			$nome = ($i + 1).".jpg";
			if(file_exists($diretorio.$nome)){
				$fotos[$i - $ini] = $diretorio.$nome;
			}else{
				$fotos[$i - $ini] = "-";
			}
		}
		
?>

<script>
var atual = '<? echo '../imagens/eventos/'.$eve.'/grandes/1.jpg' ?>';

function abre(){
	url = 'enviar.php?foto=' + atual;
	janela(url,485,555);
}
</script>
	<table width="442" height="181" border="0" align="center" class="noticia">
  	<tr>
    	<td width="84" align="center" valign="top" class="bordaBaixo"><? echo mostraThumb($fotos[0]); ?></td>
	    <td width="84" align="center" valign="top" class="bordaBaixo"><? echo mostraThumb($fotos[1]); ?></td>
  	  <td width="84" align="center" valign="top" class="bordaBaixo"><? echo mostraThumb($fotos[2]); ?></td>
	    <td width="84" align="center" valign="top" class="bordaBaixo"><? echo mostraThumb($fotos[3]); ?></td>
	    <td width="84" align="center" valign="top" class="bordaBaixo"><? echo mostraThumb($fotos[4]); ?></td>
  	</tr>
	  <tr>
  	  <td align="center" valign="top" class="bordaBaixo"><? echo mostraThumb($fotos[5]); ?></td>
    	<td align="center" valign="top" class="bordaBaixo"><? echo mostraThumb($fotos[6]); ?></td>
	    <td align="center" valign="top" class="bordaBaixo"><? echo mostraThumb($fotos[7]); ?></td>
  	  <td align="center" valign="top" class="bordaBaixo"><? echo mostraThumb($fotos[8]); ?></td>
    	<td align="center" valign="top" class="bordaBaixo"><? echo mostraThumb($fotos[9]); ?></td>
	  </tr>
  	<tr>		
    	<td height="21" colspan="2" align="center" valign="top" class="datNoticia"><div align="center">
        <?
						if($int > 1){
							for($i = 0; $i < $int; $i++){
								echo "<a class='links' href='index.php?id=9&eve=".$eve."&pag=".($i + 1)."'>".($i + 1)."</a>";
								if($i != $int - 1){
									echo " &bull; ";
								}
							}
						}
					?>
      </div></td>
	    <td height="21" colspan="3" align="center" valign="top" class="datNoticia">
			<? 
				if($fotos[0] != '-'){
			?>
			<a href="javascript:abre();">Envie para um amigo</a> 
			<?
				} // fecha o if
			?>
			</td>
    </tr>
  	<tr>
    	<td colspan="5" align="center" valign="top">
				<iframe src="<? echo 'img.php?foto=../imagens/eventos/'.$eve.'/grandes/1.jpg'; ?>" frameborder="0" scrolling="no" name="foto" height="327" width="443"></iframe>			</td>
	  </tr>    
	</table>
<?
	}else{
		echo "Página não encontrada! <br> <a class='links' href='javascript:history.back()'>Voltar</a>";
	}
?>