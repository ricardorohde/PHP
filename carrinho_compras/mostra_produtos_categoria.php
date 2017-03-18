<link rel="stylesheet" type="text/css" href="util/estilos.css">
<table width="100%" border="0" cellspacing="0" align="center" bordercolor="#999999";">
<tr>
	<td align="center"><?php
    	while($oquefazer->registros = $oquefazer->resultado->FetchNextObject())
		{
			
			//alerta($oquefazer->listar_imagem($oquefazer->registros->PROD_CODIGO));
		?>
   	  <div class="MostraProdutos">
        <img src="imagens/<?php echo $oquefazer->listar_imagem($oquefazer->registros->PROD_CODIGO); ?>"  alt="" width="100" height="100"/>
          <br/>
        <span class="campo_descricao"><?php echo $oquefazer->registros->PROD_DESCRICAO?><br>
        Valor:<span class="campo_valor"><?php echo $oquefazer->registros->PROD_VALOR?></span>
        <br>
        <br>
        <a href="index.php?id=1&codproduto=<?php echo $oquefazer->registros->PROD_CODIGO;?>&acao=incluir_carrinho">
        <img src="imagens/botao_comprar.gif" width="90" height="24"  alt=""/><br/></a>
        
    	</div>
        <?php } ?>
    </td>
</tr>
</table>

