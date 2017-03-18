<?php
	$oquefazer->listar_categoria();
?>
<link rel="stylesheet" type="text/css" href="util/estilos.css">
<table width="100%" class="borda_tabela">
	<?php
    	while($oquefazer->registros = $oquefazer->resultado->FetchNextObject())
		{
			?>
            <tr onMouseOver="muda_cor_over(this)" onMouseOut="muda_cor_out(this)">
            	<td>
                	<a href="index.php?id=1&codcategoria=<?php echo $oquefazer->registros->CAT_CODIGO;?>&acao=listar_produtos">
                	<?php echo $oquefazer->registros->CAT_DESCRICAO;?>
                 </td>
             </tr>
             <?php }       
	?>
</table>